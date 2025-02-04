<?php
/**
 * Template Name: Página interna O programa
 *
 * Description: Template criado para exibir O programa
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
    <div class="container history-section">
    <h2 class="section-title bree-serif-regular">Nossa História</h2>
        <div class="row">
            <div class="col-md-6 text-justify">
                <?php echo get_the_content(); ?>
            </div>
            <?php
                $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'full'); // URL da imagem em destaque (tamanho completo)
            ?>
            <div class="col-md-6">
                <img src="<?php echo  $imagem_destaque; ?>" alt="História">
            </div>
        </div>
        <?php $galeria = get_post_meta(get_the_ID(), 'galeria_fotos', true); 
        if (!empty($galeria)) {
            echo '<div class="row mt-3 thumbnails">';
                foreach ($galeria as $imagem) { 
                    echo '<div class="col-md-3"><a  href="#" class="abrir-modal" data-url="' . esc_url($imagem). '" >';       
                    echo '<img src="' . esc_url(get_resized_image_url($imagem)) . '" alt="Thumb 1"/>';
                    echo "</a></div>";
                }
            echo '</div>';
            } ?>
    </div>

    <div class="team-section">
    <div class="container">
        <h2 class="text-center section-title bree-serif-regular branco linha-centralizada">Nossa Equipe</h2>
        <div class="row mt-4">
            <?php 
            // Configuração da consulta para buscar os posts do tipo 'equipe_post'
            $args = array(
                'post_type'      => 'equipe_post', // Tipo de conteúdo
                'posts_per_page' => -1,           // Quantidade de posts
                'post_status'    => 'publish',    // Apenas posts publicados
                'orderby'        => 'date',       // Ordenar por data
                'order'          => 'DESC',       // Ordem decrescente
            );

            // Executa a consulta
            $query = new WP_Query($args);

            // Verifica se existem posts
            if ($query->have_posts()) {
                echo '<div id="owl-carousel-equipe" class="owl-carousel owl-theme owl-nav-center">'; // Inicia o Owl Carousel

                while ($query->have_posts()) {
                    $query->the_post(); // Configura o post atual

                    $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'galeria-noticias'); // URL da imagem em destaque
                    if (!$imagem_destaque) {
                        $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                    }

                    $posts_array[] = [
                        'imagem' => $imagem_destaque,
                        'titulo' => get_the_title(),
                        'content' => get_the_content()
                    ];

                }

                $chunks = array_chunk($posts_array, 4);

                foreach ($chunks as $chunk) {


                    echo '<div class="item"><div class="container"><div class="row">';

                    foreach ($chunk as $index => $post) {
                        if ($index % 2 == 0) echo '<div class="col-md-6"><div class="row g-0">'; // Abre coluna


                        echo '<div class="col-md-4  mb-2">';
                        echo '<img src="' . esc_url($post['imagem']) . '" class="img-fluid rounded-start" alt="' . esc_attr($post['titulo']) . '">';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text bg-transparent">' . esc_attr($post['content']) . '</p>';
                        echo '</div>';
                        echo '</div>';


                       // echo '</div>';

                        if ($index % 2 == 1 || $index == count($chunk) - 1) echo '</div></div>'; // Fecha coluna

                    }

                    echo '</div></div></div>'; // Fecha item do Owl Carousel

                }
               
                echo '</div>'; // Fecha o Owl Carousel
            } else {
                echo '<p>Nenhum membro da equipe encontrado.</p>';
            }

            wp_reset_postdata(); // Reseta a query
            ?>
        </div>
    </div>
</div>

    <div class="container mission-section">
        <h2 class="section-title bree-serif-regular">Nossa Missão</h2>
        <div class="row">
            <div class="col-md-6">
                <?php 
                    echo get_post_meta(get_the_ID(), 'nossa_missao_texto', true);
                    $img_ID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                    $imgurldesktop = wp_get_attachment_image_url( $img_ID, '' );
                    
                ?>
            </div>
            <div class="col-md-6">
                <img src="<?php echo $imgurldesktop;?>" alt="Missão">
            </div>
        </div>
    </div>

    <div class="container mission-section">
        <h2 class="text-center section-title bree-serif-regular linha-centralizada mb-5">Parceitos</h2>
        <div class="parceiros-container">

        <?php
            // Configuração da WP_Query para buscar posts do tipo "parceiro_post"
            $args = array(
                'post_type'      => 'parceiro_post', // Tipo de post
                'posts_per_page' => -1,              // Retorna todos os posts
                'post_status'    => 'publish',       // Apenas posts publicados
            );

            // Executa a consulta
            $query = new WP_Query($args);

            // Verifica se existem posts
            if ($query->have_posts()) {
               // echo '<div class="parceiros-container">'; // Inicia o container

                while ($query->have_posts()) {
                    $query->the_post(); // Configura o post atual

                    // Recupera a imagem em destaque (thumbnail)
                    $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'full');

                    // Exibe a imagem, se existir
                    if ($imagem_destaque) {
                        echo '<div class="parceiro-item">';
                        echo '<img src="' . esc_url($imagem_destaque) . '" alt="' . esc_attr(get_the_title()) . '" />';
                        echo '</div>';
                    }
                }

               // echo '</div>'; // Fecha o container
            } else {
                // Mensagem caso não haja posts
                echo '<p>Nenhum parceiro encontrado.</p>';
            }

            // Reseta a query
            wp_reset_postdata();
            ?>  
            
        </div>
    </div>



      <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script> 
      

        <div id="modal" style="display: none;">
            <div id="modal-content">
                <span id="fechar-modal">&times;</span>
                <div id="modal-body">
                    <!-- O conteúdo será carregado dinamicamente -->
                </div>
            </div>
        </div>
      
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
