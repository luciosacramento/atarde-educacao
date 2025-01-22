<?php
 get_header();

 wp_reset_query();

 ?>

 <!-- Conteúdo -->
   <div class="row content_box">

      <div class="col-xs-12 col-md-9 content padding_content" id="texto">
      	<div class="banner-page"><?php echo (get_the_post_thumbnail($post->ID)); ?></div>
        <?php the_content(); ?>
      </div>

    </div>
  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
