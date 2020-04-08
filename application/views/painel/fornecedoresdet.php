
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
        window.location.href = '<?php echo base_url();?>painel/fornecedores';           
    }

    function alterar(id){
            var fornecedor = document.getElementById("fornecedor").value;

            $.ajax({                
                url : '<?php echo base_url();?>painel/altfornecedores',
                dataType : 'html',
                type : 'POST',
                data : {idFornecedor: id, fornecedor : fornecedor},
                   
                    success : function(retorno){
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Fornecedor alterado com sucesso!',
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
              window.location.href = '<?php echo base_url();?>painel/fornecedores';
          }, 3000);           
    }


    function excluir(id){
            
            $.ajax({                
                url : '<?php echo base_url();?>painel/excluirFornecedor',
                dataType : 'html',
                type : 'POST',
                data : {idFornecedor: id},
                   
                    success : function(retorno){
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Fornecedor Excluido com sucesso!',
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
              window.location.href = '<?php echo base_url();?>painel/fornecedores';
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
            <h1>Detalhes do Fornecedor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detalhes do Fornecedor</li>
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
                <?php foreach($fornecedores as $forn):?>
                <input type="hidden" name="idFornecedor" id="idFornecedor" value="<?php echo $forn['id'];?>"/>
                <div class=" row col-md-12" style="margin-bottom:2px;">
                  <div class="col-md-10" align="left">Fornecedor</div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                  <div class="col-md-6" align="left">
                    <input type="text" name="fornecedor" id="fornecedor" value="<?php echo $forn['fornecedor'];?>" class="form-control"/>
                  </div>
                </div>

                 <div class=" row col-md-12" style="margin-bottom:2px;">
                  <div class="row col-md-6" align="left">
                    <div class="col-md-6">
                        <input type="button" name="alterar" id="alterar" onclick="alterar(<?php echo $forn['id'];?>)" value="Alterar" class="btn btn-primary btn-block"/>
                    </div>
                    <div class="col-md-6">
                        <?php if($forn['total'] == 0){?>
                          <input type="button" name="excluir" id="excluir" onclick="excluir(<?php echo $forn['id'];?>)" value="Excluir" class="btn btn-danger btn-block"/>
                        <?php }?>  
                    </div>
                    
                  </div>
                </div>
                <?php endforeach; ?>
                
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
