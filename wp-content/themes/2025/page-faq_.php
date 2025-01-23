<?php
/**
 * Template Name: Página interna FAQ
 *
 * Description: Template criado para exibir FAQ
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
        <!-- Search Input -->
        <div class="mb-4 text-center">
        <input type="text" id="searchInput" class="form-control" placeholder="Faça a busca da sua dúvida ou pergunta aqui">
        </div>


        <!-- Alphabet Filter -->
        <div class="alphabet-filter  d-flex flex-wrap mb-4">
        <?php
            $alphabet = range('A', 'Z');
            foreach ($alphabet as $letter) {
                echo "<button class='btn btn-outline-primary' data-filter='{$letter}'>{$letter}</button>";
            }
        ?>
        </div>

        <!-- FAQ Items -->
        <div id="faqContainer">

            <?php
                    // Configuração da consulta para buscar os posts do tipo 'post'
                    $args = array(
                        'post_type'      => 'FAQ',      // Tipo de conteúdo 'post' (padrão para notícias)
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

                            $imagem_destaque = get_the_post_thumbnail_url(get_the_ID(), 'full'); // URL da imagem em destaque (tamanho completo)
                            if (!$imagem_destaque) {
                                $imagem_destaque = 'https://placehold.co/600x400/png'; // URL padrão (imagem de placeholder)
                            }

                            $title =get_the_title();

                            ?>
                                <div class="faq-item" data-category="<?php echo strtoupper($title[0]) ?>">
                                    <h5 class="faq-question"><?PHP echo $title; ?></h5>
                                    <p class="faq-answer"><?php echo get_post_meta(get_the_ID(), '_resposta', true) ?></p>
                                </div>

                            <?php


                        }

                        // Reseta os dados da consulta
                        wp_reset_postdata();

                    } else {
                        return 'Sem FAQs no momento'; // Nenhuma notícia encontrada
                        }
                ?>

        <!-- Add more FAQ items here -->
        </div>

        <!-- View All Button -->
        <div class="text-center mt-4">
        <button id="viewAllButton" class="btn btn-primary">Veja Todas</button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const faqContainer = document.getElementById('faqContainer');
            const alphabetButtons = document.querySelectorAll('.alphabet-filter button');
            const viewAllButton = document.getElementById('viewAllButton');

            // Filter FAQ by search input
            searchInput.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase();
                const faqs = faqContainer.querySelectorAll('.faq-item');

                faqs.forEach(faq => {
                const question = faq.querySelector('.faq-question').textContent.toLowerCase();
                if (question.includes(query)) {
                    faq.style.display = '';
                } else {
                    faq.style.display = 'none';
                }
                });
            });

            // Filter FAQ by alphabet
            alphabetButtons.forEach(button => {
                button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');
                const faqs = faqContainer.querySelectorAll('.faq-item');

                faqs.forEach(faq => {
                    if (faq.getAttribute('data-category') === filter) {
                    faq.style.display = '';
                    } else {
                    faq.style.display = 'none';
                    }
                });
                });
            });

            // View all FAQs
            viewAllButton.addEventListener('click', () => {
                const faqs = faqContainer.querySelectorAll('.faq-item');
                faqs.forEach(faq => {
                faq.style.display = '';
                });
            });

            // Toggle answer visibility
            faqContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('faq-question')) {
                const answer = e.target.nextElementSibling;
                if (answer.style.display === 'none' || !answer.style.display) {
                    answer.style.display = 'block';
                } else {
                    answer.style.display = 'none';
                }
                }
            });
            });
        </script>
            
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
