<?php

$m_usuario = new Usuario();

$m_usuario->set_usuario($_POST['usuario']);
$m_usuario->set_senha($_POST['senha']);

$usuario = $m_usuario->select_usuario_login();

if ($usuario) {
    $response['result'] = true;
    $_SESSION['id'] = $usuario['id_usuario'];
    $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo_usuario'] = $usuario['fk_tipo_usuario'];

} else {
    $response['result'] = false;
    $response['message'] = "Login inválido";
}

echo json_encode($response);
