<?php

$o_usuario = new Usuario();

$nome = "{$_POST['name']['givenName']} {$_POST['name']['familyName']}";
$email = $_POST['emails'][0]['value'];
$id_gmail = $_POST['id'];

$usuario = $o_usuario->select_usuario($id_gmail);
$o_usuario->set_nome($nome);
$o_usuario->set_email($email);
$o_usuario->set_usuario($id_gmail);

if (!$usuario) {
    $_SESSION['id_usuario'] = $o_usuario->get_usuario();
    $_SESSION['nome_usuario'] = $o_usuario->get_nome();
    $_SESSION['id_tipo_usuario'] = 1;
    $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

    $_SESSION['email_usuario'] = $o_usuario->get_email();
    $o_usuario->insert_novo_usuario_google();
} else {
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['nome_usuario'] = $usuario['nome'];
    $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
    $_SESSION['id_tipo_usuario'] = $usuario['id_tipo_usuario'];
    $_SESSION['email_usuario'] = $usuario['email'];
}