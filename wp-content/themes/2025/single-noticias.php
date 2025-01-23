<?php
 get_header();

 wp_reset_query();

 ?>

 <!-- Conteúdo -->
 <section class="py-5">
    <div class="container">
      
       <!-- Voltar -->
       <a href="<?php echo esc_url(wp_get_referer()); ?>" class="btn btn-link">&lt; Voltar</a>

        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post(); // Carrega os dados da postagem atual
        ?>

        <!-- Título e Data -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="fw-bold"><?php the_title(); ?></h1>
            <span><?php echo get_the_date(); ?></span>
        </div>

        <!-- Compartilhar -->
        <div class="d-flex align-items-center mb-4 social-icons">
            <span class="me-2">COMPARTILHE:</span>
            <a href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">Twitter</a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">Facebook</a>
            <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">Pinterest</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">LinkedIn</a>
            <a href="https://wa.me/?text=<?php echo urlencode(get_permalink()); ?>" target="_blank">WhatsApp</a>
            <a href="https://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo urlencode(get_permalink()); ?>" target="_blank">Tumblr</a>
        </div>

        <!-- Imagem Principal -->
        <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>

        <!-- Texto da Notícia -->
        <?php the_content(); ?>

        <!-- Imagens Relacionadas -->
        <div class="row news-images">
            <div class="col-6 col-md-4">
                <img src="image1.jpg" alt="Imagem 1">
            </div>
            <div class="col-6 col-md-4">
                <img src="image2.jpg" alt="Imagem 2">
            </div>
            <div class="col-6 col-md-4">
                <img src="image3.jpg" alt="Imagem 3">
            </div>
            <div class="col-6 col-md-4">
                <img src="image4.jpg" alt="Imagem 4">
            </div>
        </div>

        <?php
        endwhile;
        else :
        ?>
            <p>Desculpe, nenhum conteúdo foi encontrado.</p>
        <?php endif; ?>

        <!-- Navegação e Voltar ao Topo -->

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <?php
                if (get_previous_post()) {
                    previous_post_link('%link', '< Anterior');
                } else {
                    echo '<span class="text-muted">Sem postagem anterior</span>';
                }
                ?>
            </div>
            <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' });" class="btn btn-secondary">Voltar ao Topo</button>
            <div>
                <?php
                if (get_next_post()) {
                    next_post_link('%link', 'Próxima >');
                } else {
                    echo '<span class="text-muted">Sem próxima postagem</span>';
                }
                ?>
            </div>
        </div>
      
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
