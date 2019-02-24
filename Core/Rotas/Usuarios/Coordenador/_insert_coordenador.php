<?php

$o_usuario = new Usuario();

$nova_senha = STRINGS::gen_password();
$senha_hash = SEGURANCA::password_hash($nova_senha);

$o_usuario->set_nome($_POST['nome_completo']);
$o_usuario->set_cpf($_POST['cpf']);
$o_usuario->set_usuario($_POST['usuario']);
$o_usuario->set_email($_POST['email']);
$o_usuario->set_senha($senha_hash);

$body = EMAIL::body_cadastro_usuario($o_usuario->get_nome(), $o_usuario->get_usuario(), $nova_senha, 2);
$envio_ok = EMAIL::send_mail($o_usuario->get_email(), CONFIG::$PROJECT_NAME . " - Credenciais de acesso", $body);

if ($envio_ok) {
    $o_usuario->insert_novo_usuario(2);
    APP::return_response(true, "Sucesso. Credenciais enviadas para o e-mail informado.");
} else {
    APP::return_response(false, "A mensagem não pôde ser enviada ao e-mail informado. Tente novamente mais tarde.");
}
