<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($data['title']) ? $data['title'] : 'Aplikasi Penjualan' ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://cdn.prod.website-files.com/5e51c674258ffe10d286d30a/5e535b3ad399233aa855d221_peep-82.svg" class="img-circle elevation-2 bg-gradient-dark" style="width: 40px; height: 40px;" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Nur Rohmah Zahroh</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-header">MENU</li>
            <li class="nav-item">
              <a href="<?= BASEURL; ?>/barang" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASEURL; ?>/pelanggan" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASEURL; ?>/transaksi" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Transaksi</p>
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
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= isset($data['title']) ? $data['title'] : 'Aplikasi Penjualan' ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/home">Beranda</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>