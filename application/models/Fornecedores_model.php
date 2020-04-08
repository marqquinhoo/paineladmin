<?php 

    class Fornecedores_model extends CI_Model{

        public function listafornecedores($idempresa){
            $query = $this->db->select('f.id, f.fornecedor, count(p.id) as total');
            $this->db->join('produtos p', 'p.idFornecedor = f.id', 'LEFT');
            $this->db->where('f.idempresa', $idempresa);
            $this->db->group_by('f.id');
            $this->db->group_by('f.fornecedor');
            $this->db->order_by('f.fornecedor');         
            return $this->db->get("fornecedores f")->result_array();
        }

        public function listaFornecedorDet($id,$idempresa){
            $query = $this->db->select('f.id, f.fornecedor, count(p.id) as total');
            $this->db->join('produtos p', 'p.idFornecedor = f.id', 'LEFT');
            $this->db->where('f.id',$id);
            $this->db->where('f.idempresa', $idempresa);
            return $this->db->get("fornecedores f")->result_array();
        }

        public function cadastrarFornecedor($item){
            $this->db->insert("fornecedores",$item);
        }

        public function alterarFornecedor($idFornecedor, $fornecedor, $idempresa){
            $this->db->set('fornecedor',$fornecedor);      
            $this->db->where('id', $idFornecedor);
            $this->db->where('idempresa', $idempresa);
            $this->db->update('fornecedores');
        }

        public function excluirFornecedor($idFornecedor,$idempresa){
             $this->db->where('id', $idFornecedor);
             $this->db->where('idempresa', $idempresa);
             $this->db->delete('fornecedores');
        }

    }
?>