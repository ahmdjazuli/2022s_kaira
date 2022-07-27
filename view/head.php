<?php 
  require('../kon.php'); 
  require('config.php'); 
  session_start();
  $username   = $_SESSION['username'];
  $password   = $_SESSION['password'];
  $endorse    = mysqli_query($kon, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
  $ayang      = mysqli_fetch_array($endorse);
  $_SESSION['id'] = $ayang['id'];
  $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php title(); ?>
  <link rel="icon" type="image/png" href="../assets/img/logo.png"/>
  <link rel="stylesheet" href="../assets/css/googleFont.css">
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="../assets/plugins/pace-progress/themes/pink/pace-theme-flat-top.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      <li>
      <?php if($_SESSION['level']=='admin'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="index" data-toggle="tooltip" title="Laporan"><i class="fas fa-print"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="grafik" data-toggle="tooltip" title="Grafik"><i class="fas fa-chart-bar"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengguna" data-toggle="tooltip" title="Data Pengguna"><i class="fas fa-user"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kurir" data-toggle="tooltip" title="Data Kurir"><i class="fas fa-user-tie"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ongkir" data-toggle="tooltip" title="Data Ongkir"><i class="fas fa-file-invoice-dollar"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengeluaran" data-toggle="tooltip" title="Data Pengeluaran Lainnya"><i class="fas fa-hand-holding-usd"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="barang" data-toggle="tooltip" title="Data Barang"><i class="fas fa-coins"></i></a>
      </li>
    <?php } ?>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../out" role="button">
          <i class="fas fa-running"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-pink elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="../assets/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kaira BabyWorld Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            $_SESSION['level'] == 'admin' ? $lokasifoto = '../assets/img/admin.png' : $lokasifoto = '../assets/img/kurir.jpg';
          ?>
          <img src="<?= $lokasifoto ?>" class="img-circle elevation-2">
        </div>
        <div class="info">
          <?php 
            $_SESSION['level'] == 'admin' ? $linknya = 'profil?id='.$_SESSION['id'] : $linknya = 'profil2?idkurir='.$_SESSION['idkurir'];
          ?>
          <a href="<?= $linknya ?>" class="d-block"><?= $_SESSION['nama'] ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if($_SESSION['level']=='admin'){ ?>
          <li class="nav-item"><a href="masuk" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i><p>Pembelian Barang</p> 
          </a></li>
          <li class="nav-item"><a href="rusak" class="nav-link">
              <i class="nav-icon fas fa-house-damage"></i><p>Barang Rusak</p> 
          </a></li>
          <li class="nav-item"><a href="transaksi1" class="nav-link">
              <i class="nav-icon fas fa-user-astronaut"></i><p>Transaksi Reseller</p> 
          </a></li>
          <li class="nav-item"><a href="transaksi2" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i><p>Transaksi Pelanggan</p> 
          </a></li>
          <li class="nav-item"><a href="flashsale" class="nav-link">
              <i class="nav-icon fas fa-cut"></i><p>Flashsale</p> 
          </a></li>
          <li class="nav-item"><a href="kirim" class="nav-link">
              <i class="nav-icon fas fa-share"></i><p>Pengiriman</p> 
          </a></li>
          <li class="nav-item"><a href="ulasan" class="nav-link">
              <i class="nav-icon fas fa-pencil-alt"></i><p>Ulasan</p> 
          </a></li>
          <li class="nav-item"><a href="pendapatan" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i><p>Pendapatan</p> 
          </a></li>
          <li class="nav-item"><a href="retur" class="nav-link">
              <i class="nav-icon fas fa-backward"></i><p>Retur</p> 
          </a></li>
          <?php }else{ ?>
          <li class="nav-item"><a href="kirim" class="nav-link">
              <i class="nav-icon fas fa-share"></i><p>Pengiriman</p> 
          </a></li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>