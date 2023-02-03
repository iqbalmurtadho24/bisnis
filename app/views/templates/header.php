<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASEURL ?>css/adminlte/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <title><?= $data['judul'] ?></title>
  <?php if (isset($data['table'])) { ?>
    <link rel="stylesheet" href="<?= BASEURL ?>css/datatable-bs4/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/datatable-buttons/buttons.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="<?= BASEURL ?>css/datatable-responsive/responsive.bootstrap.min.css"> -->

    <style>
      div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
      }
    </style>
  <?php }
  $session = SessionManager::getCurrentUser() ?>
    
<link href='<?= BASEURL ?>css/select2/select2.min.css' rel='stylesheet' type='text/css'>
<link href='<?= BASEURL ?>css/select2/select2.bootstrap.min.css' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?= BASEURL ?>css/notyf/notyf.min.css">
  <style>
    .input-group-text {
      width: 33%;
      font-size: xx-small;
      background-color: #2f3242;
      color: white;

    }


    .form-control {
      border: 2px solid grey;

      border-radius: 4px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini ">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item ">

          <a class="nav-link   " href="<?= BASEURL ?>home/logout" role="button">
            <i class="fa-sharp  fa-solid fa-power-off  btn-outline-danger rounded-circle"></i>
            Log Out

          </a>
        </li>

      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link d-flex justify-content-center">
        <img src="<?= BASEURL ?>img/landing-page/o.png" alt="AdminLTE Logo" style="opacity: .8;  width: 100px; height: auto; align:center">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php if (!empty($session['akses'])) {
              if (in_array('sdm', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa-sharp fa-solid fa-users btn-outline-info "></i>
                    <p>
                      SDM
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>sdm/sdm" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Akun</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>sdm/akses" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Akses</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>sdm/detail" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Pribadi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>sdm/gaji" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Gaji Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>sdm/gaji" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Bonus Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>sdm/gaji" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Pembayaran Gaji</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php }
              if (in_array('logistik', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa-sharp fa-solid fa-boxes-stacked btn-outline-info "></i>
                    <p>
                      Logistik
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>logistik/kategori" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Kategori</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>logistik/jenis" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Jenis</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>logistik/merek" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Merek</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>logistik/series" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Produk</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>logistik/harga" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Harga</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>logistik/Suplier" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Suplier</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php }
              if (in_array('konten', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class=" fa-sharp  fa-solid fa-photo-video  btn-outline-info"></i>
                    <p>
                      Konten
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>konten/konten" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Konten</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>konten/publikasi" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Publikasi</p>
                      </a>
                    </li>
                  </ul>
                </li><?php }
                    if (in_array('marketing', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-sharp  fa-solid fa-ad  btn-outline-info"></i>
                    <p>
                      Marketing
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>marketing/konten" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Progres Konten</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>marketing/marketing" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Marketing</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>marketing/rekap" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Rekap Data Marketing</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php }
                    if (in_array('cs', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-sharp  fa-solid fa-headset  btn-outline-info"></i>
                    <p>
                      Customer Service
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>cs/chat" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Chat Masuk</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>cs/pemesanan" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Pemesanan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>cs/pelanggan" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Pelanggan</p>
                      </a>
                    </li>

                  </ul>
                </li>
              <?php }
                    if (in_array('penjualan', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fas fa-sharp  fa-solid fa-cart-plus  btn-outline-info "></i>
                    <p>
                      Penjualan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>penjualan/pemesanan" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Pemesanan</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= BASEURL ?>penjualan/penjualan" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Data Penjualan</p>
                      </a>
                    </li>

                  </ul>
                </li>
                <?php }
                    if (in_array('keuangan', $session['akses'])) { ?>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                  <i class="fas fa-money-check  fa-sharp  fa-solid   btn-outline-info "></i>  
                    <p>
                    Keuangan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>keuangan/konfirmasi" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Konfirmasi Pembayaran</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>keuangan/order" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Tagihan Order</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>keuangan/pembayaran" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Tagihan Pembayaran</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= BASEURL ?>keuangan/laporan" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Laporan Keuangan</p>
                      </a>
                    </li>

                  </ul>
                </li>
             <?php }
                  } ?>

          </ul>
        </nav>
      </div>
      <!-- /.sidebar-menu -->
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= ucfirst($data['judul']) ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $data['subdomain'] ?>"><?= ucfirst($data['subdomain']) ?></a></li>
                <li class="breadcrumb-item active"><?= $data['judul'] ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>