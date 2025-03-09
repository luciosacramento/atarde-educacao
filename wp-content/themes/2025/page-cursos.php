<?php
/**
 * Template Name: Página interna Cursos
 *
 * Description: Template criado para exibir Cursos
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

        <?php 
        // Obtém todas as categorias do tipo de conteúdo 'curso_post'
        $terms = get_terms(array(
            'taxonomy'   => 'categoria_curso', // Certifique-se de que a taxonomia usada é correta
            'hide_empty' => false,      // Mostra categorias vazias
        ));

        // Obtém a URL da página atual
        $current_url = home_url(add_query_arg(array(), $_SERVER['REQUEST_URI']));

        // Obtém a categoria selecionada (se houver)
        $selected_category = isset($_GET['categoria']) ? $_GET['categoria'] : '';

        // Exibe o select dropdown
        if (!empty($terms) && !is_wp_error($terms)) {
            echo '<form method="GET" id="category-filter-form">';
            echo '<label for="category-select">Filtrar por Categoria:</label>';
            echo '<select id="category-select" name="categoria" class="mx-2">';
            echo '<option value="">Todas as Categorias</option>'; // Opção padrão

            foreach ($terms as $term) {
                $selected = ($selected_category === $term->slug) ? 'selected' : '';
                echo '<option value="' . esc_attr($term->slug) . '" ' . $selected . '>' . esc_html($term->name) . '</option>';
            }

            echo '</select>';
            echo '</form>';
        }

        // Script para redirecionamento automático ao selecionar uma categoria
        ?>
      <div class="row mt-4" id="noticias-container">


        <?php

                // Verifica se há uma categoria específica sendo filtrada
                $categoria_slug = isset($_GET['categoria']) ? sanitize_text_field($_GET['categoria']) : '';

                // Configuração da consulta para buscar os posts do tipo 'post'
                $args = array(
                    'post_type'      => 'curso_post',      // Tipo de conteúdo 'post' (padrão para notícias)
                    'posts_per_page' => 12,         // Quantidade de posts (notícias)
                    'post_status'    => 'publish',  // Apenas posts publicados
                    'orderby'        => 'date',     // Ordenar por data
                    'order'          => 'DESC',     // Ordem decrescente (mais recentes primeiro)
                );

                // Se houver uma categoria informada, adiciona à query
                if (!empty($categoria_slug)) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'categoria_curso', // Nome da taxonomia da categoria do curso
                            'field'    => 'slug',           // Filtrar pelo slug da categoria
                            'terms'    => $categoria_slug,  // Slug da categoria a ser filtrada
                        ),
                    );
                }

                // Executa a consulta
                $query = new WP_Query($args);

                // Verifica se existem posts
                if ($query->have_posts()) {
                    $noticias = array();

                    while ($query->have_posts()) {
                        $query->the_post(); // Configura o post atual

                        $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'noticias-list'); // URL da imagem em destaque (tamanho completo)
                        if (!$imagem_destaque) {
                            $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                        }

                        $terms = wp_get_post_terms(get_the_ID(), 'categoria_curso');

                        $video_url = get_post_meta(get_the_ID(), '_curso_video_url', true);
                        
                        ?>

                        <div class="col-md-3 p-3">
                            <div class="video-card">
                                

                                <?php 
                                if(!empty($video_url)){?>

                                    <a  href="#" class="abrir-modal" data-url="<?php echo $video_url; ?>" data-title="<?php echo get_the_title(); ?>" >

                                <?php } ?>

                                <img src="<?php echo $imagem_destaque;?>" alt="<?php echo get_the_title(); ?>">

                                <?php if(!empty($video_url)){?>

                                    </a>

                                <?php } ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                                    <p class="category"><?php echo get_post_meta(get_the_ID(), '_curso_categoria', true) ?></p>
                                    <div class="details">
                                    <p><i class="bi bi-clock"></i><?php echo get_post_meta(get_the_ID(), '_curso_duracao', true) ?></p>
                                    <!--p><i class="bi bi-people"></i><?php echo get_post_meta(get_the_ID(), '_curso_publico', true) ?></p-->

                                    <?php 
                                        if (!empty($terms) && !is_wp_error($terms)) {
                                            foreach ($terms as $term) {
                                                // Obtém a URL da página atual
                                                $current_url = home_url(add_query_arg(array(), $_SERVER['REQUEST_URI']));
                                                
                                                // Adiciona o slug da categoria como parâmetro na URL
                                                $category_url = add_query_arg('categoria', $term->slug, $current_url);
                                                echo '<p><i class="bi bi-people"></i> <a href="' . esc_url($category_url) . '">' . esc_html($term->name) . '</a></p>';
                                            }
                                        }
                                    ?>

                                    <p><i class="bi bi-bar-chart"></i><?php echo get_post_meta(get_the_ID(), '_curso_nivel', true) ?></p>
                                    </div>
                                    <p class="description">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
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
      <button id="mais-noticias" data-paged="1" tipo="curso_post">Carregar mais</button>
      <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>
      
    </div>
  </section>

  <script>
    document.getElementById('category-select').addEventListener('change', function() {
        document.getElementById('category-filter-form').submit();
    });
</script>

<div id="modal" style="display: none;">
    <div id="modal-content" style="width: 500px;">
        <span id="fechar-modal">&times;</span>
        <div id="modal-body">
            <!-- O conteúdo será carregado dinamicamente -->
        </div>
    </div>
</div>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
