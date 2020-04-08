
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

    function novo(){
        window.location.href = '<?php echo base_url();?>painel/pedidon';         
    }

    function redireciona(id){
        window.location.href = '<?php echo base_url();?>painel/pedidosdet/'+id+'';           
    }


    function salvar(){
        var categoria = document.getElementById("categoria").value;

            $.ajax({                
                url : '<?php echo base_url();?>painel/cadcategorias',
                dataType : 'html',
                type : 'POST',
                data : {categoria : categoria},
                   
                    success : function(retorno){
                    $.toast({
                        heading: 'Sucesso',
                        text: "Categoria Cadastrada Com Sucesso",
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
              window.location.href = '<?php echo base_url();?>painel/categorias';
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
            <h1>Pedidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pedidos</li>
              <li class="breadcrumb-item active"><button type="button" class="btn btn-outline-primary btn-sm" onclick="novo()">Novo Pedido</button></li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Numero</th>
                  <th>Cliente</th>
                  <th>Valor</th>
                  <th>Data Compra</th>
                  <th>Forma de Pagamento</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $i = 0;
                    foreach($pedidos as $ped):
                        $dataPedido = substr($ped['dataPedido'],8,2)."/".substr($ped['dataPedido'],5,2)."/".substr($ped['dataPedido'],0,4)." ".substr($ped['dataPedido'],11,8);
                ?>
                <tr>
                  <td><?php echo $ped['numpedido'];?></td>
                  <td><?php echo $ped['nome'];?></td>
                  <td><?php echo "R$".number_format($ped['valorPedido'],2,",",".");?></td>
                  <td><?php echo $dataPedido;?></td>
                  <td><?php echo $ped['formaPagamento'];?></td>
                  <td><?php echo $ped['status'];?></td>
                  <td><button type="button" class="btn btn-outline-primary btn-sm" onclick="redireciona(<?php echo $ped['numpedido'];?>)">Detalhes</button></td>
                </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot>
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
                      <input type="text" class="form-control" name="categoria" id="categoria" value="">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary btn-sm" onclick="salvar()">Salvar</button>
                  </div>
                  </div>
              </div>
          </div>
</body>
</html>
