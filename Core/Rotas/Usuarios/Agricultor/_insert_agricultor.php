<?php

//ARRAYS::pre_print($_POST);
$o_usuario = new Usuario();
$o_telefone = new Telefone();
$o_endereco = new Endereco();
$o_agricultor = new Agricultor();
$o_certificacao = new Certificacao();

try {
    $db = DB::get_instance();
    $db->beginTransaction();

    /**
     * Novo usuário
     */
    $nova_senha = STRINGS::gen_password();
    $senha_hash = SEGURANCA::password_hash($nova_senha);
    $o_usuario->set_nome($_POST['nome_completo']);
    $o_usuario->set_cpf($_POST['cpf']);
    $o_usuario->set_usuario($_POST['usuario']);
    $o_usuario->set_email($_POST['email']);
    $o_usuario->set_senha($senha_hash);
    $id_usuario = $o_usuario->insert_novo_usuario(6);

    /**
     * Telefones
     */
    if (isset($_POST['telefones']) && is_array($_POST['telefones'])) {
        foreach ($_POST['telefones'] as $value) {
            $o_telefone->setTelefone($value['telefone']);
            $o_telefone->setTipoTelefone($value['tipo_telefone']);
            $o_telefone->insert_telefone($id_usuario);
        }
    } else {
        APP::return_response(false, "Necessário informar ao menos 1 celular ou telefone");
    }


    /**
     * Localização
     */
    $id_estado = $o_endereco->get_id_from_uf($_POST['estado']);
    $o_endereco->set_estado($id_estado);
    $o_endereco->set_municipio($_POST['id_municipio']);
    $o_endereco->set_lat($_POST['lat']);
    $o_endereco->set_lng($_POST['lng']);
    $o_endereco->set_bairro($_POST['comunidade']);
    $o_endereco->insertEndereco($id_usuario);

    /**
     * Agricultor
     */
    if (isset($_POST['id_usuario_tecnico'])) {
        $id_usuario_tecnico = $_POST['id_usuario_tecnico'];
    } else {
        if (SESSION::get_id_tipo_usuario() == 5) {
            $id_usuario_tecnico = $_SESSION['id_usuario'];
        } else {
            APP::return_response(false, "Ocorreu um erro: Técnico inválido");
        }
    }
    $o_agricultor->setRg($_POST['rg']);
    $o_agricultor->setCaepf($_POST['caepf']);
    $o_agricultor->setIntegrantesUpf($_POST['integrantes_upf']);
    $o_certificacao->setIdCertificacao($_POST['id_certificacao']);
    $o_agricultor->insert_agricultor($id_usuario, $id_usuario_tecnico, $o_certificacao->getIdCertificacao());

    $db->commit();
    APP::return_response(true, "Agricultor cadastrado com sucesso");
} catch (Exception $exc) {
    $db->rollback();
    //gravar o erro no banco com o handling
}
