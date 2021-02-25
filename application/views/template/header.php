<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Endels</title>
    <link href="<?= base_url('asset/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/'); ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/'); ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url('asset/'); ?>css/animate.css" rel="stylesheet">
	<link href="<?= base_url('asset/'); ?>css/main.css" rel="stylesheet">
	<link href="<?= base_url('asset/'); ?>css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<img src="<?= base_url('asset/'); ?>images/logo.png" alt="logo" style="width: 80px;height: 50px;">
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Rekomendasi</a></li>
								<li><a href="#"><i class="fa fa-user"></i> Akun</a></li>
								<li><a href="checkout.html"><i class="fa fa-dollar"></i> Pembayaran</a></li>
								<li><a href="<?= base_url('skincare/keranjang'); ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Masuk</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row ">
					<div class="col-sm-9">
						<form action="/action_page.php" >
			                <div class="input-group col-sm-8 pull-right">
			                  <input type="text" class="form-control" placeholder="Cari" name="search">
			                  <div class="input-group-btn">
			                    <button class="btn btn-default" type="submit">
			                      <i class="glyphicon glyphicon-search"></i>
			                    </button>
			                  </div>
			                </div>
			              </form>
					</div>
					<div class="col-sm-3">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu ">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?= base_url('skincare'); ?>" class="active">Skincare</a></li>								
								<li><a href="<?= base_url('mua'); ?>">MUA</a></li>
								<li><a href="<?= base_url('klinik'); ?>">Klinik</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section>
		<div class="container">
			<div class="row">