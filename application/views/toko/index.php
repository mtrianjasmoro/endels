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

  <title>Hello, world!</title>

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
            <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Penjualan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Saldo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orderan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?= base_url('asset/'); ?>logo_toko/1.png" alt="logo" width="25" height="25" class="d-inline-block align-top rounded-circle" >Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Ubah profil</a>
              <a class="dropdown-item" href="#">Pengaturan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Keluar</a>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- end navbar -->

  <!-- isi -->
    <?php include"saldo.php";?>
  <!-- end isi -->


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


</body>
</html>