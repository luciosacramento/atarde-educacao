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
    <div class="container history-section">
    <h2 class="section-title">Nossa História</h2>
        <div class="row">
            <div class="col-md-6">
                <p>A Tarde Educação tem como objetivo capacitar todos os públicos das escolas ipsum lorem ipsum dolor...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x300" alt="História">
            </div>
        </div>
        <div class="row mt-3 thumbnails">
            <div class="col-md-3"><img src="https://via.placeholder.com/150" alt="Thumb 1"></div>
            <div class="col-md-3"><img src="https://via.placeholder.com/150" alt="Thumb 2"></div>
            <div class="col-md-3"><img src="https://via.placeholder.com/150" alt="Thumb 3"></div>
            <div class="col-md-3"><img src="https://via.placeholder.com/150" alt="Thumb 4"></div>
        </div>
    </div>

    <div class="team-section">
        <div class="container">
            <h2 class="text-center section-title">Nossa Equipe</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="team-box">A Tarde Educação tem como objetivo capacitar todos os públicos.</div>
                </div>
                <div class="col-md-6">
                    <div class="team-box">A Tarde Educação tem como objetivo capacitar todos os públicos.</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="team-box">A Tarde Educação tem como objetivo capacitar todos os públicos.</div>
                </div>
                <div class="col-md-6">
                    <div class="team-box">A Tarde Educação tem como objetivo capacitar todos os públicos.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mission-section">
        <h2 class="section-title">Nossa Missão</h2>
        <div class="row">
            <div class="col-md-6">
                <p>A Tarde Educação tem como objetivo capacitar todos os públicos das escolas ipsum lorem ipsum dolor...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x300" alt="Missão">
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
      
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
