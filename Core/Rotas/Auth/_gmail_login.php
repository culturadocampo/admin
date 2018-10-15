<?php
//echo "<pre>";
//print_r($_POST);
//die();
$o_usuario = new Usuario();

$nome = "{$_POST['name']['givenName']} {$_POST['name']['familyName']}";
$email = $_POST['emails'][0]['value'];
$usuario = $_POST['id'];

$o_usuario->set_nome($nome);
$o_usuario->set_email($email);
$o_usuario->set_usuario($usuario);

$is_novo = $o_usuario->is_new_usuario($usuario);

if (!$is_novo) {
    $o_usuario->insert_novo_usuario_google();
}

$_SESSION['id'] = $usuario;
$_SESSION['nome'] = $nome;


