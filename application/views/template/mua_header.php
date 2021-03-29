<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/'); ?>css/toko.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- table -->
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

  <title>MUA</title>

</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-5">
    <div class="container">
      <img src="<?= base_url('asset/'); ?>images/logo.png" alt="logo" style="width: 80px;height: 50px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('muach/'); ?>">Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('muach/galery'); ?>">Galery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('muach/jadwal'); ?>">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('muach/saldo'); ?>">Saldo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('muach/orderan'); ?>">Orderan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?= base_url('asset/'); ?>logo_mua/1.png" alt="logo" width="25" height="25" class="d-inline-block align-top rounded-circle" >Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url('muach/ubah_profile'); ?>">Ubah profil</a>
              <a class="dropdown-item" href="<?= base_url('muach/ubah_password'); ?>">Ubah password</a>
              <a class="dropdown-item" href="<?= base_url('muach/pengaturan'); ?>">Pengaturan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Keluar</a>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- end navbar -->