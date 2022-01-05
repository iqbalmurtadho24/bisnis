<?php
session_start();

require_once('../config/config.php');
$url  = explode('/', $_SERVER['REQUEST_URI']);
$url = $url[3];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OrderanQu - Store </title>
  <link rel="shortcut icon" href="../assets/login/images/logo.svg">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

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

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="admin.php" class="brand-link">
        <img src="../assets/img/light-logo.png" alt="AdminLTE Logo" style="opacity: .8;  width: 95%; height: auto;">


      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item <?= $url == 'index.php' ? 'menu-open' : ""  ?> ">
              <a href="index.php" class="nav-link <?= $url == 'index.php' ? 'active' : ""  ?>">

                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p class="text">Dashboard</p>
              </a>
            </li>

            <li class="nav-item <?= $url == 'profil.php' ? 'menu-open' : ""  ?> ">
              <a href="profil.php" class="nav-link <?= $url == 'profil.php' ? 'active' : ""  ?> ">

                <i class="nav-icon fas fa-user"></i>
                <p class="text">Profil</p>
              </a>
            </li>
            <?php
            $query = query("SELECT akses FROM akses where `id_user` = {$_SESSION['id_user']} and `status`= 1");


            while ($row = mysqli_fetch_assoc($query)) {

              if ($row['akses'] == 'sdm') { ?>

                <li class="nav-item <?= $url == 'pegawai.php' || $url == 'user.php' || $url == 'akses.php' || $url == 'gaji.php' || $url == 'bonus.php' || $url == 'gajian.php' ? 'menu-open' : ""  ?>  ">
                  <a href="#" class="nav-link <?= $url == 'pegawai.php' || $url == 'user.php' || $url == 'akses.php' || $url == 'gaji.php' || $url == 'bonus.php' || $url == 'gajian.php' ? 'active' : "" ?>">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                      SDM
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="user.php" class="nav-link <?= $url == 'user.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;User Akun</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pegawai.php" class="nav-link <?= $url == 'pegawai.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="akses.php" class="nav-link <?= $url == 'akses.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;User Akses</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="gaji.php" class="nav-link <?= $url == 'gaji.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Gaji Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="bonus.php" class="nav-link <?= $url == 'bonus.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Bonus Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="gajian.php" class="nav-link <?= $url == 'gajian.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pembayaran Gaji</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } elseif ($row['akses'] == 'logistik') { ?>
                <li class="nav-item <?= $url == 'kategori.php'|| $url == 'jenis.php'||$url == 'merek.php'||$url == 'produk.php'|| $url == 'suplier.php'  ? 'menu-open' : "" ?>">
                  <a href="#" class="nav-link <?= $url == 'kategori.php'|| $url == 'jenis.php'||$url == 'merek.php'||$url == 'produk.php'|| $url == 'suplier.php'  ? 'active' : "" ?>">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                      Logistik Produk
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="kategori.php" class="nav-link <?= $url == 'kategori.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Kategori</p>
                      </a>
                    </li>   <li class="nav-item">
                      <a href="jenis.php" class="nav-link <?= $url == 'jenis.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Jenis</p>
                      </a>
                    </li>   <li class="nav-item">
                      <a href="merek.php" class="nav-link <?= $url == 'merek.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Merek</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="produk.php" class="nav-link <?= $url == 'produk.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Produk</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="suplier.php" class="nav-link <?= $url == 'suplier.php' ? 'active' : "" ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Suplier</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } elseif ($row['akses'] == 'konten') { ?>

                <li class="nav-item <?= $url == 'produksi_konten.php' || $url == 'status_publikasi.php' ? 'menu-open' : ""  ?>">
                  <a href="#" class="nav-link <?= $url == 'produksi_konten.php' || $url == 'status_publikasi.php' ? 'active' : ""  ?>">
                    <i class="nav-icon fas fa-laptop"></i>
                    <p>
                      Konten
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="produksi_konten.php" class="nav-link <?= $url == 'produksi_konten.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Produksi Konten</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="status_publikasi.php" class="nav-link <?= $url == 'status_publikasi.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Status Publikasi</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } elseif ($row['akses'] == 'marketing') { ?>

                <li class="nav-item <?= $url == 'konten.php'||$url == 'publikasi_konten.php'||$url == 'progres.php'||$url == 'media_sosial.php'||$url == 'penjualan.php' ? 'menu-open' : ""  ?>">
                  <a href="#" class="nav-link <?= $url == 'konten.php'||$url == 'publikasi_konten.php'||$url == 'progres.php'||$url == 'media_sosial.php'||$url == 'penjualan.php' ? 'active' : ""  ?>">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                      Marketing
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="konten.php" class="nav-link <?= $url == 'konten.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Konten</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="publikasi_konten.php" class="nav-link <?= $url == 'publikasi_konten.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Publikasi Konten</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="progres.php" class="nav-link <?= $url == 'progres.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Progres</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="media_sosial.php" class="nav-link <?= $url == 'media_sosial.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Media Sosial</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="penjualan.php" class="nav-link <?= $url == 'penjualan.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Penjualan</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } elseif ($row['akses'] == 'cs') { ?>

                <li class="nav-item <?= $url == 'pesan_masuk.php'||$url == 'pesan_order.php'||$url == 'status_order_cs.php' ? 'menu-open' : ""  ?>">
                  <a href="#" class="nav-link <?= $url == 'pesan_masuk.php'||$url == 'pesan_order.php'||$url == 'status_order_cs.php' ? 'active' : ""  ?>">
                    <i class="nav-icon fas fa-headset"></i>
                    <p>
                      CS
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pesan_masuk.php" class="nav-link <?= $url == 'pesan_masuk.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pesan Masuk</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pesan_order.php" class="nav-link <?= $url == 'pesan_order.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pesan Order</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="status_order_cs.php" class="nav-link <?= $url == 'status_order_cs.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Status Order</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } elseif ($row['akses'] == 'penjualan') { ?>

                <li class="nav-item <?= $url == 'pemesanan.php'||$url == 'order_masuk.php'||$url == 'status_order.php' ? 'menu-open' : ""  ?>">
                  <a href="#" class="nav-link <?= $url == 'pemesanan.php'||$url == 'order_masuk.php'||$url == 'status_order.php' ? 'active' : "" ?>">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                      Penjualan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pemesanan.php" class="nav-link <?= $url == 'pemesanan.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pemesanan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="order_masuk.php" class="nav-link <?= $url == 'order_masuk.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Order Masuk</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="status_order.php" class="nav-link <?= $url == 'status_order.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Status Order</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } elseif ($row['akses'] == 'keuangan') { ?>

                <li class="nav-item <?= $url == 'pendapatan_keuangan.php'||$url == 'pengeluaran.php'||$url == 'pembayaran.php'||$url == 'pinjam.php'||$url == 'piutang.php'||$url == 'aset.php' ? 'menu-open' : ""  ?>">
                  <a href="#" class="nav-link <?= $url == 'pendapatan_keuangan.php'||$url == 'pengeluaran.php'||$url == 'pembayaran.php'||$url == 'pinjam.php'||$url == 'piutang.php'||$url == 'aset.php' ? 'active' : ""  ?>">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                      Keuangan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pendapatan_keuangan.php" class="nav-link <?= $url == 'pendapatan_keuangan.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pendapatan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pengeluaran.php" class="nav-link <?= $url == 'pengeluaran.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pengeluaran</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pembayaran.php" class="nav-link <?= $url == 'pembayaran.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Pembayaran Gaji</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pinjam.php" class="nav-link <?= $url == 'pinjam.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Pinjaman</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="piutang.php" class="nav-link <?= $url == 'piutang.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Piutang</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="aset.php" class="nav-link <?= $url == 'aset.php' ? 'active' : ""  ?>">&emsp;
                        <i class="fas fa-angle-double-right left"></i>
                        <p>&emsp;Data Aset</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php }
            } ?>
            <li class="nav-item <?= $url == 'pendapatan.php' ? 'menu-open' : ""  ?> ">
              <a href="pendapatan.php" class="nav-link <?= $url == 'pendapatan.php' ? 'active' : ""  ?> ">

                <i class="nav-icon fas fa-hand-holding-usd "></i>
                <p class="text">Pendapatan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../config/logout.php" class="nav-link">

                <i class="nav-icon fas fa-power-off "></i>
                <p class="text">Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <script src=""></script>