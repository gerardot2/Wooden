<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_controller extends CI_Controller {

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

		public function loguearse()
		{
			$this->load->view('encabezado');
			$this->load->view('login_view');
			$this->load->view('footer');
		}

		
		public function loguear_cliente()
        {
        

        $this->form_validation->set_rules('usuario','Usuario','required|callback_existe_en_bd');                
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|callback_verificar_pass');

        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('min_length', 'Su contraseña debe tener por lo menos 8 caracteres.');

        if ($this->form_validation->run() == FALSE) {
		
		$this->loguearse();
		}
		 else {
		 	$this->usuario_logueado();		
		}


        }


        public function existe_en_bd(){
        	$usuarioG = $this->input->post('usuario');
			$query = $this->db->get_where('usuario', array('nombreusuario' => $usuarioG)); 

            if ($query->num_rows() == 0 )
                {
                        
                        $this->form_validation->set_message('existe_en_bd', 'Por favor ingrese un nombre de usuario existente');
                        return false;

                }
                else{
                return TRUE;
                }
        }

        public function verificar_pass(){
			$usuarioG = $this->input->post('usuario');
			$passwordG = $this->input->post('password');
        	$query2 = $this->db->get_where('usuario', array('nombreusuario' => $usuarioG)); 
 				
 			foreach ($query2->result() as $row){
 			$pass = $row->password;

	 		if ($passwordG != $pass){
	 			$this->form_validation->set_message('verificar_pass', 'Usuario o Contrasena no validos');
	 			return false;
	 			}
	 			else {
				$this->load->model('usuario_model');
				$usuario = $this->usuario_model->buscar_usuario($usuarioG,$passwordG);
				

				if ($usuario){
					$persona_id = $usuario->id_persona;
					$persona = $this->usuario_model->buscar_persona($persona_id);
					
					$datos_usuario = array(
					'id_usuario' => $persona->id_persona,
					'nombre' => $persona->nombre,
					'apellido'=> $persona->apellido,
					'perfil'=> $persona->id_perfil,
					'login' => TRUE
					
					);

					$this->session->set_userdata($datos_usuario);
					

					return true;
				} else {
					return false;

				}

				}
 		}}

 		
 		

 	public function usuario_logueado(){
 			if ($this->session->userdata('login') == 1){
 				switch ($this->session->userdata('perfil')){
 					case '1';
 					redirect('Producto_controller/cargar_producto');
 					break;

 					case '2';
 					redirect('Principal');
 					break;
 				}
 			}
 				else{
 					redirect('login');
 					//$this->loguearse();
 				}
 			
 	}

 	public function cerrar_sesion(){
		$this->session->sess_destroy();
		redirect('Principal');
		}
}
	

 	
        



 //public function sacarDatos(){
 	//$query = $this->db->get_where('usuario', array('nombreusuario' =>'Luis01')); 
 	//foreach ($query->result() as $row)
 	//	echo ("Contrasenia: " . $row->password);
 

	
		



