<!-- Footer Section -->
<div id="barra_azul"></div>
<footer class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>Entre em contato</h5>
          <p>Rua de Exemplo, 123, Bairro, Cidade - Brasil</p>
          <p>Email: exemplo@atardeeducacao.com</p>
          <p>Telefone: +55 85 9876 1234</p>
          <div class="mt-3">
            <a href="#" class=" me-3"><img src="<?php bloginfo('template_url'); ?>/img/icon_insta_footer.png" alt="Facebook"></a>
            <a href="#" class=" me-3"><img src="<?php bloginfo('template_url'); ?>/img/icon_face_footer.png" alt="Facebook"></a>
            <a href="#" class=""><img src="<?php bloginfo('template_url'); ?>/img/icon_youtube_footer.png" alt="Facebook"></a>
          </div>
        </div>
        <div class="col-md-3">
          <h5>Mapa do site</h5>
          <ul class="list-unstyled">
            <li><a href="#" >Home</a></li>
            <li><a href="#" >Cursos</a></li>
            <li><a href="#" >Áreas de Atuação</a></li>
            <li><a href="#" >Contato</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Título extra</h5>
          <ul class="list-unstyled">
            <li><a href="#" >Texto 1</a></li>
            <li><a href="#" >Texto 2</a></li>
            <li><a href="#" >Texto 3</a></li>
            <li><a href="#" >Texto 4</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Nossa localização</h5>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509456!2d144.95373531565685!3d-37.81627944202145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf57715fd3c8f9937!2sExample+Location!5e0!3m2!1sen!2sbr!4v1618393056845!5m2!1sen!2sbr" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          
        </div>
      </div>
      <div class="text-center">
        <p>&copy; 2025 A Tarde Educação. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/owlcarousel/owl.carousel.min.js"></script>

    <?php 
    wp_enqueue_script(
        'carregar-mais-noticias',
        get_template_directory_uri() . '/js/carregar-mais-noticias.js', // Verifique este caminho
        array('jquery'),
        null,
        true
    );

    // Passar a URL de admin-ajax.php para o JavaScript
    wp_localize_script('carregar-mais-noticias', 'ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
    
    ?>

    
    <script>
        $('#owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
        })

       $('#owl-carousel-equipe').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        items: 1 // Mantemos 1 item para garantir que cada slide exiba 4 membros (2x2)
   
        })

        document.addEventListener("DOMContentLoaded", function() {
          let pageUrl = encodeURIComponent(window.location.href);
          let pageTitle = encodeURIComponent(document.title);

          document.querySelector(".twitter").href = `https://twitter.com/intent/tweet?url=${pageUrl}&text=${pageTitle}`;
          document.querySelector(".facebook").href = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;
          document.querySelector(".pinterest").href = `https://pinterest.com/pin/create/button/?url=${pageUrl}&description=${pageTitle}`;
          document.querySelector(".linkedin").href = `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}`;
          document.querySelector(".buffer").href = `https://buffer.com/add?url=${pageUrl}&text=${pageTitle}`;
          document.querySelector(".whatsapp").href = `https://api.whatsapp.com/send?text=${pageTitle}%20${pageUrl}`;
          document.querySelector(".tumblr").href = `https://www.tumblr.com/share/link?url=${pageUrl}&name=${pageTitle}`;
          document.querySelector(".pocket").href = `https://getpocket.com/save?url=${pageUrl}&title=${pageTitle}`;
          document.querySelector(".telegram").href = `https://t.me/share/url?url=${pageUrl}&text=${pageTitle}`;
          document.querySelector(".hackernews").href = `https://news.ycombinator.com/submitlink?u=${pageUrl}&t=${pageTitle}`;
      });
    </script>

    <?php wp_footer(); ?>
    <?php wp_footer(); ?>

</body>

</html>