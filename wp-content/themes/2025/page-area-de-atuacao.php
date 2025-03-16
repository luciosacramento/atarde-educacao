<?php
/**
 * Template Name: Página interna Notícias
 *
 * Description: Template criado para exibir Notícias
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
        // Configuração da consulta para buscar os posts do tipo 'post'
        $args = array(
            'post_type' => 'area-atuacao-post', // Tipo de post
            'posts_per_page' => -1, // Retorna todos os posts
            'order' => 'ASC', // Ordem crescente
        );

        // Executa a consulta
        $query = new WP_Query($args);

        // Verifica se existem posts
        if ($query->have_posts()) {
            $noticias = array();

            while ($query->have_posts()) {
                $query->the_post(); // Configura o post atual

                $imagem_destaque = get_post_meta(get_the_ID(), '_imagem_personalizada', true);
                if (!$imagem_destaque) {
                    ?>

                    <?php
                }else{

                    $cor = get_post_meta(get_the_ID(), '_cor_area_atuacao', true);

                ?>
                    <div class="col-md-4 p-3">
                    <div class="card">
                        <a  href="<?php echo get_permalink(); ?>" >
                            <img src="<?php echo $imagem_destaque;?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title" style="background: transparent;" ><?php echo get_the_title(); ?></h5>
                            <p class="card-text" style="background:<?php echo $cor; ?>; color:<?php echo $cor; ?>"><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>
                    </div>

                <?php
                }

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
            return 'Sem Projetos no momento'; // Nenhuma notícia encontrada
        }
?>

</div>
      <!--button id="mais-noticias" data-paged="1">Mais Notícias</button-->
      <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>
      
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>