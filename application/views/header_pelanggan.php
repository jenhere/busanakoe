
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Busanakoe</title>
    <!--Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"> 
    <!--Custom CSS-->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/prettyPhoto.css') ?>" rel="stylesheet"> <!-- ???-->
    <link href="<?php echo base_url('assets/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/responsive.css') ?>" rel="stylesheet">

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
							<a href="<?php echo site_url()."/tampil/keVhomePel";?>" ><img src="<?php echo base_url('assets/images/home/logo.png') ?>" alt="" /></a> 
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
						
								<li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><?php
									$text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
									$text_cart_url .= ' Shopping Cart: '. $this->cart->total_items() .' items';
									?>
									<?=anchor(site_url()."/tampil/keCart", $text_cart_url)?>
										
								</li>
								<?php if($this->session->userdata('nama')) { ?>
									<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Hello, <?=$this->session->userdata('nama')?></a></li>
									<li><a href="<?php echo site_url()."/sign/";?>"><i class="fa fa-lock"></i> Logout</a></li>
								<?php }  ?>
								

							</ul>
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
								<li><a href="<?php echo site_url()."/Tampil/keVhomePel";?>" class="active">Home</a></li>
								<!--<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="<?php echo base_url()."index.php/tampil/cart";?>">Cart</a></li> 
										<li><a href="<?php echo base_url()."index.php/sign/";?>">Login</a></li> 
                                    </ul>
                                </li> -->
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	
<!--////////////////////batas HEADER////////////////////////-->