<?php

$o_usuario = new Usuario();
$o_cookie = new Cookie();

$senha = SEGURANCA::executar_criptografia($_POST['senha']);
$o_usuario->set_usuario($_POST['usuario']);
$o_usuario->set_senha($senha);

if ($_SERVER['HTTP_HOST'] != 'localhost' && isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
    $resposta_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Len6HYUAAAAAEar0mmQJgA0mSkGpzQPU21Iu484&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    $resposta_captcha = json_decode($resposta_captcha, true);
    $resultado_chave = $resposta_captcha['success'];
} else {
    $resultado_chave = true;
}

if ($resultado_chave) {
    $usuario = $o_usuario->select_usuario_login();
    if ($usuario) {
        APP::gen_session($usuario['id_usuario']);
        $o_cookie->delete_cookies_from_user($usuario['id_usuario']);
        if (isset($_POST['remember_me'])) {
            $token = APP::gen_token(24);
            $o_cookie->insert_cookie($token, $usuario['id_usuario']);
            setcookie("REMEMBER_ME", $token, time() + LOGIN_COOKIE_LIFETIME, "/");
        }
        APP::return_response(true, "Aguarde...");
    } else {
        APP::return_response(false, "Credenciais inválidas");
    }
} else {
    APP::return_response(false, "Por favor, confirme o CAPTCHA.");
}