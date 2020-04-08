<?php 

    class Categorias_model extends CI_Model{

        public function listaCategorias($idempresa){
            $query = $this->db->select('c.id, c.categoria, count(p.id) as total');
            $this->db->join('produtos p', 'p.idCategoria = c.id', 'LEFT');
            $this->db->where('c.idempresa', $idempresa);
            $this->db->group_by('c.id');
            $this->db->group_by('c.categoria');
            $this->db->order_by('c.categoria');         
            return $this->db->get("categorias c")->result_array();
        }

        public function listaSubCategorias($id, $idempresa){
            $this->db->join('subcategorias s', 's.idCategoria = c.id', 'INNER');
            $this->db->where('c.id',$id);
            $this->db->where('c.idempresa', $idempresa);
            return $this->db->get("categorias c")->result_array();
        }

        public function listaCategoriasDet($id,$idempresa){
            $query = $this->db->select('c.id, c.categoria, count(p.id) as total');
            $this->db->join('produtos p', 'p.idCategoria = c.id', 'LEFT');
            $this->db->where('c.id',$id);
            $this->db->where('c.idempresa', $idempresa);
            return $this->db->get("categorias c")->result_array();
        }

        public function cadastrarCategoria($item){
            $this->db->insert("categorias",$item);
        }

        public function cadastrarSubCategoria($item){
            $this->db->insert("subcategorias",$item);
        }

        public function alterarCategoria($idCategoria, $categoria,$idempresa){
            $this->db->set('categoria',$categoria);      
            $this->db->where('id', $idCategoria);
            $this->db->where('idempresa', $idempresa);
            $this->db->update('categorias');
        }

        public function listaCategoriasDuplicadas($categoria,$idempresa){
            $query = $this->db->select('categoria');
            $this->db->like('categoria',$categoria);       
            $this->db->where('idempresa', $idempresa);
            return $this->db->get("categorias")->result_array();
        }

        public function excluirCategoria($idCategoria,$idempresa){
             $this->db->where('id', $idCategoria);
             $this->db->where('idempresa', $idempresa);
             $this->db->delete('categorias');
        }

        public function excluirSubCategoria($idSubCategoria,$idempresa){
             $this->db->where('id', $idSubCategoria);
             $this->db->where('idempresa', $idempresa);
             $this->db->delete('subcategorias');
        }

    }
?>