<?php
include 'config/koneksi.php';
include 'config/controller.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>
  <link rel="icon" href="assets-temp/dist/img/nins.jpg">
  <link href="assets-temp/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets-temp/dist/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="assets-temp/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
          <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CRUD</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Daftar Menu
      </div>

      <!-- Nav Item - Tables -->
      <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Pertemuan</span></a>
        </li>
      <?php endif; ?>

      <!-- Nav Item - Tables -->
      <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Mahasiswa</span></a>
        </li>
      <?php endif; ?>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="akun.php">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Data Akun</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->