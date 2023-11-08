<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/Logo.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fashione</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar2.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bintang Laura Anjani</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
                  <!-- <i class="nav-icon fas fa-shopping-cart"></i> -->
                  <p>
                    Daftar Produk Array
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="#" class="nav-link">
                  <!-- <i class="nav-icon fas fa-shopping-cart"></i> -->
                  <p>
                    Daftar Produk Looping
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="#" class="nav-link">
                  <!-- <i class="nav-icon fas fa-shopping-cart"></i> -->
                  <p>
                    CRUD Produk

                  </p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Customer
                   <!--<span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Vendor
                   <!--<span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
              </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>
                    Logout
                   <!--<span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
              </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
