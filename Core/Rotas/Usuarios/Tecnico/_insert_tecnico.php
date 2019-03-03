<?php

//ARRAYS::pre_print($_POST);
$o_usuario = new Usuario();
$o_tecnico = new Tecnico();
$o_municipio = new Municipio();
$o_telefone = new Telefone();

$nova_senha = STRINGS::gen_password();
$senha_hash = SEGURANCA::password_hash($nova_senha);
$o_usuario->set_nome($_POST['nome_completo']);
$o_usuario->set_cpf($_POST['cpf']);
$o_usuario->set_usuario($_POST['usuario']);
$o_usuario->set_email($_POST['email']);
$o_usuario->set_senha($senha_hash);

$o_municipio->setCodigo($_POST['id_municipio']);
$o_tecnico->setRg($_POST['rg']);
$o_tecnico->setFormacao($_POST['formacao']);
$o_tecnico->setAreaAtuacao($_POST['area_atuacao']);
$o_tecnico->setEntidade($_POST['entidade']);
$o_tecnico->setEmail($_POST['email']);
$o_tecnico->setObservacao($_POST['observacao']);

$id_usuario = $o_usuario->insert_novo_usuario(5);
if ($id_usuario) {
    $id_tecnico = $o_tecnico->insertTecnico($id_usuario, $o_municipio->getCodigo());
    if ($id_tecnico) {

        foreach ($_POST['telefones'] as $value) {
            $o_telefone->setTelefone($value['telefone']);
            $o_telefone->setTipoTelefone($value['tipo_telefone']);
            $o_telefone->insert_telefone($id_usuario);
        }

        $body = EMAIL::body_cadastro_usuario($o_usuario->get_nome(), $o_usuario->get_usuario(), $nova_senha, 5);
        $envio_ok = EMAIL::send_mail($o_usuario->get_email(), CONFIG::$PROJECT_NAME . " - Credenciais de acesso", $body);
    } else {
        APP::return_response(false, "Ocorreu um erro: CT101");
    }
} else {
    APP::return_response(false, "Ocorreu um erro: CT100");
}

APP::return_response(true, "Sucesso! As credenciais foram enviadas para o e-mail informado.");




