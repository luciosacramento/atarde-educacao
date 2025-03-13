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
/*
                // Recuperar as imagens já salvas e garantir que aparecem ao editar o post
                $imagens = get_post_meta($post->ID, '_galeria_imagens', true);
                $imagens = is_array($imagens) ? $imagens : []; // Garante que é um array
                ?>
                <input type="hidden" name="galeria_imagens" id="galeria_imagens" value="<?php echo esc_attr(implode(',', $imagens)); ?>">
                <ul id="galeria-preview">
                    <?php
                    if (!empty($imagens)) {
                        foreach ($imagens as $imagem_id) {
                            $img_url = wp_get_attachment_image_url($imagem_id, 'thumbnail');
                            echo '<li data-id="' . esc_attr($imagem_id) . '">
                                    <img src="' . esc_url($img_url) . '" width="100" height="100">
                                    <button class="remover-imagem">Remover</button>
                                </li>';
                        }
                    }*/
                    ?>
                <!--/ul-->

            <?php        

                

                // Verifica se existem posts
                if (!empty($imagens)) {

                    foreach ($imagens as $imagem_id) {

                        $imagem_destaque = wp_get_attachment_image_url($imagem_id, 'thumbnail'); // URL da imagem em destaque (tamanho completo)
                        if (!$imagem_destaque) {
                            $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                        }

                        //$media_link = get_post_meta(get_the_ID(), 'media_link', true);

                        ?>
                            <div class="col-md-4 p-3">
                            <div class="card">
                                <a  href="#" class="abrir-modal" data-url="<?php echo esc_url($img_url);; ?>" data-title="<?php echo get_the_title(); ?>" data-content="<?php echo get_the_content(); ?>" >
                                    <img src="<?php echo esc_url($img_url);?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
                                </a>                                
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
