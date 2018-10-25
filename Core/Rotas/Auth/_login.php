<?php

$m_usuario = new Usuario();

$m_usuario->set_usuario($_POST['usuario']);
$m_usuario->set_senha($_POST['senha']);

//$response['captcha'];
$captcha = $_POST['g-recaptcha-response'];

if (!$captcha) {
    $response['result'] = false;
    $response['message'] = "Por favor, confirme o CAPTCHA.";
    echo json_encode($response);
    exit;
}
$resposta_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Len6HYUAAAAAEar0mmQJgA0mSkGpzQPU21Iu484&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

$usuario = $m_usuario->select_usuario_login();

if ($usuario && $resposta_captcha.success) {
    $response['result'] = true;
    $_SESSION['id'] = $usuario['id_usuario'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo_usuario'] = $usuario['fk_tipo_usuario'];

} else {
    $response['result'] = false;
    $response['message'] = "Login inválido";
}

echo json_encode($response);
