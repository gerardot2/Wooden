<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pedidos_controller extends CI_Controller {
    function __construct()
    {
    parent::__construct();
    $this->load->model('pedidos_model');
    $this->load->model('producto_model');
    }
        function finalizarCompra() {
            $orden_pedido = array(
						'id_cliente' => $this->session->userdata('id_usuario'),
						'orden_fecha' => date('Y-m-d'),
						);
						$this->pedidos_model->guardar_orden_pedido($orden_pedido);
					
						$id_orden = $this->db->insert_id();
						            
            if ($carrito = $this->cart->contents()) {
                foreach ($carrito as $item) {
                  
                $data = array(
                     	'id_orden' => $id_orden,
		                'id_producto' => $item['id'],
		                'detalle_cantidad' => $item['qty'],
		                'detalle_precio' => $item['price'],);
		                 $this->pedidos_model->registrar_compra($data);
                    }
                }

               }


        public function realizar_pedido(){
		$message=" ";
		$bandera=true;
		foreach ($this->cart->contents() as $item){
			
			$producto=$this->producto_model->select_producto_id($item['id']);
					
			if($producto[0]->cantidad < $item['qty']){
				$bandera=false;
				$mess=$message.$producto[0]->nombre." ";
			}
			};
			if($bandera==true){
			$this->guardar_pedido();}
			else{
				$url=base_url('carrito_controller');
			echo "<script type=\"text/javascript\">window.alert('No hay stock suficiente para los productos $mess');
			window.location.href='$url';</script>";
			}
		}

        public function guardar_pedido() {
        $orden_pedido = array(
        'id_cliente' => $this->session->userdata('id_usuario'),
        'orden_fecha' => date('Y-m-d'),
        );
        $this->pedidos_model->guardar_orden_pedido($orden_pedido);
        // obtiene el maximo id_orden_pedido ingresado
        $id_orden = $this->db->insert_id();
            if ($cart = $this->cart->contents()):
            foreach ($cart as $item):
                $detalle_pedido = array(
                'id_orden' => $id_orden,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price'],
                );
        // Actualizar el stock - Completar
        	
        	$this->pedidos_model->guardar_detalle_pedido($detalle_pedido);
        	$producto=$this->producto_model->select_producto_id($item['id']);
			$cantidad=$producto[0]->cantidad-$item['qty'];
		   	$quita=array('cantidad'=>$cantidad);
		   	

			$this->producto_model->actualizar_producto($quita,$item['id']);

        
        endforeach;
        endif;
        $this->compraCarrito();	}

        function compraCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('compra', 'La compra fue registrada correctamente');
        redirect('carrito', 'refresh');}
	
	public function listar_pedidos()
		{
		$this->load->model('pedidos_model');
		$data['pedidos'] = $this->pedidos_model->select_pedidos();
		$this->load->library('pagination'); //Se carga la librería de paginación
		$config['base_url'] = base_url().'pedidos_controller/listar_pedidos/';
		$config['first_link'] = 'Primero';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['next_link'] = 'Siguiente';
		//integratción con bootstrap
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '<span></span></span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['total_rows'] = count ($this->pedidos_model->select_pedidos());
		$config['per_page'] = 5; //Número de registros a mostrar
		$config['num_links'] = 2; //Número de links a mostrar
		$config["uri_segment"] = 3;//el segmento de la paginación
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		$data['pedidos'] = $this->pedidos_model->paginas_mostrar(5, $page);
		$data['message'] = "";
		$data['error'] ="";
		$this->load->model('producto_model');
		$data['categorias'] = $this->producto_model->select_categoria();
		$this->load->view('encabezado');
		$this->load->view('listar_pedidos_view', $data);
		$this->load->view('footer');  
		}

	public function listar_pedidos_c()
		{
		$this->load->model('pedidos_model');
		$data['pedidos'] = $this->pedidos_model->select_pedidos();
		$this->load->library('pagination'); //Se carga la librería de paginación
		$config['base_url'] = base_url().'pedidos_controller/listar_pedidos/';
		$config['first_link'] = 'Primero';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['next_link'] = 'Siguiente';
		//integratción con bootstrap
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '<span></span></span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['total_rows'] = count ($this->pedidos_model->select_pedidos());
		$config['per_page'] = 5; //Número de registros a mostrar
		$config['num_links'] = 2; //Número de links a mostrar
		$config["uri_segment"] = 3;//el segmento de la paginación
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		$data['pedidos'] = $this->pedidos_model->paginas_mostrar(5, $page);
		$data['message'] = "";
		$data['error'] ="";
		$this->load->model('producto_model');
		$data['categorias'] = $this->producto_model->select_categoria();
		$this->load->view('encabezado');
		$this->load->view('listar_pedidos_view_c', $data);
		$this->load->view('footer');  
		}

	public function listar_pedidos_fecha()
  	{
    $this->form_validation->set_rules('fecha1', 'Desde','required' );
    $this->form_validation->set_rules('fecha2', 'Hasta', 'required');
    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    
     if ($this->form_validation->run() == FALSE) {
      $this->listar_pedidos();
    } else {

      $data['message'] = "";
      $var1 = $this->input->post('fecha1');
      $data['error'] ="";
      $var2 = $this->input->post('fecha2');
      if ($var1 > $var2) {
        $data['error'] ="Desde es mayor que Hasta";
      }
        $date1 = str_replace('/', '-', $var1);
        $date2 = str_replace('/', '-', $var2);

        $fecha1 = date('Y-m-d', strtotime($date1));
        $fecha2 = date('Y-m-d', strtotime($date2));
      if ($this->pedidos_model->select_orden_fecha($fecha1, $fecha2) == null) {
        $data['message'] = "No hay resultados";
      }
      $data['pedidos'] = $this->pedidos_model->select_orden_fecha($fecha1, $fecha2);
      $data['titulo'] = "Lista de pedidos";
      $data['categorias'] = $this->producto_model->select_categoria();
      $this->load->view('encabezado');
      $this->load->view('listar_pedidos_view', $data);
      $this->load->view('footer');

	    }
	  }

	public function listar_pedidos_clientes(){
		$data['message'] = "";
		$id=$this->input->post('porid');
		if ($this->pedidos_model->select_orden_cliente($id) == null) {
        $data['message'] = "No hay pedidos del cliente";
		  }
		  
		  $data['pedidos'] = $this->pedidos_model->select_orden_cliente($id);
		  $data['titulo'] = "Lista de pedidos";
		  $data['categorias'] = $this->producto_model->select_categoria();
		  $this->load->view('encabezado');
		  $this->load->view('listar_pedidos_view_c', $data);
		  $this->load->view('footer');

	}

	public function seleccionar_pedidos_por_id($id = NULL)
		{
		$data['pedidos'] = $this->pedidos_model->select_pedidos_id($id);
		$this->load->view('encabezado');
		$this->load->view('listar_pedidos_detalle_view', $data);
		$this->load->view('footer');
		}




    }