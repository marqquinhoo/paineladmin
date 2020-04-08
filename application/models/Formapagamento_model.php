<?php 

    class Formapagamento_model extends CI_Model{

        public function listaFormaPagamento(){
            $this->db->order_by('formaPagamento');         
            return $this->db->get("formapagamento")->result_array();
        }
    }
?>