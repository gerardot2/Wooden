<?php
class carrito_controller extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('carrito_model');
        
    }
    
    public function index()
    {
		if (!$this->cart->contents()){
		$data['message'] = 'El carrito está vacío!';
		}else{
		$data['message'] = '';
		}
		$this->load->view('encabezado');
		$this->load->view('carrito_view', $data);
		$this->load->view('footer');
		}
  	
    
    function agregarProducto()
    {
        
        //Tomamos los productos en un array para insertarlos en el carrito
        $insert = array(
            'id' => $this->input->post('id'),
            'qty' => 1,
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name')
        );
    	
        $this->cart->insert($insert);

        
        $uri = $this->input->post('uri');
        //redirigimos mostrando un mensaje con las sesiones flashdata
        //de codeigniter confirmando que hemos agregado el producto
        $this->session->set_flashdata('agregado', 'El producto fue agregado correctamente');
        redirect('carrito'.$uri, 'refresh');
    }

    
    function eliminarUnProducto()
    {
        $idPro=$this->input->get('id');
        $itm=$this->cart->get_item($idPro);
        $cant=$itm['qty']-1;
                
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $producto = array(
            'rowid' =>  $idPro,
            'qty' => $cant
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($producto);
        
        $this->session->set_flashdata('productoEliminado1', 'Un articulo eliminado correctamente');
        redirect('carrito', 'refresh');
    }

    function eliminarProducto()
    {
        $idPro=$this->input->get('id');
               
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $producto = array(
            'rowid' =>  $idPro,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($producto);
        
        $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        redirect('carrito', 'refresh');
    }
    
    function eliminarCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
        redirect('carrito', 'refresh');

    }

       
}