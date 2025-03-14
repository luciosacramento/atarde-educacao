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
    <div class="container cont-nav-heade">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <?php 
        $page = get_page_by_path('home');
        $page_link = get_permalink($page->ID);
        ?>
       <?php if ($post->post_name != "home"){?> <a class="navbar-brand" href="<?php echo $page_link; ?>">A Tarde Educação</a><?php } ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
          <?php
            // Obtém os itens do menu "Menu Principal"
            $menuItens = wp_get_nav_menu_items("Menu Principal");

            // Função para construir o menu recursivamente
            function build_menu($menuItens, $parent_id = 0) {
                $str = "";

                foreach ($menuItens as $menuItem) {
                    // Verifica se o item atual é filho do item pai atual
                    if ($menuItem->menu_item_parent == $parent_id) {
                        // Verifica se o item tem filhos
                        $has_children = false;
                        foreach ($menuItens as $subItem) {
                            if ($subItem->menu_item_parent == $menuItem->ID) {
                                $has_children = true;
                                break;
                            }
                        }

                        // Inicia o item do menu
                        $str .= "<li class='nav-item" . ($has_children ? " dropdown" : "") . "'>";
                        $str .= "<a class='nav-link" . ($has_children ? "' data-bs-toggle='dropdown'" : "'") . " href='" . $menuItem->url . "'>" . $menuItem->title . "</a>";

                        // Se o item tem filhos, constrói o submenu
                        if ($has_children) {
                            $str .= "<ul class='dropdown-menu'>";
                            $str .= build_menu($menuItens, $menuItem->ID); // Chama a função recursivamente para os filhos
                            $str .= "</ul>";
                        }

                        $str .= "</li>";
                    }
                }

                return $str;
            }

            // Exibe o menu
            echo "<ul class='navbar-nav'>" . build_menu($menuItens) . "</ul>";
            ?>
          </ul>
          <?php get_search_form(); ?>
          <div class="d-flex flex-row">
            <div class="p-2"><img src="<?php bloginfo('template_url'); ?>/img/icon-ava.png" alt="AVA"></div>
            <div class="p-2"><img src="<?php bloginfo('template_url'); ?>/img/icon-insta.png" alt="Instagam"></div>
            <div class="p-2"><img src="<?php bloginfo('template_url'); ?>/img/icon_face.png" alt="Facebook"></div>
            <div class="p-2"><img src="<?php bloginfo('template_url'); ?>/img/icon-youtube.png" alt="Youtube"></div>
          </div>
        </div>
      </nav>
      
    </div>
    </header>
    <?php 
      global $post;
      //$_POST["email"]
      if ($post->post_name != "home"){?>
      <section class="header-section">
          <div class="row align-items-center">
            <div class="col-md-12 cont-imagem no-padding-lr" >
              <?php 
              

              // Verifica se o parâmetro "s" foi passado na URL
              if (isset($_GET["s"])) {
                ?>
                    <img class="header-image" src="<?php bloginfo('template_url'); ?>/img/header_padrao.jpg" >
                <?php
              } else {

                $imagem_url = get_post_meta($post->ID, '_imagem_topo', true);

                if($post->post_type == 'noticias_post'){

                  $pageNoticias = get_page_by_path('noticias');
                  $imagem_url = get_post_meta($pageNoticias->ID, '_imagem_topo', true);

                }

                if($imagem_url){
                  echo '<img class="header-image" src="'. $imagem_url. '" alt="">';
                }else{
                  echo '<img class="header-image" src="'. get_stylesheet_directory_uri(). '/img/header_padrao.jpg" alt="">';
                }
                //the_post_thumbnail('header-image', ['class' => ' header-image']);
              }

              
              
              ?>
              <img class="ondas" src="<?php bloginfo('template_url'); ?>/img/onda.png" alt="">
              <!--div class="ondas"></div-->
             
            </div>
          </div>
      </section>
      

      <?php 
      $titulo = $post->post_title;
      $resumo = $post->post_excerpt;

      if($post->post_type == 'area-atuacao-post'){
        $titulo = 'Área de Atuação';
        $resumo = "";
      }

      if($post->post_type == 'noticias_post'){
        $titulo = 'Notícias';
        $resumo = "";
      }

      ?>

      <div class="container d-table bg-transparent titulo_icone_header">
              <h1 class="header-title bree-serif-regular"><?php echo $titulo; ?></h1>
              <h1 class="header-title-2 bree-serif-regular"><?php echo $titulo; ?>
              <p class="header-subtitle">
                <?php echo $resumo; ?>               
              </p>
            </h1>
              
              <?php
              $imagem_personalizada = get_post_meta(get_the_ID(), '_imagem_personalizada', true);
              if (!empty($imagem_personalizada)) {
                  echo '<img src="' . esc_url($imagem_personalizada) . '" alt="Imagem Personalizada" class="header-icon">';
              }
              ?>
      </div>
    <?php }else{?>
      <section class="header-section home">
          <div class="row align-items-center">
            <div class="col-md-12" >
              <img src="<?php bloginfo('template_url'); ?>/img/header_home.jpg" />
            </div>
            <div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/title_header_home.png" /></div>
          </div>
      </section>

    <?php }?>
  