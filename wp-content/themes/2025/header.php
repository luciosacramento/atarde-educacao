<!doctype html>
<html lang="pt-BR">
    <head>        

        <title><?php
            if (is_single()) {
                single_post_title();
            } elseif (is_home() || is_front_page()) {
                bloginfo('name');
                print ' | ';
                bloginfo('description');
            } elseif (is_page()) {
                bloginfo('name');
                print ' | ';
                single_post_title('');
            } elseif (is_search()) {
                bloginfo('name');
                print ' | Busca por ' . wp_specialchars($s);
            } elseif (is_404()) {
                bloginfo('name');
                print ' | Não encontrado';
            } else {
                bloginfo('name');
                wp_title('|');
            }
            ?>
        </title>
       
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta http-equiv="x-ua-compatible" content="IE=9" >
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" href="favicon.ico">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owlcarousel/assets/owl.theme.default.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo strtotime(date('Y-m-d h:i:s')); ?>" type="text/css" media="screen" id="color-style"/>
        </head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- ./Making stripe menu navigation -->
   <!-- Header Section -->
  <header class=" text-white">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">A Tarde Educação</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <?php
                $menuItens = wp_get_nav_menu_items("Menu Principal");   

                $str = "";

                foreach ( $menuItens as $menuItem ) {
                    $str .= "<li class='nav-item'><a class='nav-link' href='".$menuItem->url."'>".$menuItem->title."</a></li>";
                }

                echo $str;
            ?>
          </ul>
          <?php get_search_form(); ?>
          <div class="d-flex flex-row">
            <div class="p-2">1</div>
            <div class="p-2">2</div>
            <div class="p-2">3</div>
          </div>
        </div>
      </nav>
      
    </div>
    <?php 
      global $post;
      if ($post->post_name != "home"){?>
      <section class="eventos-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <h1 class="eventos-title">Eventos</h1>
              <p class="eventos-subtitle">
                Aqui você encontrará todos os nossos eventos e como participar.
              </p>
            </div>
            <div class="col-md-6 position-relative">
              <img
                src="http://localhost/atarde-educacao-1/wp-content/uploads/2025/01/a-statue-of-medusa-with-snakes-for-hair-_AEY-OUzORWin4U6s7dRNYQ_0m0Md5RYT9eTP3g8PViQKA-1-1024x455.jpeg"
                alt="Imagem de crianças"
                class="eventos-image img-fluid"
              />
              <div class="ondas"></div>
            </div>
          </div>
        </div>
      </section>
    <?php }?>
  </header>