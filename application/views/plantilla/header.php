<!doctype html>

<html class="no-js" lang="en">

  
<!-- Mirrored from projects.blacksheepz.org/wp-content/templates/vetparlor/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2015 04:37:51 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $titulo ?></title>

    <meta name="title" content="VetParlor">
    <meta name="description" content="">
    
    <meta name="google-site-verification" content=""> <!-- http://google.com/webmasters -->

    <meta name="author" content="Your Name Here">
    <meta name="Copyright" content="Copyright Your Name Here 2014. All Rights Reserved.">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicons/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicons/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>assets/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>assets/images/favicons/apple-touch-icon-114x114.png">
    <!-- Windows 8 start screen specific meta -->
    <meta name="application-name" content=""/>
    <meta name="msapplication-TileColor" content="#7190aa"/>
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/images/favicons/windows-8-start-screen-icon.png"/>

    <link href='http://fonts.googleapis.com/css?family=Unkempt:700|Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/stylesheets/app.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/stylesheets/style.css" />
    <script src="<?= base_url() ?>assets/js/vendor/modernizr.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-validation/additional-methods.min.js"></script>
  </head>

  <body>

    <header id="main-header">
      <div  id="top-alert">
        <div class="row">
          <div class="small-16 columns">
            <p><span class="icon-old-phone"></span> 0424-9441482 / 0412-834537 / 0412-8796704</p>
          </div>
        </div>
      </div>
      
      <div class="row" id="loginout">
        <div class="small-16 columns">
          <p class="text-right">
            <?php if($this->session->userdata('tipo') == "persona"){ ?>
            <a href="<?= base_url() ?>home/perfiles" title="Perfiles"><span class="icon-user"></span></a>
            <a href="<?= base_url() ?>home/logout" title="Cerrar Sesión"><span class="icon-log-out"></span></a>
            <?php
            }
            elseif($this->session->userdata('tipo') == "admin")
            {
            ?>
            <strong><span class="icon-user"></span><?= $this->session->userdata('email') ?></strong>
            <a href="<?= base_url() ?>admin/modificar" title="Modificar Datos"><span class="icon-pencil"></span></a>
            <a href="<?= base_url() ?>admin" title="Panel Administrativo"><span class="icon-lock"></span></a>
            <a href="<?= base_url() ?>home/logout" title="Cerrar Sesión"><span class="icon-log-out"></span></a>
            <?php
            }
            else
            {
            ?>
            <a href="<?= base_url() ?>home/singin" title="Registrate"><span class="icon-add-user"></span></a>
            <a href="<?= base_url() ?>home/login" title="Iniciar Sesión"><span class="icon-login"></span></a>
            <?php } ?>
          </p>
        </div>
      </div>
      
      <div class="row">
        <div class="small-16 columns">
          <a href="<?= base_url() ?>" id="logo">
            <img src="<?= base_url() ?>assets/images/logo/logo.png" alt="funprobiani"/>
          </a>
        </div>
      </div>
    </header>

    <?php if(isset($menu)): ?>
    <section id="navigation">
      <div class="row">
        <div class="small-16 columns">
          <nav class="responsive-nav" id="js-responsive-nav">
            <ul class="responsive-nav__list">
              <li class="responsive-nav__item <?php if($opcion == 'home'){ ?> active <?php } ?>">
                <a href="<?= base_url() ?>" class="responsive-nav__link"><span class="icon-home"></span></a>
              </li>
              <li class="responsive-nav__item <?php if($opcion == 'nosotros'){ ?> active <?php } ?>">
                <a href="<?= base_url() ?>home/nosotros" class="responsive-nav__link"><span class="icon-globe"></span>Nosotros</a>
              </li>
              <li class="responsive-nav__item <?php if($opcion == 'adopta'){ ?> active <?php } ?>">
                <a href="<?= base_url() ?>mascotas/adopta" class="responsive-nav__link"><span class="icon-heart"></span>Adopta</a>
              </li>
              <li class="responsive-nav__item <?php if($opcion == 'dona'){ ?> active <?php } ?>">
                <a href="<?= base_url() ?>home/donaciones" class="responsive-nav__link"><span class="icon-credit"></span>Donaciones</a>
              </li>
              <li class="responsive-nav__item <?php if($opcion == 'contacto'){ ?> active <?php } ?>">
                <a href="<?= base_url() ?>home/contactanos" class="responsive-nav__link"><span class="icon-typing"></span>Contactanos</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <?php endif; ?>