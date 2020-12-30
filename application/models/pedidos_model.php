<?php

class pedidos_model extends CI_Model
{
function __construct()
{
parent::__construct();
}
public function guardar_orden_pedido($data){
$this->db->insert('orden_pedido', $data);
}
public function guardar_detalle_pedido($data){
$this->db->insert('detalle_pedido', $data);
}

public function actualizar_stock($data, $id)

{
$this->db->select('*');
$this->db->from('producto');
$this->db->where('id_producto', $id);
$this->db->update('producto', $data);
}

public function registrar_compra($data){
      //busco el id del producto
       $d=$data['producto_id'];
        $this->db->where('id_producto',$d);
        //obtengo el producto
        $dato = $this->db->get('producto');
        //su arreglo
        $res=$dato->row_array();print_r($res);die;
        //su estock
        $stock=$res['cantidad'];
        //cantidad del producto a comprar
        $cant=$data['cantidad'];
        if($stock >= $cant){
        //actualizo el stock
        $menos=$stock-$cant;
        $quita=array('cantidad'=>$menos);
        $this->db->where('id_producto',$d);
        $this->db->update('producto', $quita);
        $this->db->insert('detalle_pedido', $data);
        }else{
             $this->session->set_flashdata('cantidadMayor', 'la cantidad es mayor que el stock');
             redirect('carrito', 'refresh');
        }
    }
	
public function select_pedidos_id($id)
	{
	$this->db->select('*');
	$this->db->from('detalle_pedido');
	$this->db->where('id_orden', $id);
	$this->db->join('orden_pedido', 'orden_pedido.orden_id = detalle_pedido.id_orden');
	$this->db->join('producto', 'producto.id_producto = detalle_pedido.id_producto');
	$this->db->join('categoria_prod', 'categoria_prod.id_categoria = producto.id_categoria');
	$this->db->join('persona', 'persona.id_persona = orden_pedido.id_cliente');
	$query = $this->db->get();
	return $query->result();
	}
public function select_pedidos()
	{
	$this->db->select('*');
	$this->db->from('orden_pedido');
	$this->db->order_by('orden_id', 'desc');
	$this->db->join('persona', 'persona.id_persona = orden_pedido.id_cliente');
	$query = $this->db->get();
	return $query->result();
	}

public function select_orden_fecha($fecha1, $fecha2){
    $sql = '\''.$fecha1.'\' AND \''.$fecha2.'\'';
    $query = $this->db->query('SELECT * FROM orden_pedido JOIN persona on persona.`id_persona` = id_cliente WHERE orden_fecha BETWEEN '.$sql);
    return $query->result();
  	}

public function select_orden_cliente($id){
	
	$this->db->select('*');
	$this->db->from('orden_pedido');
	$this->db->where('id_cliente', $id);
	$this->db->join('persona', 'persona.id_persona = orden_pedido.id_cliente');
	$query = $this->db->get();
	return $query->result();
	}


public function paginas_mostrar($limit, $row){

	$this->db->select('*');
	$this->db->from('orden_pedido');
	$this->db->limit($limit,$row);
	$this->db->join('persona', 'persona.id_persona = orden_pedido.id_cliente');
	$query = $this->db->get();
	return $query->result();
	}


}