<?php 

    class Login_model extends CI_Model{

        public function login($usuario, $senha){
            $this->db->select('nome, email, perfil, idempresa');
            $this->db->where("email",$usuario);
            $this->db->where("password",$senha);
            $usuario = $this->db->get("users")->row_array();
            return $usuario;

        }

    }
?>