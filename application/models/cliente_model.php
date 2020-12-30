<?php class cliente_model extends CI_Model {
	public function __construct() {
	parent::__construct();
	}
	
	function guardar_cliente($data)
{
$this->db->insert('persona', $data);

}
	Public function select_clientes(){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->join('usuario', 'usuario.id_persona = persona.id_persona');
		$query = $this->db->get();
		return $query->result();
}

	Public function select_cliente_id($id){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->where('persona.id_persona', $id);
		$this->db->join('usuario', 'usuario.id_persona = persona.id_persona');
		$query = $this->db->get();
		return $query->result();
}

	public function actualizar_cliente($data, $id){
		$this->db->where('id_persona', $id);
		$this->db->update('persona', $data);
		}

	}
