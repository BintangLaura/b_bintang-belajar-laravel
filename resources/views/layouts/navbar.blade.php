<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item mt-2 mr-1">
        <?php
        $hari = [
          "Minggu", "Senin", "Selasa", "Rabu",
          "Kamis", "Jumat", "Sabtu", "Minggu",
        ];
        // echo date('N'); //get index hari
        $index_hari = date('N');

        echo $hari[$index_hari].",";
        ?>
      </li>
      <li class="nav-item mt-2">
        <?php
          function tgl_indo($tanggal){
            $bulan = array (
              1 => 'Januari', 'Februari', 'Maret', 'April',
              'Mei', 'Juni', 'Juli', 'Agustus',
              'September', 'Oktober', 'November', 'Desember'
            );

            $indo = explode('-', $tanggal);

            //variabel indo 0 = tanggal
            //variabel indo 1 = bulan
            //variabel indo 2 = tahun


            return $indo[2] . ' ' . $bulan[ (int)$indo[1] ]. ' ' . $indo[0];
          }

          echo tgl_indo(date('Y-m-d'));
        ?>
      </li>
      <li class="nav-item mt-2 ml-2" id="time"><script src="{{ asset('dist/js/time.js') }}"></script></li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
