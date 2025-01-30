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
        
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/owlcarousel/assets/owl.theme.default.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

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
      <section class="header-section">
          <div class="row align-items-center">
            <div class="col-md-12 cont-imagem" >
            <?php the_post_thumbnail('header-image', ['class' => ' header-image']); ?>
              <div class="ondas"></div>
              <h1 class="header-title bree-serif-regular"><?php echo $post->post_title; ?></h1>
              <h1 class="header-title-2 bree-serif-regular"><?php echo $post->post_title; ?></h1>
              <p class="header-subtitle">
                <?php echo $post->post_excerpt; ?>               
              </p>
            </div>
          </div>
      </section>
    <?php }?>
  </header>