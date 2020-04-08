<?php 

    class Pedidos_model extends CI_Model{

        public function listaPedidos($idempresa){
            $query = $this->db->select('p.id, 
                                        p.numpedido, 
                                        p.valorPedido, 
                                        p.dataPedido, 
                                        u.nome,
                                        fp.formaPagamento,
                                        sp.status');
            $this->db->join('users u', 'u.id = p.iduser', 'LEFT');
            $this->db->join('formaPagamento fp', 'fp.id = p.formaPagamento', 'LEFT');
            $this->db->join('statuspedidos sp', 'sp.id = p.status', 'LEFT');
            $this->db->where('p.idempresa', $idempresa);
            $this->db->order_by('p.dataPedido DESC');         
            return $this->db->get("pedidos p")->result_array();
        }

        public function listaSubCategorias($id,$idempresa){
            $this->db->join('subcategorias s', 's.idCategoria = c.id', 'INNER');
            $this->db->where('c.id',$id);
            $this->db->where('c.idempresa', $idempresa);
            return $this->db->get("categorias c")->result_array();
        }

        public function pedidoDet($id,$idempresa){
            $query = $this->db->select('p.id, 
                                        p.numpedido, 
                                        p.valorPedido, 
                                        p.dataPedido, 
                                        u.nome,
                                        fp.formaPagamento,
                                        sp.status');
            $this->db->join('users u', 'u.id = p.iduser', 'LEFT');
            $this->db->join('formaPagamento fp', 'fp.id = p.formaPagamento', 'LEFT');
            $this->db->join('statuspedidos sp', 'sp.id = p.status', 'LEFT');
            $this->db->where('p.numpedido', $id);
            $this->db->where('p.idempresa', $idempresa);
            $this->db->order_by('p.dataPedido DESC');       
            return $this->db->get("pedidos p")->result_array();
        }

        public function listaProdutosDet($id,$idempresa){
            $query = $this->db->select('p.id, p.destaque, p.promocao, p.codigo, p.codbarras, 
                                        p.nome, p.valor, p.peso, p.estoque, p.desconto, 
                                        p.desccurta, p.descricao, p.idcategoria, p.idfornecedor, 
                                        p.altura, p.largura, p.comprimento, p.foto, p.bandeira');
            $this->db->where('id', $id);
            $this->db->where('p.idempresa', $idempresa);
            return $this->db->get("produtos p")->result_array();
        }

        public function listaItensPedido($id,$idempresa){
            $query = $this->db->select('ped.numpedido, 
                                        ped.valorPedido, 
                                        ped.dataPedido,
                                        i.id, 
                                        i.idProduto,
                                        i.qtde,
                                        p.codigo,
                                        p.nome,
                                        p.valor,
                                        p.desconto');
            $this->db->join('produtos p', 'p.id = i.idProduto', 'INNER');
            $this->db->join('pedidos ped', 'i.numPedido = ped.numpedido', 'INNER');
            $this->db->where('i.numPedido', $id);
            $this->db->where('i.idempresa', $idempresa);
            return $this->db->get("itens i")->result_array();
        }

        public function cadastrarProdutos($item){
            $this->db->insert("produtos",$item);
        }

        public function alterarProduto($idProduto,$codigo,$codbarras,$estoque,$nome,$idcategoria,$idfornecedor,$destaque,
        $promocao,$valor,$desconto,$peso,$altura,$largura,$comprimento,$foto,$bandeira,$desccurta,$descricao,$idempresa){
            $this->db->set('codigo',$codigo);      
            $this->db->set('codbarras',$codbarras);      
            $this->db->set('estoque',$estoque);      
            $this->db->set('nome',$nome);      
            $this->db->set('idcategoria',$idcategoria);      
            $this->db->set('idfornecedor',$idfornecedor);      
            $this->db->set('destaque',$destaque);      
            $this->db->set('promocao',$promocao);      
            $this->db->set('valor',$valor);      
            $this->db->set('desconto',$desconto);      
            $this->db->set('peso',$peso);      
            $this->db->set('altura',$altura);      
            $this->db->set('largura',$largura);      
            $this->db->set('comprimento',$comprimento);    

            if(!empty($foto)){
                $this->db->set('foto',$foto);
            }                 
            
            $this->db->set('bandeira',$bandeira);      
            $this->db->set('desccurta',$desccurta);      
            $this->db->set('descricao',$descricao);      
            $this->db->where('id', $idProduto);
            $this->db->where('idempresa', $idempresa);
            $this->db->update('produtos');
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

        public function addItemTemp($item){
            $this->db->insert("itens",$item);
        }

    }
?>