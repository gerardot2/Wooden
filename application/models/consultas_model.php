<?php
/**
*
* @package Models
*/
class Consultas_model extends CI_Model
{	
function __construct()
{
parent::__construct();
}

public function guardar_consulta($data){
$this->db->insert('consultas', $data);
    
}

public function select_consulta()
{
$this->db->select('*');
$this->db->from('consultas');
$query = $this->db->get();
return $query->result();

}

public function actualizar_consulta($data, $id)

{
$this->db->where('id_consulta', $id);
$this->db->update('consultas', $data);
}

public function eliminar_consulta($data, $id)
{
$this->db->where('id_consulta', $id);
$this->db->update('consultas', $data);
}

public function select_consulta_id($id)
{

$this->db->select('*');
$this->db->from('consultas');
$this->db->where('id_consulta', $id);
$query = $this->db->get();
return $query->result();

}
}