<?php class usuario_model extends CI_Model {
	public function __construct() {
	parent::__construct();
	}
	
	function guardar_usuario($data){
		$this->db->insert('usuario', $data);
		}

	public function buscar_usuario($usuario, $contrasenia)
		{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nombreusuario', $usuario);
		$this->db->where('password', $contrasenia);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
		}

	public function buscar_persona($id_persona){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->where('id_persona', $id_persona);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
		}

	public function actualizar_usuario($data, $id){
		$this->db->where('id_persona', $id);
		$this->db->update('usuario', $data);
		}
	}


	