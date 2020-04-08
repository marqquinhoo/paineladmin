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
            <div class="card-body">
                <?php echo form_open_multipart('painel/cadprodutos');?>


                <div class=" row col-md-12 container" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Cliente</b></div>
                    <div class="col-md-3" align="left">
                      <select name="idcliente" id="idcliente" class="form-control" required="required">
                          <option value="">Selecione</option>
                        <?php foreach($usuarios as $clie):?>
                          <option value="<?php echo $clie['id'];?>"><?php echo $clie['nome'];?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Forma de Pagamento</b></div>
                    <div class="col-md-3" align="left">
                      <select name="tipopagamento" id="tipopagamento" class="form-control" required="required">
                          <option value="">Selecione</option>
                        <?php foreach($formaPagamento as $fp):?>
                          <option value="<?php echo $fp['id'];?>"><?php echo $fp['formaPagamento'];?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                
                </div>

                <div class=" row col-md-12" style="margin-bottom:2px;">
                    <div class="col-md-3" align="right"><b>Item</b></div>
                    <div class="col-md-3" align="right"><input type="text" class="form-control" name="codigo" id="codigo" value="" placeholder="Código"/></div>
                    <div class="col-md-3" align="left"><input type="text" class="form-control" name="nome" id="nome" value="" placeholder="Nome"/></div>                
                    <div class="col-md-3" align="left"><input type="button" name="inserir" class="btn btn-info" id="inserir" value="Inserir"></div>                
                </div>
                <div id="Resultado"></div>
                </form>
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

  

  <script>
    $("#salvar").click(function(event){
            $.ajax({            
                  success : function(retorno){
                  $.toast({
                      heading: 'Sucesso',
                      text: 'Produto cadastrado com sucesso!',
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
        event.preventDefault();
    });
  </script>
</body>
</html>