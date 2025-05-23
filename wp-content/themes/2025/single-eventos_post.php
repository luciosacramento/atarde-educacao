<?php
/**
 * Template Name: Página interna Notícias
 *
 * Description: Template criado para exibir Notícias
 *
 * @package WordPress
 * @subpackage atarde
 * @since A tarde Educação 1.0
 */

 get_header();

 wp_reset_query();

 ?>

 <!-- Conteúdo -->
 <section class="py-5">
    <div class="container">

        <!-- Compartilhar -->
        <?php echo do_shortcode( '[social_share]' ); ?>
        
       <!-- Título e Data -->
       <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="fw-bold"><?php the_title(); ?></h1>
            <span><?php echo get_the_date(); ?></span>
        </div>


        <!-- Imagem Principal -->
        <!--?php the_post_thumbnail('topo-noticias', ['class' => 'img-fluid w-100']); ?-->


        <div class="row mt-4">
        <div class="col-md-8 event-content">
            <?php echo get_the_content(); ?>
        </div>

        <div class="col-md-4">
            <div class="event-details">
            <h5 class="mb-0"><?php echo get_post_meta(get_the_ID(), '_tipo', true) ?></h5>
            <p class="mb-2 evento-cidade"><?php echo get_post_meta(get_the_ID(), '_cidade', true) ?> - <?php echo get_post_meta(get_the_ID(), '_estado', true) ?></p>
            <p><?php echo get_post_meta(get_the_ID(), '_data', true) ?></p>
            <p> <?php echo get_post_meta(get_the_ID(), '_publico', true) ?></p>
            </div>
        </div>
        </div>

        <h2 class="text-center section-title bree-serif-regular linha-centralizada mb-5 mt-5">Mais eventos</h2>

        <div class="row mt-4" id="noticias-container">

        <?php
                // Configuração da consulta para buscar os posts do tipo 'post'
                $args = array(
                    'post_type'      => 'eventos_post',      // Tipo de conteúdo 'post' (padrão para notícias)
                    'posts_per_page' => 6,         // Quantidade de posts (notícias)
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

                        $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'full'); // URL da imagem em destaque (tamanho completo)
                        if (!$imagem_destaque) {
                            $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                        }

                        ?>
                            <div class="col-md-4 p-3">
                            <div class="card">
                                <a  href="<?php echo get_permalink(); ?>" >
                                    <img src="<?php echo $imagem_destaque;?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
                                </a>
                                <div class="card-body">
                                <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                                <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                                <div class="row">
                                    <em class="col-6"><?php echo get_the_date('d/m/Y'); ?></em>
                                    <a class="col-6 text-end btn btn-link" href="<?php echo get_permalink(); ?>" >Leia mais</a>
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
      
    <button id="mais-noticias" data-paged="1" tipo="eventos_post">Carregar mais</button>
      <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>
    
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
