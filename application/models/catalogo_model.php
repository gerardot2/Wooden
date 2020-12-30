<?php
//if (!defined('BASEPATH'))
  //  exit('No direct script access allowed');
class Catalogo_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }
    //obtenemos la cantidad de filas de los productos
    //para realizar la paginación
    function filas() {
        $consulta = $this->db->select('id_producto');
        $consulta =  $this->db->where('cantidad > ', '0');
        $consulta = $this->db->where('estado  > ', '  0');
       //$consulta = $this->db->where('id_categoria  = ', '  1');
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

    public function buscar($query){
        
    $this->db->like('descripcion',$query);
    $consulta = $this->db->get("producto");
    return $consulta;
    
    }
    
}