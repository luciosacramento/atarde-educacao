<?php 
get_header(); 
?>

       <!-- Hero Section --
  <section class="hero-section text-center py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-5">Escola Educacional</h1>
          <p class="lead">Para qualquer tipo de ensino!</p>
        </div>
        <div class="col-md-6">
          <img src="hero-image.jpg" alt="Students" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </section>
  
  <!-- Objective Section -->

  <section class="py-5 nosso-objetivo-area">
    
    <div class="publico professores"><img src="<?php bloginfo('template_url'); ?>/img/user_professores.png"></div>
    <div class="publico gestores"><img src="<?php bloginfo('template_url'); ?>/img/user_gestores.png"></div>
    <div class="publico estudantes"><img src="<?php bloginfo('template_url'); ?>/img/user_estudante.png"></div>
    <div class="caneta"></div>
    
    <div class="container  cont-nossoobjetivo ">
      <h2 class="bree-serif-regular">Nosso Objetivo</h2>
      <p class="mt-3"><?php echo $post->post_content; ?></p>
      <a href="#" class="btn btn-primary mt-3">Saiba Mais</a>
    </div>

    <iframe class="video" width="499" height="319" src="https://www.youtube.com/embed/g43TplVtTKE?si=MllbbOiwG-VEJBzp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

  </section>


  <!-- News Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center subtitle_center subtitle-icon"><span class="icon-noticias"></span><div><span class="label bree-serif-regular">Notícias</span></div></h2>
      <div id="owl-carousel" class="row mt-4 owl-carousel">


        <?php
                // Configuração da consulta para buscar os posts do tipo 'post'
                $args = array(
                    'post_type'      => 'noticias_post',      // Tipo de conteúdo 'post' (padrão para notícias)
                    'posts_per_page' => 10,         // Quantidade de posts (notícias)
                    'post_status'    => 'publish',  // Apenas posts publicados
                    'orderby'        => 'date',     // Ordenar por data
                    'order'          => 'DESC',     // Ordem decrescente (mais recentes primeiro)
                );

                // Executa a consulta
                $query = new WP_Query($args);

                // Verifica se existem posts
                if ($query->have_posts()) {
                    $noticias = array();

                    while ($query->have_posts()) {
                        $query->the_post(); // Configura o post atual

                        $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'noticias-home-chamada'); // URL da imagem em destaque (tamanho completo)
                        if (!$imagem_destaque) {
                            $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                        }

                        ?>
                            <div class="col-md-12 p-3">
                            <div class="card">
                                <img src="<?php echo $imagem_destaque;?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                                <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                                <div class="row">
                                    <em class="col-6"><?php echo get_the_date('d/m/Y'); ?></em>
                                    <a class="col-6" href="<?php echo get_permalink(); ?>" class="btn btn-link">VEJA MAIS +</a>
                                </div>
                                </div>
                            </div>
                            </div>

                        <?php

                        // Monta o array com as informações da notícia
                        $noticias[] = array(
                            'titulo'     => get_the_title(),                            // Título da notícia
                            'resumo'     => get_the_excerpt(),                         // Resumo da notícia
                            'data'       => get_the_date('d/m/Y'),                     // Data formatada no padrão dd/mm/yyyy
                            'link'       => get_permalink(),                           // Link da notícia
                        );
                    }

                    // Reseta os dados da consulta
                    wp_reset_postdata();

                } else {
                    return 'Sem notícias no momento'; // Nenhuma notícia encontrada
                }
        ?>

      </div>
    </div>
  </section>
  <?php 
    $page = get_page_by_path('noticias');
    $page_link = get_permalink($page->ID);
  ?>
  <a href="<?php echo $page_link; ?>" class="btn btn-primary m-auto d-table mb-5">veja todas</a>

  <div class="cont-areaatuacao">
    <!-- Area de Atuação Section -->
    <section class="py-5 atuacao">
      <div class="globo"></div>
      <div class="container ps-4">

        <h2 class="text-center subtitle_center">
          <div><span class="label bree-serif-regular">Área de Atuação</span></div>
          <span class="sub">Confira os nossos eixos de trabalho</span>
        </h2>

        <div class="row mt-4 mr-4">

        <?php
          // Configuração da WP_Query para buscar posts do tipo "area-atuacao-post"
          $args = array(
              'post_type' => 'area-atuacao-post', // Tipo de post
              'posts_per_page' => -1, // Retorna todos os posts
              'order' => 'ASC', // Ordem crescente
          );

          $query = new WP_Query($args);

          // Verifica se há posts
          if ($query->have_posts()) {
              echo '<div class="row">'; // Inicia a linha
          
              $post_count = 0; // Contador de posts
          
              while ($query->have_posts()) {
                  $query->the_post();
                  $post_count++;
          
                  // Recupera o link do post
                  $post_link = get_permalink();
          
                  // Recupera a imagem em destaque (thumbnail)
                  $featured_image = get_post_meta(get_the_ID(), '_imagem_personalizada', true);
          
                  // Recupera o título e o resumo do post
                  $post_title = get_the_title();
                  $post_excerpt = get_the_excerpt();
          
                  // Estrutura HTML para o primeiro post
                  if ($post_count === 1) {
                      echo '
                      <div class="col-md-3 text-start">
                          <strong>' . esc_html($post_title) . '</strong>
                          <p>' . esc_html($post_excerpt) . '</p>
                      </div>';
                  } else {
                      // Estrutura HTML para os demais posts
                      echo '
                      <div class="col-md-3 text-center">
                          <a href="' . esc_url($post_link) . '">
                              <img src="' . esc_url($featured_image) . '" alt="' . esc_attr($post_title) . '" class="mb-3">
                          </a>
                      </div>';
                  }
              }
          
              echo '</div>'; // Fecha a linha
          } else {
              // Mensagem caso não haja posts
              echo '<p>Nenhum post encontrado.</p>';
          }

          // Reseta a query
          wp_reset_postdata();
          ?>
          
        </div>
      </div>
    </section>

    <!-- Números do Programa Section -->
    <section class="py-5">
      <div class="container">

        <h2 class="text-center subtitle_center branco">
          <div><span class="label bree-serif-regular">Área de Atuação</span></div>
          <span class="sub">Confira os nossos eixos de trabalho</span>
        </h2>

        <div class="row text-center mt-5 cont-numero-programa">

        <?php
          // Configuração da WP_Query para buscar posts do tipo "area-atuacao-post"
          $args = array(
              'post_type' => 'numero-programa-post', // Tipo de post
              'posts_per_page' => -1, // Retorna todos os posts
              'order' => 'ASC', // Ordem crescente
          );

          $query = new WP_Query($args);

          // Verifica se há posts
          if ($query->have_posts()) {

          
              $post_count = 0; // Contador de posts
          
              while ($query->have_posts()) {
                  $query->the_post();
                  $post_count++;
          
                  // Recupera o link do post
                  $post_link = get_permalink();
          
                  // Recupera a imagem em destaque (thumbnail)
                  $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
          
                  // Recupera o título e o resumo do post
                  $post_title = get_the_title();
                  $post_content = get_the_content();
          
                  // Estrutura HTML para o primeiro post
                  echo '
                  <div class="col-12 item-numero-programa">
                      <img src="'.$featured_image.'"/><h3>' . esc_html($post_title) . '</h3>
                      <p>' . esc_html($post_content) . '</p>
                  </div>';
              }

          } else {
              // Mensagem caso não haja posts
              echo '<p>Nenhum post encontrado.</p>';
          }

          // Reseta a query
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </section>

    <div class="cont-areaatuacao-mulher"></div>

  </div>

<?php get_footer(); ?>