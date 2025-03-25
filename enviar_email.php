<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Definir os cabeçalhos do e-mail
    $to = "miltonwayne3@gmail.com"; // Substitua com o e-mail de destino
    $subject = "Mensagem de Contato - " . $nome;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Corpo do e-mail em HTML
    $body = "
    <html>
    <head>
        <title>" . $subject . "</title>
    </head>
    <body>
        <h2>Mensagem de " . $nome . "</h2>
        <p><strong>E-mail:</strong> " . $email . "</p>
        <p><strong>Mensagem:</strong></p>
        <p>" . nl2br($mensagem) . "</p>
    </body>
    </html>
    ";

    // Enviar o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Falha ao enviar e-mail.";
    }
}
?>
