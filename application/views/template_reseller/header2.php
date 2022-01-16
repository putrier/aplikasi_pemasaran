<?php
$profile_reseller = "";
$tampilan_produk = "";
$cart = "";
$reseller_rules = "";
$top_reseller = "";
$about = "";
$history = "";



$uri_segment1 = $this->uri->segment(2);

  if($uri_segment1 == "profile") {
    $profile_reseller = "active";
  } else  if($uri_segment1 == "product") {
    $tampilan_produk = "active";
  } else if($uri_segment1 == "cart") {
    $cart = "active";
  } else if($uri_segment1 == "reseller_rules") {
    $reseller_rules = "active";
  } else if($uri_segment1 == "top_reseller") {
    $top_reseller = "active";
  } else if($uri_segment1 == "about") {
    $about = "active";
  } else if($uri_segment1 == "history" || $uri_segment1 == "detail_history" || $uri_segment1 == "detail_invoice") {
    $history = "active";
  }

?>





<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Businnes, Portfolio, Corporate"> 
	<meta name="Author" content="WebThemez"> 
    <title>Oishi-Midhe</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url()?>assets/reseller/dist/fontawesome-free/css/all.min.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css">

    <!--[if lte IE 7]><script src="elegant_font/lte-ie7.js"></script><![endif]-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/slider-pro.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/owl.transitions.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/reseller/elegant_font/style.css"> 
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/css/style.css"> 
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/reseller/dist/css/bootstrap-grid.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?= base_url()?>assets/icon.png">
    

    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="status"></div>
    </div>
 
    <!-- Header End -->
    <header>
        <!-- Navigation Menu start-->
		
	<nav id="topNav" class="navbar navbar-default main-menu" style="background: black;">
    <div class="container">
        <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            ☰
        </button> 
		 <a class="navbar-brand page-scroll" href="#slider"><img class="logo" id="logo" src="<?= base_url() ?>assets/reseller/images/logo1.png" alt="logo"></a>
        <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
            <ul class="nav navbar-nav">
                        <li class="">
                            <a href="<?= base_url('dashboard'); ?>" class="#slider">HOME</a>
                        </li>
                        <li class="<?= $tampilan_produk; ?>">
                            <a href="<?= base_url('tampilan_produk/product') ?>">PRODUCT</a>
                        </li>
						 <li class="<?= $reseller_rules; ?>">
                            <a href="<?= base_url('dashboard/reseller_rules') ?>">RESELLER RULES</a>
                        </li>
                       
                        <li class="<?= $top_reseller; ?>">
                            <a href="<?= base_url('dashboard/top_reseller') ?>">TOP RESELLER</a>
                        </li>
                        <li class="<?= $about ?>">
                            <a href="<?= base_url('dashboard/about') ?>">ABOUT US</a>
                        </li>
						
                        <li class="<?= $cart ?>">
                            <a href="<?= base_url('tampilan_produk/cart') ?>" style=""><i class="fas fa-shopping-cart" style="font-size: 20px;"><sup><?= $this->cart->total_items() ?></sup></i>
                           
                            </a>
                            
                        </li>
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #FF650B; border-color: #FF650B; ">
                            <i class="far fa-user-circle" style="font-size: 30px;"></i>
                          </button>
                          <div class="dropdown-menu" style="background: black;">
                            <li class="<?= $profile_reseller ?>">
                                <a href="<?= base_url('profile_reseller/profile') ?>">PROFILE</a>
                            </li>
                            <li class="<?= $history; ?>">
                                <a href="<?= base_url('history_order/history')?>">HISTORY ORDER</a>
                            </li>
                            <br>
                            <li>
                                 <?php if ($this->session->userdata('level_id') == 2) { ?>
                                    <a style="width: 100px; height: 50px; font-size: 20px; color: white;"><?= anchor('auth/logout_reseller','Logout')?></a>
                                <?php } ?>
                            </li>
                          </div>
                        </div>
            </ul> 
        </div>
    </div>
</nav>

        
    </header>
    <!-- Header End -->

