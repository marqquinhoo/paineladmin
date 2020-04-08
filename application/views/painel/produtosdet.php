


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel Administrativo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>templateadmin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>templateadmin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>templateadmin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>templateadmin/dist/css/jquery.toast.css">
  <script defer src="<?php echo base_url();?>templateadmin/dist/js/jquery.toast.js"></script>

  <script>

    function voltar(){
        window.location.href = '<?php echo base_url();?>painel/produtos';           
    }

    function alterar(id){
      var idProduto = document.getElementById("idProduto").value;
      var codigo = document.getElementById("codigo").value;
      var codbarras = document.getElementById("codbarras").value;
      var estoque = document.getElementById("estoque").value;
      var nome = document.getElementById("nome").value;
      var idcategoria = document.getElementById("idcategoria").value;
      var idfornecedor = document.getElementById("idfornecedor").value;
      var destaque = document.getElementById("destaque").value;
      var promocao = document.getElementById("promocao").value;
      var valor = document.getElementById("valor").value;
      var desconto = document.getElementById("desconto").value;
      var peso = document.getElementById("peso").value;
      var altura = document.getElementById("altura").value;
      var largura = document.getElementById("largura").value;
      var comprimento = document.getElementById("comprimento").value;
      var foto = document.getElementById("foto").value;
      var bandeira = document.getElementById("bandeira").value;
      var desccurta = document.getElementById("desccurta").value;
      var descricao = document.getElementById("descricao").value;

            $.ajax({                
                url : '<?php echo base_url();?>painel/altprodutos',
                dataType : 'html',
                type : 'POST',
                data : {idProduto : idProduto, codigo : codigo, codbarras : codbarras, estoque : estoque, nome : nome, idcategoria : idcategoria, idfornecedor : idfornecedor,
                        destaque : destaque, promocao : promocao, valor : valor, desconto : desconto, peso : peso, altura : altura, largura : largura, comprimento : comprimento,
                        foto : foto, bandeira : bandeira, desccurta : desccurta, descricao : descricao},
                   
                    success : function(retorno){
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Produto alterado com sucesso!',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    });
                },
                error : function(retorno){
                    $.toast({
                        heading: 'Erro',
                        text: "Nenhum processamento realizado!",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'top-right',
                    });
                }
            });
           
           setTimeout(function() {
              window.location.href = '<?php echo base_url();?>painel/produtos';
          }, 3000);           
    }

    function excluir(id){
            
            $.ajax({                
                url : '<?php echo base_url();?>painel/excluirproduto',
                dataType : 'html',
                type : 'POST',
                data : {idProduto: id},
                   
                    success : function(retorno){
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Produto Excluida com sucesso!',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    });
                },
                error : function(retorno){
                    $.toast({
                        heading: 'Erro',
                        text: "Nenhum processamento realizado!",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'top-right',
                    });
                }
            });
           
           setTimeout(function() {
              window.location.href = '<?php echo base_url();?>painel/produtos';
          }, 3000);           
    }
    </script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php topoadmin();?>
  <?php asideadmin($this->session->usuario_logado['nome']);?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalhes de Produto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detalhes de Produto</li>
              <li class="breadcrumb-item active"><input type="button" class="btn btn-primary btn-sm" name="voltar" id="voltar" value="Voltar" onclick="voltar()"/></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <?php echo form_open_multipart('painel/altprodutos','alterar');?>
                <?php foreach($produtos as $prod):?>
                <input type="hidden" name="idProduto" id="idProduto" value="<?php echo $prod['id'];?>"/>


                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right">&nbsp;</div>
                    <div class="col-md-3" align="left">                      
                          <img src="<?php echo base_url()."uploads/".$prod['foto'];?>" width="150px" height="180px"> 
                    </div>
                </div>


                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Código</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="codigo" id="codigo" value="<?php echo $prod['codigo'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Código de Barras</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="codbarras" id="codbarras" value="<?php echo $prod['codbarras'];?>" class="form-control"/></div>
                    <div class="col-md-3" align="right"><b>Quantidade em Estoque</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="estoque" id="estoque" value="<?php echo $prod['estoque'];?>" class="form-control"/></div>
                
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Nome</b></div>
                    <div class="col-md-6" align="left"><input type="text" name="nome" id="nome" value="<?php echo $prod['nome'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Categoria</b></div>
                    <div class="col-md-3" align="left">
                        <select name="idcategoria" id="idcategoria" class="form-control">
                            <option value="">Selecione</option>
                            <?php foreach($categorias as $cat):
                                if($prod['idcategoria'] == $cat['id']){
                                  $select = "selected='selected'";
                                }else{
                                  $select = "'";
                                }
                              ?>
                            <option value="<?php echo $cat['id'];?>" <?php echo $select;?>><?php echo $cat['categoria'];?></option>
                            <?php endforeach;?>
                          </select></div>
                    <div class="col-md-3" align="right"><b>Fornecedor</b></div>
                    <div class="col-md-3" align="left">
                      <select name="idfornecedor" id="idfornecedor" class="form-control">
                        <option value="">Selecione</option>
                        <?php foreach($fornecedores as $forn):
                            if($prod['idfornecedor'] == $forn['id']){
                              $select = "selected='selected'";
                            }else{
                              $select = "'";
                            }  
                          
                        ?>
                        <option value="<?php echo $forn['id'];?>" <?php echo $select;?>><?php echo $forn['fornecedor'];?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Destaque</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="destaque" id="destaque" value="<?php echo $prod['destaque'];?>" class="form-control"/></div>
                    <div class="col-md-3" align="right"><b>Promoção</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="promocao" id="promocao" value="<?php echo $prod['promocao'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Valor</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="valor" id="valor" value="<?php echo $prod['valor'];?>" class="form-control"/></div>
                    <div class="col-md-3" align="right"><b>Valor Com Desconto</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="desconto" id="desconto" value="<?php echo $prod['desconto'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Peso</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="peso" id="peso" value="<?php echo $prod['peso'];?>" class="form-control"/></div>
                    <div class="col-md-3" align="right"><b>Altura</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="altura" id="altura" value="<?php echo $prod['altura'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Largura</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="largura" id="largura" value="<?php echo $prod['largura'];?>" class="form-control"/></div>
                    <div class="col-md-3" align="right"><b>Comprimento</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="comprimento" id="comprimento" value="<?php echo $prod['comprimento'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Foto</b></div>
                    <div class="col-md-3" align="left"><input type="file" name="foto" id="foto" value="<?php echo $prod['foto'];?>" class="form-control"/></div>
                    <div class="col-md-3" align="right"><b>Bandeira</b></div>
                    <div class="col-md-3" align="left"><input type="text" name="bandeira" id="bandeira" value="<?php echo $prod['bandeira'];?>" class="form-control"/></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Descrição Curta</b></div>
                    <div class="col-md-9" align="left"><textarea name="desccurta" id="desccurta" class="form-control"><?php echo $prod['desccurta'];?></textarea></div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Descrição Completa</b></div>
                    <div class="col-md-9" align="left"><textarea name="descricao" id="descricao" class="form-control"><?php echo $prod['descricao'];?></textarea></div>
                </div>

                <div class=" row col-md-12">&nbsp;</div>
                 <div class=" row col-md-12" style="margin-bottom:2px;">
                  <div class="row col-md-6" align="left">
                    <div class="col-md-6">
                        <input type="submit" name="alterar" id="alterar" value="Alterar" class="btn btn-primary btn-block"/>
                    </div>
                    <div class="col-md-6">
                        <!-- <?php if($prod['total'] == 0){?>
                          <input type="button" name="excluir" id="excluir" onclick="excluir(<?php echo $prod['id'];?>)" value="Excluir" class="btn btn-danger btn-block"/>
                        <?php }?>   -->
                    </div>
                    
                  </div>
                </div>

                <?php endforeach; ?>                
            </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>templateadmin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>templateadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>templateadmin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>templateadmin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>templateadmin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>templateadmin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  $("#alterar").submit(function( event ) {
    $.ajax({                
          success : function(retorno){
          $.toast({
              heading: 'Sucesso',
              text: 'Produto Excluida com sucesso!',
              showHideTransition: 'slide',
              icon: 'success',
              position: 'top-right',
          });
      },
      error : function(retorno){
          $.toast({
              heading: 'Erro',
              text: "Nenhum processamento realizado!",
              showHideTransition: 'slide',
              icon: 'error',
              position: 'top-right',
          });
      }
    });
  });
</script>


</body>
</html>
