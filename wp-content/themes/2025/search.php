<?php
/**
 * Template Name: Página interna Busca
 *
 * Description: Template criado para exibir Busca
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
    <div class="container my-5">
        
        <h1 class="mb-4">Resultados da busca por: "<?php echo get_search_query(); ?>"</h1>

        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h5>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Ler mais</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Paginação -->
            <div class="pagination">
                <?php 
                    echo paginate_links(array(
                        'prev_text' => '&laquo; Anterior',
                        'next_text' => 'Próximo &raquo;',
                    ));
                ?>
            </div>

        <?php else : ?>
            <p class="alert alert-warning">Nenhum resultado encontrado para sua busca.</p>
        <?php endif; ?>

    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>