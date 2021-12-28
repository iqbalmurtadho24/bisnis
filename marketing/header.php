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

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto ">


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-cog"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">

                            <div class="user-panel mt-4 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img class="img-fluid" id='bg1' src="<?= isset($_SESSION['gambar']) != false && $_SESSION['gambar'] != "" && file_exists("../assets/img/" . $_SESSION['gambar']) == 1 ? "../assets/img/" . $_SESSION['gambar'] . "?t=" . time() : ""; ?>" width=40 alt="">

                                </div>
                                <div class="info">
                                    <a href="#" class="d-block"><?= $_SESSION['nry'] ?> / <?= $_SESSION['nama'] ?> </a>
                                </div>
                            </div>
                        </span>

                        <div class="dropdown-divider"></div>
                        <a href="../config/logout.php" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> -->

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
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="admin.php" class="nav-link">

                                <i class="nav-icon fas fa-users-cog "></i>
                                <p class="text">Data SDM</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="unit.php" class="nav-link">

                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p class="text">Data Unit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="jabatan.php" class="nav-link">

                            <i class="fas fa-sitemap"></i>
                                <p class="text">Data Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="detail.php" class="nav-link">

                            <i class="fas fa-code-branch"></i>
                               <p class="text">Data Detail Jabatan</p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-edit"></i>

                                <p>
                                    KPI
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="kuesioner.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kuesioner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="jabatan.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jabatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="skor.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Skor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">