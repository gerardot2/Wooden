	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

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

	public function index()
	{
		$this->load->view('encabezado');
		$this->load->view('principal');
		$this->load->view('footer');
	}

	public function prodHogar()
	{
		$this->load->view('encabezado');
		$this->load->view('productoshogar');
		$this->load->view('footer');

	}

	
	public function Terminos()
	{
		$this->load->view('encabezado');
		$this->load->view('terminos');
		$this->load->view('footer');
	}

	public function quienes()
	{
		$this->load->view('encabezado');
		$this->load->view('quienessomos');
		$this->load->view('footer');
	}

	public function ccomercial()
	{
		$this->load->view('encabezado');
		$this->load->view('ccomercio');
		$this->load->view('footer');
	}

	public function loguearse()
	{
		$this->load->view('encabezado');
		$this->load->view('login_view');
		$this->load->view('footer');
	}


	public function carrito()
	{
		$this->load->view('encabezado');
		$this->load->view('carrito_view');
		$this->load->view('footer');
	}
}
