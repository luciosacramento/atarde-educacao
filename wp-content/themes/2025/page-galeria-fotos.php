<?php
/**
 * Template Name: Página interna Galeria
 *
 * Description: Template criado para exibir Galeria
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
      <div class="row mt-4" id="noticias-container">


        <?php
                // Configuração da consulta para buscar os posts do tipo 'post'
                $args = array(
                    'post_type'      => 'galeria_fotos',      // Tipo de conteúdo 'post' (padrão para notícias)
                    'posts_per_page' => 18,         // Quantidade de posts (notícias)
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

                        //$media_link = get_post_meta(get_the_ID(), 'media_link', true);

                        ?>
                            <div class="col-md-4 p-3">
                            <div class="card">
                                <a  href="#" class="abrir-modal" data-url="<?php echo esc_url($imagem_destaque); ?>" >
                                    <img src="<?php echo $imagem_destaque;?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
                                </a>                                
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
      <button id="mais-noticias" data-paged="1" tipo="galeria_fotos" >Carregar mais</button>
      <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>
      
    </div>
  </section>

<div id="modal" style="display: none;">
    <div id="modal-content">
        <span id="fechar-modal">&times;</span>
        <div id="modal-body">
            <!-- O conteúdo será carregado dinamicamente -->
        </div>
    </div>
</div>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
