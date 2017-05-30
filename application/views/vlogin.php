<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Busanakoe</title>
    <!--Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"> 
    <!--Custom CSS-->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/prettyPhoto.css') ?>" rel="stylesheet"> <!-- ???-->
    <link href="<?php echo base_url('assets/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/responsive.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <!--
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 085-230-808-158</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> busanakoe@gmail.cm</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo site_url()."/tampil/index";?>" ><img src="<?php echo base_url('assets/images/home/logo.png') ?>" alt="" /></a> 
						</div>
					
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo site_url()."/tampil/index";?>" class="">Home</a></li>
								<!--<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="<?php echo base_url()."index.php/tampil/login";?>">Login</a></li> 
                                    </ul>
                                </li> -->
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1">
					<h4 font color="red" ><?=$this->session->flashdata('error')?></h4>
				</div>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Masuk ke Busanakoe</h2>
						<form method="POST" action="<?php echo site_url('sign/do_signin')?>">
							<input type="email" name="email" placeholder="Alamat Email" />
							<input type="password" name="sandi" placeholder="Kata Sandi" />
							<button type="submit" class="btn btn-default">Masuk</button>
						</form>
					</div><!--/login form-->

				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Buat Akun Baru</h2>
						<form method="POST" action="<?php echo site_url('sign/do_signup')?>">
							<input type="text" name="nama" placeholder="Nama Lengkap" size="50" />
							<input type="text" name="no_hp" placeholder="Nomer Handphone" size="13" />
							<input type="email" name="email" placeholder="Alamat E-mail" size="50" />
							<input type="password" name="sandi" placeholder="Kata Sandi" size="50" />
							<button type="submit" class="btn btn-default">Buat Akun</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div>
						<center>
							<h3 style="color: #7a7979; font-family: cursive,sans-serif">"Kami memberikan produk terbaik dengan harga terjangkau"</h3>
						</center>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Menyediakan</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Pakaian Pria</a></li>
								<li><a href="#">Pakaian Wanita</a></li>
								<li><a href="#">Aksesoris</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Busanakoe</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Home</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2 ">
						<div class="single-widget">
							<h2>Tentang kami</h2> 
							<p style="color: #a3a3a3">Perum Jadi Pesona XVII no 7, Denpasar Bali, Indonesia</p>
							<p style="color: #a3a3a3">Busanakoe@gmail.com</p>


						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Busanakoe © 2017</p>
				
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js') ?>"></script> <!--Animasi-->
	<script src="<?php echo base_url('assets/js/price-range.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.prettyPhoto.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js') ?>" ></script>
</body>
</html>