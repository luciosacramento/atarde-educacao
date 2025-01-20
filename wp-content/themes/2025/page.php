<?php
/**
 * Template Name: Página interna padrão
 *
 * Description: Template criado para exibir Página interna com conteúdo simples (texto e imagem)
 *
 * @package WordPress
 * @subpackage tcm
 * @since TCM 1.0
 */

 get_header();

 wp_reset_query();

 ?>

 <!-- Conteúdo -->
fdgdfgfd
   <div class="row content_box">

      <div class="col-xs-12 col-md-9 content padding_content" id="texto">
      	<div class="banner-page"><?php echo (get_the_post_thumbnail($post->ID)); ?></div>
        <?php the_content(); ?>
        
      </div>
      <div class="col-xs-12 col-md-3">
          
         <?php dynamic_sidebar('Right Widget Area') ?> 
          
      </div>

    </div>

  <!-- Fim Conteúdo -->


<?php get_footer(); ?>
