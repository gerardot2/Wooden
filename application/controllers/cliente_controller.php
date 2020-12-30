<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
	}

public function registrarse()
{
	$this->load->view('encabezado');
	$this->load->view('registrarseprin');
	$this->load->view('footer');
}

public function registrar_cliente()
{
	
	$this->form_validation->set_rules('usuarioc','Usuario','required');
	$this->form_validation->set_rules('nombrec','Nombre del usuario','required');
	$this->form_validation->set_rules('apellidoc','Apellido del usuario','required');
	$this->form_validation->set_rules('domicilioc','Domicilio de usuario','required');
	$this->form_validation->set_rules('ciudadc','Ciudad de usuario','required');
	$this->form_validation->set_rules('provinciac','Provincia de usuario','required');
	$this->form_validation->set_rules('telefono','Telefono de usuario','integer');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.mail]');
	$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]');
	$this->form_validation->set_rules('passconf', 'Confirmar password', 'trim|required|matches[password]');


	$this->form_validation->set_message('valid_email', 'Email invalido');
	$this->form_validation->set_message('matches','Las Contraseñas no coinciden');
	$this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
	$this->form_validation->set_message('required', 'El campo %s es obligatorio');
	$this->form_validation->set_message('is_unique', 'La direccion de Email ingresada %s ya esta en uso');
	$this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');


	if ($this->form_validation->run() == FALSE) 
	{
		
		$this->registrarse();
	} else 
	{
		
		$this->insertar_cliente();
		redirect('login');
	}
}
public function insertar_cliente()
{
	
	/**$apellidoc = $this ->input->post('apellidoc');*/

	$cliente = array(
		
		'apellido'=>$this->input->post('apellidoc'),
		'nombre'=>$this->input->post('nombrec'),
		'telefono'=>$this->input->post('telefono'),
		'domicilio'=>$this->input->post('domicilioc'),
		'ciudad'=>$this->input->post('ciudadc'),
		'provincia'=>$this->input->post('provinciac'),
		'id_perfil'=> 2
);
	$this->load->model('cliente_model');

	$this->cliente_model->guardar_cliente($cliente);

	


	$id_persona = $this->db->insert_id();

	$usuario = array(
		'nombreusuario'=>$this->input->post('usuarioc'),
		'mail' => $this->input->post('email'),
		'password'=> $this->input->post('password'),
		'id_persona' => $id_persona
	);
	
	$this->load->model('usuario_model');
	
	$this->usuario_model->guardar_usuario($usuario);
	/**redirect('usuarios_controller/login');*/

}

	public function select_persona_id($id){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->where('id_persona', $id);
		$query = $this->db->get();
		return $query->result();
		}

	/** FUNCION PARA ACTUALIZAR CLIENTE EN LA BD*/
	public function editar_clientes($id=NULL) {
		$this->load->model('cliente_model');
		$pers = $this->cliente_model->select_cliente_id($id);
		foreach($pers as $row) {
		$data['id_usuario'] = $row->id_persona;
		$data['usuario'] = $row->nombreusuario;
		$data['apellido'] = $row->apellido;
		$data['nombre'] = $row->nombre;
		$data['telefono'] = $row->telefono;
		$data['domicilio'] = $row->domicilio;
		$data['ciudad'] = $row->ciudad;
		$data['provincia'] = $row->provincia;
		$data['email']= $row->mail;
					
		}
		$this->load->view('encabezado');
		$this->load->view('edit_misdatos', $data);
		$this->load->view('footer');
		}

	public function actualizar_cliente(){
				
	$this->form_validation->set_rules('usuarioc','Usuario','required');
	$this->form_validation->set_rules('nombrec','Nombre del usuario','required');
	$this->form_validation->set_rules('apellidoc','Apellido del usuario','required');
	$this->form_validation->set_rules('domicilioc','Domicilio de usuario','required');
	$this->form_validation->set_rules('domicilioc','Ciudad de usuario','required');
	$this->form_validation->set_rules('domicilioc','Provincia de usuario','required');
	$this->form_validation->set_rules('telefonoc','Telefono de usuario','required|integer|min_length[10]');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('password', 'Contraseña', 'trim|min_length[8]');
	$this->form_validation->set_rules('passconf', 'Confirmar password', 'trim|matches[password]');


	$this->form_validation->set_message('valid_email', 'Email invalido');
	$this->form_validation->set_message('matches','Las Contraseñas no coinciden');
	$this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
	$this->form_validation->set_message('required', 'El campo %s es obligatorio');
	$this->form_validation->set_message('is_unique', 'La direccion de Email ingresada %s ya esta en uso');
	$this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');


	if ($this->form_validation->run() == FALSE) 
	{
		$id = $this->uri->segment(2);
		$this->editar_clientes($id);
	} else {
		$id = $this->uri->segment(2);
		$data = array(
		'apellido' => $this->input->post('apellidoc'),
		'nombre' => $this->input->post('nombrec'),
		'telefono' => $this->input->post('telefonoc'),
		'domicilio' => $this->input->post('domicilioc'),
		'ciudad' => $this->input->post('ciudadc'),
		'provincia' => $this->input->post('provinciac'));
		
		 if (empty($this->input->post('password'))) {
			$data1 = array(
			'nombreusuario' => $this->input->post('usuarioc'),
			'mail' => $this->input->post('email'));
		}	else {
			$data1 = array(
			'nombreusuario' => $this->input->post('usuarioc'),
			'mail' => $this->input->post('email'),
			'password' => $this->input->post('password'));}


		$this->load->model('cliente_model');
		$this->load->model('usuario_model');
		$this->cliente_model->actualizar_cliente($data, $id);
		$this->usuario_model->actualizar_usuario($data1, $id);
		$this->editar_clientes($id);	
		}
		}
	}

	














