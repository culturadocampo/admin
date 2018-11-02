<?php

$m_usuario = new Usuario();

$m_usuario->set_usuario($_POST['usuario']);
$m_usuario->set_senha($_POST['senha']);

if($_SERVER['HTTP_HOST'] != 'localhost'){
    $captcha = $_POST['g-recaptcha-response'];
    if (!$captcha) {
        $response['result'] = false;
        $response['message'] = "Por favor, confirme o CAPTCHA.";
        echo json_encode($response);
        exit;
    }
    $resposta_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Len6HYUAAAAAEar0mmQJgA0mSkGpzQPU21Iu484&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $resposta_captcha = json_decode($resposta_captcha, true);
    $resultado_chave = $resposta_captcha['success'];
}else{
    $resultado_chave = TRUE;
}

$usuario = $m_usuario->select_usuario_login();

if ($usuario && $resultado_chave) {
    $response['result'] = true;
    $_SESSION['id'] = $usuario['id_usuario'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo_usuario'] = $usuario['fk_tipo_usuario'];

} else {
    $response['result'] = false;
    $response['message'] = "Login inválido";
}

echo json_encode($response);
