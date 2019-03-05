<?php

$o_usuario = new Usuario();

try {
    $db = DB::get_instance();
    $db->beginTransaction();

    $nova_senha = STRINGS::gen_password();
    $senha_hash = SEGURANCA::password_hash($nova_senha);

    $o_usuario->set_nome($_POST['nome_completo']);
    $o_usuario->set_cpf($_POST['cpf']);
    $o_usuario->set_usuario($_POST['usuario']);
    $o_usuario->set_email($_POST['email']);
    $o_usuario->set_senha($senha_hash);
    $o_usuario->insert_novo_usuario(2);
    $db->commit();


    $body = EMAIL::body_cadastro_usuario($o_usuario->get_nome(), $o_usuario->get_usuario(), $nova_senha, 2);
    EMAIL::send_mail($o_usuario->get_email(), CONFIG::$PROJECT_NAME . " - Credenciais de acesso", $body);

    APP::return_response(true, "Sucesso. Credenciais enviadas para o e-mail informado.");
} catch (Exception $exc) {
    $db->rollback();
    //gravar o erro no banco com o handling
}