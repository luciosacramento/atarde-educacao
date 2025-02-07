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
        <?php the_post_thumbnail('topo-noticias', ['class' => 'img-fluid w-100']); ?>

        <!-- Texto da Notícia -->
         <div class="container-noticias">
             <?php echo get_the_content(); ?>
         </div>

        <?php
        endwhile;
        else :
        ?>
        
            <p>Desculpe, nenhum conteúdo foi encontrado.</p>
        <?php endif; ?>

            <div class="row mt-4" id="noticias-container">


                <?php
                        // Configuração da consulta para buscar os posts do tipo 'post'
                        $args = array(
                            'post_type'      => 'noticias_post',      // Tipo de conteúdo 'post' (padrão para notícias)
                            'posts_per_page' => 9,         // Quantidade de posts (notícias)
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

                                $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'full'); // URL da imagem em destaque (tamanho completo)
                                if (!$imagem_destaque) {
                                    $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                                }

                                ?>
                                    <div class="col-md-4 p-3">
                                    <div class="card">
                                        <a  href="<?php echo get_permalink(); ?>" >
                                            <img src="<?php echo $imagem_destaque;?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
                                        </a>
                                        <div class="card-body">
                                        <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                                        <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                                        <div class="row">
                                            <em class="col-6"><?php echo get_the_date('d/m/Y'); ?></em>
                                            <a class="col-6 text-end btn btn-link" href="<?php echo get_permalink(); ?>" >Leia mais</a>
                                        </div>
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
            <button id="mais-noticias" data-paged="1">Carregar mais</button>
            <script>
                var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            </script>
        
        </div>  

        <!-- Navegação e Voltar ao Topo -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' });" class="bt-padrao">Voltar ao Topo</button>
           
        </div>
      
    </div>
  </section>

    <!-- Modal para visualização de imagens -->
    <div id="image-modal" class="image-modal">
        <span class="close-modal">&times;</span>
        <img class="modal-content" id="modal-image">
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("image-modal");
        const modalImg = document.getElementById("modal-image");
        const closeModal = document.querySelector(".close-modal");

        // Adiciona evento de clique nas imagens da galeria
        document.querySelectorAll(".gallery-item a").forEach(image => {
            image.addEventListener("click", function (e) {
                e.preventDefault(); // Impede o comportamento padrão do link
                const src = this.getAttribute("href");
                modal.style.display = "block";
                modalImg.src = src;
            });
        });

        // Fecha o modal ao clicar no "X"
        closeModal.addEventListener("click", function () {
            modal.style.display = "none";
            modalImg.src = "";
        });

        // Fecha o modal ao clicar fora da imagem
        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.style.display = "none";
                modalImg.src = "";
            }
        });
    });
</script>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
