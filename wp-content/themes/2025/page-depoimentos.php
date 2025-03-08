<?php
/**
 * Template Name: Página interna Depoimentos
 *
 * Description: Template criado para exibir Depoimentos
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
        

        
        <?php
        // Query para obter os depoimentos
        $args = array(
            'post_type'      => 'depoimentos_post',
            'posts_per_page' => 7, // Traz todos os depoimentos
            'post_status'    => 'publish',
        );
        $query = new WP_Query($args);

        // Variáveis para armazenar o primeiro depoimento
        $primeiro_titulo = '';
        $primeiro_cidade = '';
        $primeiro_escola = '';
        $primeiro_link_video = '';
        $primeiro_imagem = '';

        // Controle do primeiro post
        $is_first = true;

        // Loop pelos depoimentos
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Obtém os campos personalizados
                $titulo = get_the_title();
                $descricao_completa = get_the_content();
                $cidade = get_post_meta(get_the_ID(), '_cidade', true);
                $escola = get_post_meta(get_the_ID(), '_escola', true);
                $link_video = get_post_meta(get_the_ID(), '_link_video', true);
                $imagem_destacada = get_the_post_thumbnail_url(get_the_ID(), 'noticias-list'); // Obtém a imagem destacada

                if ($is_first) {
                    $primeiro_titulo = $titulo;
                    $primeiro_cidade = $cidade;
                    $primeiro_escola = $escola;
                    $primeiro_link_video = $link_video;
                    $primeiro_imagem = $imagem_destacada;

                    ?>
                    <!-- Depoimento Principal -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="depoimento-imagem">
                                <div class="bg-placeholder"><img src="<?php echo esc_url($primeiro_imagem); ?>" class="img-fluid w-100"></div>
                                <p class="depoimento-info"><?php echo $primeiro_escola; ?><br><?php echo $primeiro_cidade; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="depoimento-texto">
                                <span class="quote inicio"></span>
                                <p>
                                    <?php echo $descricao_completa; ?>
                                </p>
                                <span class="quote fim"></span>
                                <p class="depoente"><?php echo $primeiro_titulo; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Cards de Alunos/Professores -->
                    <div class="row mt-5" id="noticias-container">

                    <?php
                    
                    $is_first = false; // Define que o primeiro já foi processado
                    continue; // Pula para o próximo item no loop
                }

                ?>

                <div class="col-md-4">
                    <div class="card">
                        <?php if ($link_video) : ?>
                            <div class="card-img-top video-thumbnail">
                                <img class="w-100" src="<?php echo esc_url($imagem_destacada); ?>" class="img-fluid">
                                <?php if (!empty(trim($link_video))) {  ?>
                                <a href="#"  data-url="<?php  echo esc_url($link_video);  ?>" class="play-button abrir-modal">▶</a>
                                <?php }  ?>
                            </div>
                        <?php else : ?>
                            <img class="w-100" src="<?php echo esc_url($imagem_destacada); ?>" class="card-img-top">
                        <?php endif; ?>

                        <div class="card-body text-center">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo esc_html($cidade); ?><br><?php echo esc_html($escola); ?></p>
                        </div>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>Nenhum depoimento encontrado.</p>
        <?php endif; ?>
    </div>

        <!-- Botão Carregar Mais -->
        <button id="mais-noticias"data-paged="1" tipo="depoimentos_post" >Carregar mais</button>
        <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>

    </div>
  </section>

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