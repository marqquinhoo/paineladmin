


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
        window.location.href = '<?php echo base_url();?>painel/pedidos';           
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
            <h1>Detalhes do Pedido</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detalhes do Pedido</li>
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

            <?php foreach($pedido as $ped):?>
            <div class="col-md-12 row">
              <div class="col-md-3" align="right"><b>Número do pedido:</b></div>
              <div class="col-md-6" align="left"><?php echo $ped['numpedido'];?></div>
            </div>

            <div class="col-md-12 row">
              <div class="col-md-3" align="right"><b>Cliente:</b></div>
              <div class="col-md-6" align="left"><?php echo $ped['nome'];?></div>
            </div>

            <div class="col-md-12 row">
              <div class="col-md-3" align="right"><b>Data da Venda:</b></div>
              <div class="col-md-6" align="left"><?php echo substr($ped['dataPedido'],8,2)."/".substr($ped['dataPedido'],5,2)."/".substr($ped['dataPedido'],0,4)." ".substr($ped['dataPedido'],11,8);?></div>
            </div>

            <div class="col-md-12 row">
              <div class="col-md-3" align="right"><b>Forma de Pagamento</b></div>
              <div class="col-md-6" align="left"><?php echo $ped['formaPagamento'];?></div>
            </div>

            <div class="col-md-12 row">
              <div class="col-md-3" align="right"><b>Status do Pedido</b></div>
              <div class="col-md-6" align="left"><?php echo $ped['status'];?></div>
            </div>
            
            <?php endforeach;?>

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Código Produto</th>
                      <th>Nome do Produto</th>
                      <th>Quantidade</th>
                      <th>Valor Unitário</th>
                      <th>Desconto</th>
                      <th>Valor Total</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php foreach($itens as $item):
                        $valor = $item['valor'] * $item['qtde'];
                        $subtotal = $valor - $item['desconto'];
                      ?>
                      <tr>
                          <td><?php echo $item['id'];?></td>
                          <td><?php echo $item['codigo'];?></td>
                          <td><?php echo $item['nome'];?></td>
                          <td><?php echo $item['qtde'];?></td>
                          <td><?php echo number_format($valor,2,",",".");?></td>
                          <td><?php echo number_format($item['desconto'],2,",",".");?></td>
                          <td><?php echo number_format($subtotal,2,",",".");?></td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                  
                  </table>
                
            </div>
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
</script>

            <div class="modal fade" id="novaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <input type="text" class="form-control" name="categoria2" id="categoria2" value="">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary btn-sm" onclick="salvar()">Salvar</button>
                  </div>
                  </div>
              </div>
          </div>
</body>
</html>
