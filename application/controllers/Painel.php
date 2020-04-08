<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function index()
	{		
		$this->load->view('painel/index.php');
	}

	public function inicio()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->view('painel/inicio.php');
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	/* Categorias */

	public function categorias()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$categorias = $this->categorias_model->listaCategorias($idempresa);

			$dados = array("categorias" => $categorias);
			$this->load->view('painel/categorias.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function cadcategorias()
	{
		if(!empty($this->session->usuario_logado['email'])){

			$this->load->model("categorias_model");
			$item = array("categoria" => $this->input->post("categoria"),
						  "idempresa" => $this->session->usuario_logado['idempresa'] );
			if($this->categorias_model->cadastrarCategoria($item)){
				return true;
			}else{
				return false;
			}	
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 	
	}

	public function cadsubcategoria()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$item = array("idCategoria" => $this->input->post("idCategoria"),
						  "subcategoria" => $this->input->post("subcategoria"),
						  "idempresa" => $this->session->usuario_logado['idempresa']);
			if($this->categorias_model->cadastrarSubCategoria($item)){
				return true;
			}else{
				return false;
			}	
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 	
	}

	public function categoriasdet()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$idCategoria = $this->uri->segment(3);
			$idempresa = $this->session->usuario_logado['idempresa'];
			$categorias = $this->categorias_model->listaCategoriasDet($idCategoria,$idempresa);
			$subcategorias = $this->categorias_model->listaSubCategorias($idCategoria,$idempresa);
			$dados = array("categorias" => $categorias, 
						   "subcategorias" => $subcategorias);					   
			$this->load->view('painel/categoriasdet.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 	
	}

	public function altcategorias()
	{		
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$idCategoria = $this->input->post('idCategoria');
			$categoria = $this->input->post('categoria');
			$idempresa = $this->session->usuario_logado['idempresa'];
			$alterar = $this->categorias_model->alterarCategoria($idCategoria, $categoria, $idempresa);
			if($alterar){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function excluirCategoria()
	{		
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$idCategoria = $this->input->post('idCategoria');
			$idempresa = $this->session->usuario_logado['idempresa'];
			$excluir = $this->categorias_model->excluirCategoria($idCategoria, $idempresa);		
			if($excluir){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function excluirSubCategoria()
	{		
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$idSubCategoria = $this->input->post('idSubCategoria');
			$idempresa = $this->session->usuario_logado['idempresa'];
			
			$excluir = $this->categorias_model->excluirSubCategoria($idSubCategoria, $idempresa);		
			if($excluir){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}
	/* Fim categorias */



	/* Fornecedores */
	public function fornecedores()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("fornecedores_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$fornecedores = $this->fornecedores_model->listafornecedores($idempresa);
			$dados = array("fornecedores" => $fornecedores);
			$this->load->view('painel/fornecedores.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function cadfornecedores()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("fornecedores_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$item = array("fornecedor" => $this->input->post("fornecedor"),
		                  "idempresa" => $idempresa);
			if($this->fornecedores_model->cadastrarFornecedor($item)){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 	
	}

	public function fornecedoresdet()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("fornecedores_model");
			$idFornecedor = $this->uri->segment(3);
			$idempresa = $this->session->usuario_logado['idempresa'];
			$fornecedores = $this->fornecedores_model->listaFornecedorDet($idFornecedor, $idempresa);
			$dados = array("fornecedores" => $fornecedores);
			$this->load->view('painel/fornecedoresdet.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function altfornecedores()
	{		
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("fornecedores_model");
			$idFornecedor = $this->input->post('idFornecedor');
			$fornecedor = $this->input->post('fornecedor');
			$idempresa = $this->session->usuario_logado['idempresa'];
			$alterar = $this->fornecedores_model->alterarFornecedor($idFornecedor, $fornecedor, $idempresa);		
			if($alterar){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function excluirFornecedor()
	{	
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("fornecedores_model");
			$idFornecedor = $this->input->post('idFornecedor');
			$idempresa = $this->session->usuario_logado['idempresa'];
			$excluir = $this->fornecedores_model->excluirFornecedor($idFornecedor, $idempresa);		
			if($excluir){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}
	/* Fim fornecedores */


	/* Produtos */

	public function produtos()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("produtos_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$produtos = $this->produtos_model->listaprodutos($idempresa);
			$dados = array("produtos" => $produtos);
			$this->load->view('painel/produtos.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function produtosn()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("categorias_model");
			$this->load->model("fornecedores_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$categorias = $this->categorias_model->listaCategorias($idempresa);
			$fornecedores = $this->fornecedores_model->listafornecedores($idempresa);
			$dados = array("categorias" => $categorias,
						   "fornecedores" => $fornecedores);
			$this->load->view('painel/produtosn.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function cadprodutos()
	{
		if(!empty($this->session->usuario_logado['email'])){

			$config['upload_path'] = "./uploads/";
			$config['allowed_types'] = "gif|jpg|png";
			$config['max_size'] = "300";
			$this->load->library('upload',$config);
			
			if (!$this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();			
				return false;
			}else{
				$data = $this->upload->data();
				$nomeFoto = $data['file_name'];
				 $this->load->model("produtos_model");
				$idempresa = $this->session->usuario_logado['idempresa'];
			 	$item = array("destaque" => $this->input->post("destaque"),
			 					"promocao" => $this->input->post("promocao"),
			 					"codigo" => $this->input->post("codigo"),
								"codbarras" => $this->input->post("codbarras"),
								"nome" => $this->input->post("nome"),
								"valor" => $this->input->post("valor"),
								"peso" => $this->input->post("peso"),
								"estoque" => $this->input->post("estoque"),
								"desconto" => $this->input->post("desconto"),
								"desccurta" => $this->input->post("desccurta"),
								"descricao" => $this->input->post("descricao"),
								"idcategoria" => $this->input->post("idcategoria"),
								"idfornecedor" => $this->input->post("idfornecedor"),
								"altura" => $this->input->post("altura"),
								"largura" => $this->input->post("largura"),
								"comprimento" => $this->input->post("comprimento"),
								"foto" => $nomeFoto,
								"bandeira" => $this->input->post("bandeira"),
							    "idempresa" => $idempresa);
				if($this->produtos_model->cadastrarProdutos($item)){
					return true;
				}else{
					return false;
				}
			}		
		}
	}

	public function produtosdet()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("produtos_model");
			$this->load->model("categorias_model");
			$this->load->model("fornecedores_model");
			$idProduto = $this->uri->segment(3);
			$idempresa = $this->session->usuario_logado['idempresa'];
			$produtos = $this->produtos_model->listaProdutosDet($idProduto,$idempresa);
			$categorias = $this->categorias_model->listaCategorias($idempresa);
			$fornecedores = $this->fornecedores_model->listafornecedores($idempresa);
			$dados = array("produtos" => $produtos,
						   "categorias" => $categorias,
						   "fornecedores" => $fornecedores);
			$this->load->view('painel/produtosdet.php',$dados);	
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function altprodutos()
	{		
		if(!empty($this->session->usuario_logado['email'])){
				
				if(!empty($_FILES['foto'])){
					$config['upload_path'] = "./uploads/";
					$config['allowed_types'] = "gif|jpg|png";
					$config['max_size'] = "300";
					$config['encrypt_name'] = true;
					$this->load->library('upload',$config);
					$this->upload->do_upload('foto');
					$data = $this->upload->data();
					$foto = $data['file_name'];
				}else{
					$foto = "";
				}
					// $this->output->enable_profiler(TRUE);
					$this->load->model("produtos_model");
					$idProduto = $this->input->post('idProduto');
					$codigo = $this->input->post('codigo');
					$codbarras = $this->input->post('codbarras');
					$estoque = $this->input->post('estoque');
					$nome = $this->input->post('nome');
					$idcategoria = $this->input->post('idcategoria');
					$idfornecedor = $this->input->post('idfornecedor');
					$destaque = $this->input->post('destaque');
					$promocao = $this->input->post('promocao');
					$valor = $this->input->post('valor');
					$desconto = $this->input->post('desconto');
					$peso = $this->input->post('peso');
					$altura = $this->input->post('altura');
					$largura = $this->input->post('largura');
					$comprimento = $this->input->post('comprimento');
					$bandeira = $this->input->post('bandeira');
					$desccurta = $this->input->post('desccurta');
					$descricao = $this->input->post('descricao');
					$idempresa = $this->session->usuario_logado['idempresa'];

					$alterar = $this->produtos_model->alterarProduto($idProduto,$codigo,$codbarras,$estoque,$nome,$idcategoria,$idfornecedor,$destaque,$promocao,$valor,$desconto,$peso,$altura,$largura,$comprimento,$foto,$bandeira,$desccurta,$descricao,$idempresa);
					redirect('./painel/produtos');
			
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function excluirprodutos()
	{	
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("fornecedores_model");
			$idFornecedor = $this->input->post('idFornecedor');
			$idempresa = $this->session->usuario_logado['idempresa'];
			$excluir = $this->fornecedores_model->excluirFornecedor($idFornecedor,$idempresa);		
			if($excluir){
				return true;
			}else{
				return false;
			}
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		}  
	}
	/* Fim fornecedores */

	/* Pedidos */

	public function pedidos()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("pedidos_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$pedidos = $this->pedidos_model->listaPedidos($idempresa);
			$dados = array("pedidos" => $pedidos);
			$this->load->view('painel/pedidos.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function pedidosDet()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("pedidos_model");

			$idPedido = $this->uri->segment(3);
			$idempresa = $this->session->usuario_logado['idempresa'];
			$pedido = $this->pedidos_model->pedidoDet($idPedido,$idempresa);
			$itens = $this->pedidos_model->listaItensPedido($idPedido,$idempresa);

			$dados = array( "pedido" => $pedido,
							"itens" => $itens);
			$this->load->view('painel/pedidosdet.php',$dados);	
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function cadItemPedido()
	{ 
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("pedidos_model");
			$idempresa = $this->session->usuario_logado['idempresa'];
			$item = array("numpedido" => $this->input->post("numpedido"),
						  "iduser" => $this->input->post("iduser"),
						  "idproduto" => $this->input->post("idproduto"),
						  "qtde" => $this->input->post("idproduto"),
						  "idempresa" => $idempresa );
			if($this->pedidos_model->cadastrarItem($item)){
				return true;
			}else{
				return false;
			}	
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 	
	}
	public function removeItemPedido()
	{ 
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("pedidos_model");
			$idempresa = $this->session->usuario_logado['idempresa'];

			$item = array("numpedido" => $this->input->post("numpedido"),
						  "id" => $this->input->post("id"),
						  "idempresa" => $idempresa );
			if($this->pedidos_model->removerItem($item)){
				return true;
			}else{
				return false;
			}	
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 	
	}

	public function pedidon()
	{
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("formapagamento_model");
			$this->load->model("clientes_model");
			$idempresa = $this->session->usuario_logado['idempresa'];

			$clientes = $this->clientes_model->listaClientes($idempresa);
			$formaPagamento = $this->formapagamento_model->listaFormaPagamento();
			$dados = array("formaPagamento" => $formaPagamento,
		                   "usuarios" => $clientes);

			$this->load->view('painel/pedidon.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		} 
	}

	public function addItemTemp(){
		if(!empty($this->session->usuario_logado['email'])){
			$this->load->model("pedidos_model");
			$idempresa = $this->session->usuario_logado['idempresa'];

			$idproduto =$this->input->post("idproduto");
			$idcliente =$this->input->post("idcliente");
			$tipopagamento =$this->input->post("tipopagamento");
			$qtde =$this->input->post("qtde");

			$dados = array("idempresa" => $idempresa,
						   "idproduto" => $idproduto,
						   "idproduto" => $idproduto);

			$this->load->view('painel/pedidon.php',$dados);
		}else{
			$this->session->unset_userdata("usuario_logado");
			redirect('./painel');
		}
	}
	
	/*Fim dos pedidos */


	public function login(){
		$this->load->model("login_model");		
		$user = $this->input->post("login");
		$senha = md5($this->input->post("senha"));
		$usuario = $this->login_model->login($user, $senha);
		$this->session->set_userdata("usuario_logado", $usuario);
		$this->session->set_userdata(array("usuario_logado" => $usuario));

		if($this->session->usuario_logado['email']){ 
			$this->load->view("painel/inicio.php",$usuario);
		}else{
			$this->session->unset_userdata("usuario_logado");
			$this->load->view("painel/index.php");
		}            
	}
		
	public function logout(){		
		$this->session->unset_userdata("usuario_logado");
		redirect('painel');
	}
}
