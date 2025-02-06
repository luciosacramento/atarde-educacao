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
 <div class="container my-5">
        <!-- Depoimento Principal -->
        <div class="row">
            <div class="col-md-6">
                <div class="depoimento-imagem">
                    <div class="bg-placeholder"></div>
                    <p class="depoimento-info">Escola da pessoa do depoimento<br>Cidade da pessoa do depoimento</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="depoimento-texto">
                    <span class="quote">“</span>
                    <p>
                        Texto lorem ipsum com depoimento Texto lorem ipsum com depoimento.
                        Texto lorem ipsum com depoimento Texto lorem ipsum com depoimento.
                        Texto lorem ipsum com depoimento Texto lorem ipsum com depoimento.
                    </p>
                    <span class="quote">”</span>
                    <p class="depoente">Nome da pessoa do depoimento</p>
                </div>
            </div>
        </div>

        <!-- Cards de Alunos/Professores -->
        <div class="row mt-5" id="noticias-container">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top video-thumbnail">
                        <img src="aluno1.jpg" class="img-fluid">
                        <div class="play-button">▶</div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Nome do aluno, professor etc</h5>
                        <p class="card-text">Cidade da escola do depoimento<br>Nome da escola do depoimento</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="aluno2.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nome do aluno, professor etc</h5>
                        <p class="card-text">Cidade da escola do depoimento<br>Nome da escola do depoimento</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="aluno3.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nome do aluno, professor etc</h5>
                        <p class="card-text">Cidade da escola do depoimento<br>Nome da escola do depoimento</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-top video-thumbnail">
                        <img src="aluno1.jpg" class="img-fluid">
                        <div class="play-button">▶</div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Nome do aluno, professor etc</h5>
                        <p class="card-text">Cidade da escola do depoimento<br>Nome da escola do depoimento</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="aluno2.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nome do aluno, professor etc</h5>
                        <p class="card-text">Cidade da escola do depoimento<br>Nome da escola do depoimento</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="aluno3.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nome do aluno, professor etc</h5>
                        <p class="card-text">Cidade da escola do depoimento<br>Nome da escola do depoimento</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão Carregar Mais -->
        <button id="mais-noticias"data-paged="1" tipo="depoimentos_post" >Carregar mais</button>
        <script>
         var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>

    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>