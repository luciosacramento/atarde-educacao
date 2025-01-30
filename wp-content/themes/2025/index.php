<?php 
get_header(); 
?>

       <!-- Hero Section -->
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
      <h2 class="text-center subtitle_center subtitle-icon"><span class="icon-noticias"></span><div class="bree-serif-regular">Notícias</div></h2>
      <div class="row mt-4 owl-carousel">


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
  <a href="#" class="btn btn-primary m-auto d-table mb-5">veja todas</a>

  <div class="cont-areaatuacao">
    <!-- Area de Atuação Section -->
    <section class="py-5 atuacao">
      <div class="globo"></div>
      <div class="container">
        <h2 class="text-center subtitle_center"></span><div class="bree-serif-regular">Área de Atuação</div></h2>
        <div class="row mt-4">
          <div class="col-md-4 text-center">
            <img src="icon1.png" alt="Icon 1" class="mb-3">
            <h5>Socioeducacional</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="icon2.png" alt="Icon 2" class="mb-3">
            <h5>Empreendedorismo</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="icon3.png" alt="Icon 3" class="mb-3">
            <h5>Socioambiental</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Números do Programa Section -->
    <section class="py-5">
      <div class="container">
        <h2 class="text-center">Números do Programa</h2>
        <div class="row text-center mt-4">
          <div class="col-md-3">
            <h3>50+</h3>
            <p>Municípios</p>
          </div>
          <div class="col-md-3">
            <h3>200+</h3>
            <p>Professores</p>
          </div>
          <div class="col-md-3">
            <h3>3000+</h3>
            <p>Alunos</p>
          </div>
          <div class="col-md-3">
            <h3>100+</h3>
            <p>Escolas</p>
          </div>
        </div>
      </div>
    </section>

  </div>

<?php get_footer(); ?>