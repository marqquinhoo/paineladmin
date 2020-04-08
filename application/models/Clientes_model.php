<?php 

    class Clientes_model extends CI_Model{

        public function listaClientes($idempresa){
            $this->db->where('perfil', '2');
            $this->db->where('idempresa', $idempresa);
            $this->db->order_by('nome');         
            return $this->db->get("users")->result_array();
        }
    }
?>