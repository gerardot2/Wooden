<?php
	/**
	 * 
	 */
	class Producto_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

public function guardar_producto($data)
{
	$this->db->insert('producto', $data);
}


public function paginas_mostrar($limit, $row){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->limit($limit,$row);
		$this->db->join('categoria_prod', 'categoria_prod.id_categoria = producto.id_categoria');
		$query = $this->db->get();
		return $query->result();
}

public function select_categoria()
{
		$query= $this->db->get('categoria_prod');
		return $query->result();
}

Public function select_productos(){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('cantidad>', 0);
		$this->db->where('estado', 1);
		$this->db->join('categoria_prod', 'categoria_prod.id_categoria = producto.id_categoria');
		$query = $this->db->get();
		return $query->result();
}
Public function get_productos(){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('cantidad>', 0);
		$this->db->where('estado', 1);
		$this->db->join('categoria_prod', 'categoria_prod.categoria_id = producto.id_categoria');
		$query = $this->db->get();
		return $query->result();
}

    function set_producto($id,$data){
        $this->db->where('id_producto', $id);
        $query = $this->db->update('producto', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

public function select_producto_id($id)
	{
	$this->db->select('*');
	$this->db->from('producto');
	$this->db->where('id_producto', $id);
	$query = $this->db->get();
	return $query->result();
	}

public function select_producto_cat($id)
	{
	$this->db->select('*');
	$this->db->from('producto');
	$this->db->where('cantidad>', 0);
	$this->db->where('estado', 1);
	$this->db->where('id_categoria', $id);
	$query = $this->db->get();
	return $query->result();
	}

public function actualizar_producto($data, $id)
{
$this->db->where('id_producto', $id);
$this->db->update('producto', $data);
}



}