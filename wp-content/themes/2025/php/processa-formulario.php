<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
} else {
    echo "Método de requisição inválido.";
}
?>
