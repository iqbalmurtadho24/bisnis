<?php
session_start();

require_once('../config/config.php');

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
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
             
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">

                                <i class="nav-icon fas fa-tachometer-alt "></i>
                                <p class="text">Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="profil.php" class="nav-link">

                                <i class="nav-icon fas fa-user"></i>
                                <p class="text">Profil</p>
                            </a>
                        </li>
                        <?php
                        $query = query("SELECT * FROM akses where id_user = {$_SESSION['id_user']}");
                        while ($row = mysqli_fetch_array($query)) {
                            $_SESSION[$row['akses']] = 0;
                    
                        ?>

                            <li class="nav-item">
                                <a href="<?= $row['akses'] ?>.php" class="nav-link">

                                    <i class="nav-icon fas fa-laptop "></i>
                                    <p class="text"><?= ucfirst($row['akses']) ?></p>
                                </a>
                            </li>
                        <?php } 
                        
                        ?>
                        <li class="nav-item">
                            <a href="pendapatan.php" class="nav-link">

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