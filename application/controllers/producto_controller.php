<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_controller extends CI_Controller {

		function __construct()
		{
		parent::__construct();
		$this->load->model('producto_model');
		}




public function cargar_producto()
	{
	$this->load->model('producto_model');
	$data['categorias'] = $this->producto_model->select_categoria();
	$this->load->view('encabezado');
	$this->load->view('cargar_producto_view', $data);
	$this->load->view('footer');
	}

public function registrar_producto()
	{
	$this->form_validation->set_rules('nombrep','Nombre','required');
	$this->form_validation->set_rules('descripcion','Descripción','required');
	$this->form_validation->set_rules('precio','Precio final','required');
	$this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen');
	$this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|callback_select_validate');
	$this->form_validation->set_rules('stock','Cantidad','required|integer');

	$this->form_validation->set_message('required', 'El campo %s es obligatorio');
	$this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
	
	if ($this->form_validation->run() == FALSE) 
	{
		
		$this->cargar_producto();
	} else 
	{
		$this->guardar_producto();
			}
	}

function validar_imagen($imagen){
	//Verifica que se ingreso una imagen
	$nombre_imagen= $_FILES['imagen']['name']; //Obtiene el nombre de la imagen
	if(empty($nombre_imagen)) 
	{
	$this->form_validation->set_message('validar_imagen', 'Seleccionar una imagen');
	return false;
	}
	 else{ 
	return true;} 
	}

function select_validate($categoria) {
// verifica que se selecciono una categoria del libro
	if($categoria=="0")
	{
	$this->form_validation->set_message('select_validate', 'Seleccione una categoria');
	return false;} 
	else{
	return true;}
	}


function guardar_producto(){
	$config['upload_path'] = './uploads/imagenes_productos';
	$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
	//$config['remove_spaces'] = TRUE;
	$config['max_size'] = '2048';

	$this->load->library('upload', $config);

	if(!$this->upload->do_upload('imagen')) {
		echo 'Imagen NO cargada';
		$this->cargar_producto();
		}
		 else{
		 	
		 	//$url= str_replace(" ", "_", $_FILES['imagen']['name']);
			$data = array(
			'nombre' => $this->input->post('nombrep'),
			'descripcion' => $this->input->post('descripcion'),
			'precio' => $this->input->post('precio'),
			'cantidad' => $this->input->post('stock'),
			'dimensiones'=> $this->input->post('dimensiones'),
			'imagen' => $_FILES['imagen']['name']= str_replace(" ", "_", $_FILES['imagen']['name']),
			'id_categoria'=> $this->input->post('categoria'));

			$this->load->model('producto_model');
			$this->producto_model->guardar_producto($data);
			$this->listar_productos_e();
			
			}
	


}

public function listar_productos()
       {
      //se carga el modelo producto q esta en constructor
      //obtenemos los usuarios
        /**if(!$this->session->userdata('login')){
        redirect('Principal'); 
        }*/
        $id=$this->uri->segment(2);
        if ($id == NULL){
    	$data = array(
     	'producto' => $this->producto_model->select_productos());

      //cargamos la vista
        
        }
        else {
        	$data = array(
     	'producto' => $this->producto_model->select_producto_cat($id));
           //cargamos la vista
        }
        $this->load->view('encabezado');
        $this->load->view('productoshogar',$data);
        $this->load->view('footer');}
    

    public function listar_productos_e()
			{
		$this->load->library('pagination'); //Se carga la librería de paginación
		$config['base_url'] = base_url().'producto_controller/listar_productos_e';
		$config['first_link'] = 'Primero';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['next_link'] = 'Siguiente';
		//integratción con bootstrap
		$config['full_tag_open'] = '<ul class="pagination justify-content-end">';
		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active">';
		$config['cur_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>';						
		$config['prev_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['total_rows'] = count ($this->producto_model->select_productos());
		$config['per_page'] = 5; //Número de registros a mostrar
		$config['num_links'] = 3; //Número de links a mostrar
		$config["uri_segment"] = 3;//el segmento de la paginación
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		$data['producto'] = $this->producto_model->paginas_mostrar(5, $page);
		
		$this->load->view('encabezado');
		$this->load->view('listar_prod_admin', $data);
		$this->load->view('footer');
		}
			        

    public function listar_productos_edit()
       {
     
        $data = array(
     	'producto' => $this->producto_model->select_productos()

     );

      //cargamos la vista
        
        $this->load->view('encabezado');
        $this->load->view('listar_prod_admin',$data);
        $this->load->view('footer');}
        

    public function estado_activar(){
    //de esta forma podemos imprmir el numero en pantalla que esta en la ultima direccion de la url: echo $id = $this->uri->segment(4);
    //cambio el estado del producto y actualizo los datos
	    $id = $this->uri->segment(3);
	    $data = array('estado'=> '1');
	    $this->producto_model->set_producto($id,$data);
	    redirect('listarprod');
	   	}

   public function estado_desactivar(){
	    $id = $this->uri->segment(3);
	    $data = array('estado'=> '0');
	    $this->producto_model->set_producto($id,$data);
	    redirect('listarprod');
	   }

   public function editar_producto($id=NULL) {
		$this->load->model('producto_model');
		$data['categoria1'] = $this->producto_model->select_categoria();
		$prod = $this->producto_model->select_producto_id($id);
		foreach($prod as $row) {
		$data['producto_id'] = $row->id_producto;
		$data['nombre'] = $row->nombre;
		$data['categoria'] = $row->id_categoria;
		$data['descripcion'] = $row->descripcion;
		$data['imagen'] = $row->imagen;
		$data['dimensiones']= $row->dimensiones;
		$data['cantidad']= $row->cantidad;
		$data['precio'] = $row->precio;
		$data['estado']= $row->estado;
		}
		$this->load->view('encabezado');
		$this->load->view('edit_productos', $data);
		$this->load->view('footer');
		}

	public function actualizar_producto($id=NULL)
		{
		if (!empty($_FILES['imgname']['name'])){
		$config['upload_path'] = './uploads/imagenes_productos';
		$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);
		$this->upload->do_upload('imgname');

		
		// VALIDAR LOS DATOS INGRESADOS
		$data = array(
		'nombre' => $this->input->post('nombre'),
		'id_categoria' => $this->input->post('categoria'),
		'descripcion' => $this->input->post('descripcion'),
		'imagen' => $_FILES['imgname']['name'],
		'cantidad' => $this->input->post('cantidad'),
		'dimensiones' => $this->input->post('dimensiones'),
		'precio'=> $this->input->post('precio'),
		);
		
		$this->load->model('producto_model');
		$this->producto_model->actualizar_producto($data, $id);
		redirect('producto_controller/listar_productos_edit');
		} else {
		$data = array(
		'nombre' => $this->input->post('nombre'),
		'id_categoria' => $this->input->post('categoria'),
		'descripcion' => $this->input->post('descripcion'),
		'cantidad' => $this->input->post('cantidad'),
		'dimensiones' => $this->input->post('dimensiones'),
		'precio'=> $this->input->post('precio'),
		);
		$this->load->model('producto_model');
		$this->producto_model->actualizar_producto($data, $id);
		redirect('producto_controller/listar_productos_e');	
		}}

}