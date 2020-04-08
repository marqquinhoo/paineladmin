<?php 

    class Categoriaspainel_model extends CI_Model{

        public function listaCategoriasPainel($idempresa){
            $this->db->select('c.id, c.categoria, count(p.id) as total');
            $this->db->join('produtos p', 'p.idCategoria = c.id');
            $this->db->where('c.idempresa', $idempresa);
            $this->db->group_by('c.id, c.categoria');         
            $this->db->order_by('c.categoria');         
            return $this->db->get("categorias c")->result_array();     
        }

        public function novaCategoria($item){
            $this->db->insert("categorias",$item);    
        }

    }
?>