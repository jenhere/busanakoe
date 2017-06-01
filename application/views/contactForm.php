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
    <link href="<?php echo base_url('assets/css/contact-us.css') ?>" rel="stylesheet">
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
<section>
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
                <?php if($this->session->userdata('logged_in')) { ?>
                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Hello, <?=$this->session->userdata('nama')?></a></li>
                  <li><a href="<?php echo site_url()."/Sign/logout";?>"><i class="fa fa-lock"></i> Logout</a></li>
                <?php } else{ ?>
                <li><a href="<?php echo site_url()."/Sign/";?>"><i class="fa fa-lock"></i> Login</a></li>
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
                <li><a href="<?php echo site_url()."/Tampil/index";?>" class="">Home</a></li>
                <li><a href="#" class="active">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->
  </section>
  <section id="form"><!--form-->
   <div class="inner contact">
                <!-- Form Area -->
                <center> <h2>Masukkan Komentar</h2></center>
                <br>
                <br>
                <div class="contact-form">
                    <!-- Form -->
                    <form id="contact-us" method="post" action=""<?php echo site_url()."/Tampil/kirimPesan";?>"">
                        <div class="col-xs-2 wow animated slideInLeft" data-wow-delay=".5s"></div>
                        <div class="col-xs-4 wow animated slideInLeft" data-wow-delay=".5s">
                            <input type="text" name="nama" id="nama" required="required" class="form" placeholder="Nama" />
                            <input type="email" name="email" id="email" required="required" class="form" placeholder="E-mail" />
                            <input type="text" name="no_hp" id="no_hp" required="required" class="form" placeholder="No Handphone" />
                        </div>
                        <div class="col-xs-4 wow animated slideInRight" data-wow-delay=".5s">
                            <textarea name="message" id="message" class="form textarea"  placeholder="Komentar"></textarea>
                        </div>
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="submit" id="submit" name="submit" class="form-btn semibold">Kirim Pesan</button> 
                        </div><!-- End Bottom Submit -->
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>

                    <!-- Your Mail Message -->
                    <div class="mail-message-area">
                        <!-- Message -->
                        <div class="alert gray-bg mail-message not-visible-message">
                            <strong>Thank You !</strong> Your email has been delivered.
                        </div>
                    </div>

                </div><!-- End Contact Form Area -->
</div><!-- End Inner -->
</section><!--/form-->
  <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js') ?>"></script> <!--Animasi-->
  <script src="<?php echo base_url('assets/js/price-range.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.prettyPhoto.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js') ?>" ></script>
</body>
</html>