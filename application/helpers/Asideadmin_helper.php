<?php 
    

    function asideadmin($nome){
        echo '<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="'.base_url().'templateadmin/dist/img/logopdvmp.png" alt="PDV MP Webmaster" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">PDV MPwebmaster</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="'.base_url().'templateadmin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">'.$nome.'</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="'.base_url().'painel/categorias" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Categorias
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="'.base_url().'painel/fornecedores" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                    Fornecedores
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="'.base_url().'painel/produtos" class="nav-link">
                  <i class="nav-icon fas fa-suitcase"></i>
                  <p>
                    Produtos
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="'.base_url().'painel/pedidos" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Pedidos
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-retweet"></i>
                  <p>
                    Venda Avulsa
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Clientes
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="'.base_url().'index.php/painel/logout" class="nav-link">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>Sair</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>';
    }


?>