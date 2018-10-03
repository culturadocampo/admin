<?php

//ajax
//logica login
print_r($_POST);
$m_usuario = new Usuario();

$m_usuario->set_usuario($_POST['usuario']);
$m_usuario->set_senha($_POST['senha']);

$usuario = $m_usuario->select_usuario_login();

if ($usuario) {
    $response['result'] = true;
} else {
    $response['result'] = false;
    $response['message'] = "Login invalido";
}

echo json_encode($response);