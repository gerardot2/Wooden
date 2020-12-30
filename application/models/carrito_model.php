<?php
//if (!defined('BASEPATH'))
  //  exit('No direct script access allowed');
class carrito_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }
    //obtenemos la cantidad de filas de los productos
    //para realizar la paginación
    function filas() {
         $consulta = $this->db->select('id_producto');
        $consulta =  $this->db->where('cantidad > ', '0');
         $consulta = $this->db->where('estado  > ', '  0');
       // $this->db->from('productos');
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }
    //obtenemos todos los productos para paginarlos
    function total_productos_paginados($por_pagina, $segmento) {
        $consulta = $this->db->select('*');
        $consulta = $this->db->where('cantidad > ', '0');
        $consulta = $this->db->where('estado > ', '0');
        $consulta = $this->db->get('producto', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }
    //cuando pulsemos en añadir al carrito esta función será la encargada
    //de saber que producto hemos seleccionado por su id, que la envíamos desde
    //la vista al controlador, y desde el controlador aquí, el modelo.
    function porId($id) {
        $this->db->where('id_producto', $id);
        $productos = $this->db->get('producto');
        foreach ($productos->result() as $producto) {
            $data[] = $producto;
        }
       /* if ($producto->opciones) {
            $producto->opciones = explode(',', $producto->opciones);
        }*/
        return $producto;
    }


    public function obt_vent()
    {
        $query = $this->db->get("ventas");
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }  
    }
}