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
                $imagens = get_post_meta($post->ID, '_galeria_imagens', true);
                $imagens = is_array($imagens) ? $imagens : []; // Garante que é um array
                // Verifica se existem posts
                if (!empty($imagens)) {

                    foreach ($imagens as $imagem_id) {

                        $imagem_destaque = wp_get_attachment_image_url($imagem_id, 'noticias-list'); // URL da imagem em destaque (tamanho completo)
                        $imagem_destaque_full = wp_get_attachment_image_url($imagem_id, 'full');
                        $title = get_the_title($imagem_id);

                        if (!$imagem_destaque) {
                            $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                        }

                        //$media_link = get_post_meta(get_the_ID(), 'media_link', true);

                        ?>
                            <div class="col-md-4 p-3">
                            <div class="card">
                                <a  href="#" class="abrir-modal" data-url="<?php echo esc_url($imagem_destaque_full); ?>" data-title="<?php echo  $title; ?>" data-content="<?php echo get_the_content(); ?>" >
                                    <img src="<?php echo esc_url($imagem_destaque);?>" class="card-img-top" alt="<?php echo  $title; ?>">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo  $title; ?></h5>
                                </div>                                   
                            </div>
                            </div>

                        <?php

                   
                    }

                    // Reseta os dados da consulta
                    wp_reset_postdata();

                } else {
                    return 'Sem fotos no momento'; // Nenhuma notícia encontrada
                }
        ?>

      </div>
      <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>
      
    </div>
  </section>

<div id="modal" style="display: none">
    <div id="modal-content" style="width:60%">
        <span id="fechar-modal">&times;</span>
        <button class="bt-arrow" id="prev" style="position: absolute; left: -34px; top:50%">&#10094;</button>
        <button class="bt-arrow" id="next" style="position: absolute; right: -34px; top: 50%;">&#10095;</button>
        <div id="modal-body">
            <!-- O conteúdo será carregado dinamicamente -->
        </div>
    </div>
</div>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
