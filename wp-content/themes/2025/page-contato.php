<?php
/**
 * Template Name: Página interna Contato
 *
 * Description: Template criado para exibir Contato
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
 <div class="container contato-container">
        <div class="text-center">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["email"]) {
                $nome = sanitize_text_field($_POST["nome"]);
                $email = sanitize_email($_POST["email"]);
                $telefone = sanitize_text_field($_POST["telefone"]);
                $mensagem = sanitize_textarea_field($_POST["mensagem"]);
                $recaptcha_response = $_POST['g-recaptcha-response'];

                // Verifica reCAPTCHA
                $recaptcha_secret = "SUA_CHAVE_SECRETA_RECAPTCHA";
                $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
                $recaptcha_data = [
                    'secret' => $recaptcha_secret,
                    'response' => $recaptcha_response
                ];
                
                $options = [
                    'http' => [
                        'method'  => 'POST',
                        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                        'content' => http_build_query($recaptcha_data)
                    ]
                ];
                
                $context  = stream_context_create($options);
                $verify = file_get_contents($recaptcha_url, false, $context);
                $captcha_success = json_decode($verify);

                if ($captcha_success->success) {
                    $to = "seuemail@dominio.com"; // Altere para o email desejado
                    $subject = "Novo Contato: $nome";
                    $headers = "From: $email\r\n";
                    $message = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\n\nMensagem:\n$mensagem";

                    if (wp_mail($to, $subject, $message, $headers)) {
                        echo "Mensagem enviada com sucesso!";
                    } else {
                        echo "Erro ao enviar a mensagem.";
                    }
                } else {
                    echo "Erro na verificação do reCAPTCHA.";
                }
            } 
            ?>

            <p class="descricao">
                Gostaríamos de saber mais sobre as suas ideias, dúvidas e outros questionamentos. 
                Entre em contato com a gente e iremos responder em breve.
            </p>

            <form action="#" method="POST">
                

                <div class="row">
                    <div class="mb-3 col-12">
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="tel" class="form-control" name="telefone" placeholder="Telefone">
                    </div>
                    <div class="mb-3 col-12">
                        <textarea class="form-control" name="mensagem" rows="4" placeholder="Mensagem" required></textarea>
                    </div>
                </div>

                

                <div class="g-recaptcha mb-3" data-sitekey="SUA_CHAVE_SITE_RECAPTCHA"></div>

                <button type="submit" class="btn btn-primary">ENVIAR</button>
            </form>
        </div>
    </div>
  </section>
  

  <!-- Fim Conteúdo -->
<?php get_footer(); ?>
