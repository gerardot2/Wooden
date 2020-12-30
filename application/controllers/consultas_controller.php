<?php
/**
*
* @package Controllers
*
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Consultas_controller extends CI_Controller {

function __construct()

{
parent::__construct();
}


public function Pagcontacto()
{
$this->load->view('encabezado');
$this->load->view('contacto');
$this->load->view('footer');
}

public function registrar_consulta()
{

$this->form_validation->set_rules('nombyape', 'Nombre del usuario', 'required');
$this->form_validation->set_rules('comentarios', 'Comentarios', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
$this->form_validation->set_rules('tel', 'Telefono del usuario', 'required');

$this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');
$this->form_validation->set_message('required', 'El campo %s es obligatorio');

if ($this->form_validation->run() == FALSE) {
$this->Pagcontacto();
} else {
$this->guardar_consulta();

}
}


public function listar_consultas()
	{
		$this->load->model('consultas_model');
		$data['consulta'] = $this->consultas_model->select_consulta();
		$this->load->view('encabezado');
		$this->load->view('listar_mjs_view',$data);
		$this->load->view('footer');
	}

public function listar_consulta_id($id = NULL)
{
$this->load->model('consultas_model');
$data['consulta'] = $this->consultas_model->select_consulta_id($id);
$this->load->view('encabezado');
$this->load->view('listar_mjs_detalle_view', $data);
$this->load->view('footer');
$this->eliminar_consulta1($id);
}


function guardar_consulta() { 
         $data = array( 
            'nombyape'=> $this->input->post('nombyape'),
			'email'=> $this->input->post('email'),
			'telefono' => $this->input->post('tel'),
			'comentario'=> $this->input->post('comentarios'),
			'feed' => $this->input->post('newsletter'),
			'estado' => 1,
          );
		    $this->load->model('consultas_model'); 
		    $this->consultas_model->guardar_consulta($data); 
		    $uri = $this->input->post('uri');
			    //redirigimos mostrando un mensaje con las sesiones flashdata
			    //de codeigniter confirmando que hemos enviado el mensaje.
		    $this->session->set_flashdata('enviado', 'El mensaje fue enviado correctamente');
		    redirect('contacto'.$uri, 'refresh');
		        	}






public function activar_consulta($id=NULL)
{
$data = array(
'estado'=> '1'
);
$this->load->model('consultas_model');
$this->consultas_model->actualizar_consulta($data, $id);

redirect('consultas_controller/listar_consultas');
}

function eliminar_consulta1($id=NULL)
{
$data = array(
'estado'=> '0'
);
$this->load->model('consultas_model');
$this->consultas_model->actualizar_consulta($data, $id);}


public function eliminar_consulta($id=NULL)
{
$data = array(
'estado'=> '0'
);
$this->load->model('consultas_model');
$this->consultas_model->actualizar_consulta($data, $id);

redirect('consultas_controller/listar_consultas');
}
}	