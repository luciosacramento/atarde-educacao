<?php
 get_header();

 wp_reset_query();

 ?>

 <!-- Conteúdo -->
 <section  id="conteudo-noticia">
    <div class="container">
      
       <!-- Voltar 
       <a href="<?php echo esc_url(wp_get_referer()); ?>" class="btn btn-link">&lt; Voltar</a>
-->
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post(); // Carrega os dados da postagem atual
        ?>

        <!-- Compartilhar -->
        <?php echo do_shortcode( '[social_share]' ); ?>

        <!-- Título e Data -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="fw-bold"><?php the_title(); ?></h1>
            <span><?php echo get_the_date(); ?></span>
        </div>      

        <!-- Imagem Principal -->
        <?php the_post_thumbnail('topo-noticias', ['class' => 'img-fluid w-100']); ?>

        <!-- Texto da Notícia -->
         <div class="container-noticias">
             <?php the_content(); ?>
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
            <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' });" class="bt-padrao">Voltar ao Topo</button>
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
