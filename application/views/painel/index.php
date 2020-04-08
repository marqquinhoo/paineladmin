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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>templateadmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>templateadmin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
        body{
      background-image: url('<?php echo base_url();?>templateadmin/dist/img/97.jpg');
      background-size: 100%;
    }

    /**************************************************/
      .container-fluid{
        display: -moz-flex;
        display: -webkit-flex;
        display: -ms-flex;
        display: flex;
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -moz-align-items: center;
        -webkit-align-items: center;
        -ms-align-items: center;
        align-items: center;
        /*-moz-justify-content: space-between;
        -webkit-justify-content: space-between;
        -ms-justify-content: space-between;
        justify-content: space-between;*/
        position: relative;
        min-height: 100vh;
        width: 100%;
        z-index: 3;
      }

      .paginaInicial {
        -moz-transform: scale(1.0);
        -webkit-transform: scale(1.0);
        -ms-transform: scale(1.0);
        transform: scale(1.0);
        -webkit-backface-visibility: hidden;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: -1;
      }

      .paginaInicial:before, .paginaInicial:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }

      .paginaInicial:before {
        -moz-transition: background-color 2.5s ease-in-out;
        -webkit-transition: background-color 2.5s ease-in-out;
        -ms-transition: background-color 2.5s ease-in-out;
        transition: background-color 2.5s ease-in-out;
        -moz-transition-delay: 0.75s;
        -webkit-transition-delay: 0.75s;
        -ms-transition-delay: 0.75s;
        transition-delay: 0.75s;
        background-size: auto, 256px 256px;
        background-position: center, center;
        background-repeat: no-repeat, repeat;
        z-index: -1;
      }

      .paginaInicial:after {
        -moz-transform: scale(1.125);
        -webkit-transform: scale(1.125);
        -ms-transform: scale(1.125);
        transform: scale(1.125);
        -moz-transition: -moz-transform 0.325s ease-in-out, -moz-filter 0.325s ease-in-out;
        -webkit-transition: -webkit-transform 0.325s ease-in-out, -webkit-filter 0.325s ease-in-out;
        -ms-transition: -ms-transform 0.325s ease-in-out, -ms-filter 0.325s ease-in-out;
        transition: transform 0.325s ease-in-out, filter 0.325s ease-in-out;
        /* background-image: url("../imgs/fundologinrf001-1920-1080.png"); */
        background-image: url("<?php echo base_url();?>templateadmin/dist/img/97.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-position-y: 50px;
        /*z-index: 1;*/
        position:absolute;
        z-index:-1;
      }
    /*********************** Pagina Inicial Fim *********************************/
  </style>
</head>
<body class="hold-transition login-page paginaInicial">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <a href="#"><b>MP Solutions</b></a>
      </div>

      <form action="<?php echo base_url("index.php/painel/login"); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="login" id="login" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" id="senha" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">&nbsp;
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Esqueci Minha Senha</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="col-md-12" align="center">
      <a href="http://www.freepik.com" target="Blank"> Design Projetado por nevando / Freepik </a>
  </div>
      
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>templateadmin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>templateadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>templateadmin/dist/js/adminlte.min.js"></script>

</body>
</html>
