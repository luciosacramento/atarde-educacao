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
    <h2 class="section-title">Nossa História</h2>
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
            <h2 class="text-center section-title">Nossa Equipe</h2>
            <div class="row mt-4">

                <?php 
                // Configuração da consulta para buscar os posts do tipo 'post'
                $args = array(
                    'post_type'      => 'equipe_post',      // Tipo de conteúdo 'post' (padrão para notícias)
                    'posts_per_page' => -1,         // Quantidade de posts (notícias)
                    'post_status'    => 'publish',  // Apenas posts publicados
                    'orderby'        => 'date',     // Ordenar por data
                    'order'          => 'DESC',     // Ordem decrescente (mais recentes primeiro)
                );

                // Executa a consulta
                $query = new WP_Query($args);

                // Verifica se existem posts
                if ($query->have_posts()) {
                    $noticias = array();

                    while ($query->have_posts()) {
                        $query->the_post(); // Configura o post atual

                        $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'galeria-noticias'); // URL da imagem em destaque (tamanho completo)
                        if (!$imagem_destaque) {
                            $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                        }

                ?>

                <div class="col-md-6 mb-2">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $imagem_destaque;?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text bg-transparent"> <?php echo get_the_content(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }}
                wp_reset_query();
                
                ?>

            </div>

        </div>
    </div>

    <div class="container mission-section">
        <h2 class="section-title">Nossa Missão</h2>
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

    <div class="partners-section">
        <h3>Parceiros</h3>
        <div class="row justify-content-center">
            <div class="col-md-2"><img src="https://via.placeholder.com/120x50" alt="Parceiro 1"></div>
            <div class="col-md-2"><img src="https://via.placeholder.com/120x50" alt="Parceiro 2"></div>
            <div class="col-md-2"><img src="https://via.placeholder.com/120x50" alt="Parceiro 3"></div>
            <div class="col-md-2"><img src="https://via.placeholder.com/120x50" alt="Parceiro 4"></div>
            <div class="col-md-2"><img src="https://via.placeholder.com/120x50" alt="Parceiro 5"></div>
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
