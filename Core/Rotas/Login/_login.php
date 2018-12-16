<?php

$m_usuario = new Usuario();

$senha = SEGURANCA::executar_criptografia($_POST['senha']);
$m_usuario->set_usuario($_POST['usuario']);
$m_usuario->set_senha($senha);

if ($_SERVER['HTTP_HOST'] != 'localhost' && isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
    $resposta_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Len6HYUAAAAAEar0mmQJgA0mSkGpzQPU21Iu484&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    $resposta_captcha = json_decode($resposta_captcha, true);
    $resultado_chave = $resposta_captcha['success'];
} else {
    $resultado_chave = true;
}


if ($resultado_chave) {
    $usuario = $m_usuario->select_usuario_login();
    if ($usuario) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
        $_SESSION['id_tipo_usuario'] = $usuario['id_tipo_usuario'];
        $_SESSION['email_usuario'] = $usuario['email'];

        APP::return_response(true, "Aguarde...");
    } else {
        APP::return_response(false, "Credenciais inválidas");
    }
} else {
    APP::return_response(false, "Por favor, confirme o CAPTCHA.");
}