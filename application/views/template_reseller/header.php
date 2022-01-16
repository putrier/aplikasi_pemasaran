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
    <link rel="shortcut icon" href="<?= base_url()?>assets/icon.png">
    

     <!-- SweetAlert -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css">

   

    

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
        
    <nav id="topNav" class="navbar navbar-default main-menu">
    <div class="container">
        <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            ☰
        </button> 
         <a class="navbar-brand page-scroll" href="#slider"><img class="logo" id="logo" src="<?= base_url() ?>assets/reseller/images/logo1.png" alt="logo"></a>
        <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
            <ul class="nav navbar-nav">
                 <li class="active">
                            <a href="#slider">HOME</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tampilan_produk/product') ?>">PRODUCT</a>
                        </li>
                         <li>
                            <a href="<?= base_url('dashboard/reseller_rules') ?>">RESELLER RULES</a>
                        </li>
                       
                        <li>
                            <a href="<?= base_url('dashboard/top_reseller') ?>">TOP RESELLER</a>
                        </li>
                        <li>
                            <a href="<?= base_url('dashboard/about') ?>">ABOUT US</a>
                        </li>
                        
                        <li>
                              <a href="<?= base_url('tampilan_produk/cart') ?>" style=""><i class="fas fa-shopping-cart" style="font-size: 20px;"><sup><?= $this->cart->total_items() ?></sup></i>
                           
                            </a>
                        </li>
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #FF650B; border-color: #FF650B; ">
                            <i class="far fa-user-circle" style="font-size: 30px;"></i>
                          </button>
                          <div class="dropdown-menu" style="background: black;">
                            <li>
                                <a href="<?= base_url('profile_reseller/profile') ?>">PROFILE</a>
                            </li>
                            <li>
                                <a href="<?= base_url('history_order/history') ?>">HISTORY ORDER</a>
                            </li>
                        
                          </div>
                        </div>
            </ul> 
        </div>
    </div>
</nav>

        
    </header>
    <!-- Header End -->


    <section class="slider-pro slider" id="slider">
        <div class="sp-slides">

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <img class="sp-image" src="<?= base_url() ?>assets/reseller/images/slider/background1.png" alt="Slider 1"/>
                <p class="sp-layer"
                data-position="center" data-vertical="20%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right" style="top:60%">
                  <strong>  <?php if ($this->session->userdata('level_id') == 2) { ?>
                        Selamat Datang, <?= $reseller['nama_reseller']; ?>
                    <?php } else { ?>
                        Selamat Datang
                    <?php } ?>
                </strong>
                </p>
               
                <p class="sp-layer"
                data-position="center" data-vertical="40%" >
                    <?php if ($this->session->userdata('level_id') == 2) { ?>
                        <button class="btn" style="width: 100px; height: 50px; font-size: 20px; color: white; "><?= anchor('auth/logout_reseller','Logout')?></button>
                    <?php } else { ?>
                        <button class="btn" style="width: 100px; height: 50px; font-size: 20px; color: white;"><?= anchor('auth','Login')?></button>
                        <button class="btn" style="width: 125px; height: 50px; font-size: 20px; color: white;"><?= anchor('registrasi','Registrasi')?></button>
                    <?php } ?>

                </p>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <img class="sp-image" src="<?= base_url() ?>assets/reseller/images/slider/background2.png" alt="Slider 2"/>
                <p class="sp-layer"
                data-position="center" data-vertical="40%" >
                    <?php if ($this->session->userdata('level_id') == 2) { ?>
                        <button class="btn" style="width: 100px; height: 50px; font-size: 20px; color: white; "><?= anchor('auth/logout_reseller','Logout')?></button>
                    <?php } else { ?>
                        <button class="btn" style="width: 100px; height: 50px; font-size: 20px; color: white;"><?= anchor('auth','Login')?></button>
                        <button class="btn" style="width: 125px; height: 50px; font-size: 20px; color: white;"><?= anchor('registrasi','Registrasi')?></button>
                    <?php } ?>

                </p>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <img class="sp-image" src="<?= base_url() ?>assets/reseller/images/slider/background3.png" alt="Slider 3"/>
                <p class="sp-layer"
                data-position="center" data-vertical="40%" >
                    <?php if ($this->session->userdata('level_id') == 2) { ?>
                        <button class="btn" style="width: 100px; height: 50px; font-size: 20px; color: white; "><?= anchor('auth/logout_reseller','Logout')?></button>
                    <?php } else { ?>
                        <button class="btn" style="width: 100px; height: 50px; font-size: 20px; color: white;"><?= anchor('auth','Login')?></button>
                        <button class="btn" style="width: 125px; height: 50px; font-size: 20px; color: white;"><?= anchor('registrasi','Registrasi')?></button>
                    <?php } ?>

                </p>
            </div>
            <!-- Slides End -->

        </div>
    </section>
    <!-- Main Slider End -->