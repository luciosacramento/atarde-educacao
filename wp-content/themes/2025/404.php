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

   <div class="row content_box">

      <div class="col-xl-9 content padding_content" id="texto">
          <h1 class="error_404">404</h1>
          <span class="error_404_text"> Página não encontrada!</span>
          
          <div class="busca_page">
              <?php get_search_form(); ?>
          </div>
              
      </div>
       
       
      <div class="col-xl-3">
          
         <?php dynamic_sidebar('Right Widget Area') ?> 
          
      </div>

    </div>

  <!-- Fim Conteúdo -->


<?php get_footer(); ?>
