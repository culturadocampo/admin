<?php

$o_usuario = new Usuario();

$nome = "{$_POST['name']['givenName']} {$_POST['name']['familyName']}";
$email = $_POST['emails'][0]['value'];
$id_gmail = $_POST['id'];

$usuario = $o_usuario->select_usuario($id_gmail);
$o_usuario->set_nome($nome);
$o_usuario->set_email($email);
$o_usuario->set_usuario($id_gmail); // id_gmail é gravado como usuário

if (!$usuario) {
    $_SESSION['id'] = $o_usuario->get_usuario();
    $_SESSION['nome'] = $o_usuario->get_nome();
    $_SESSION['fk_tipo_usuario'] = 2;
    $o_usuario->insert_novo_usuario_google();
} else {
    $_SESSION['id'] = $usuario['id_usuario'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo_usuario'] = $usuario['fk_tipo_usuario'];
}