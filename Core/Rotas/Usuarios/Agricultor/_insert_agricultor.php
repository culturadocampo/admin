<?php

$o_usuario = new Usuario();
$o_telefone = new Telefone();
$o_filiado = new Filiado();
$o_agricultor = new Agricultor();
//ARRAYS::pre_print($_POST);
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
     * Agricultor
     */
    $o_agricultor->setCaepf($_POST['caepf']);
    $o_agricultor->setRg($_POST['rg']);
    $o_agricultor->insert_agricultor($id_usuario);

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
     * Vínculo filiado > usuário
     */
    if (isset($_POST['id_filiado'])) {
        $id_filiado = $_POST['id_filiado'];
    } else {
        if (SESSION::get_id_tipo_usuario() == 3) {
            $id_filiado = $_SESSION['id_filiado'];
        } else {
            APP::return_response(false, "Ocorreu um erro: Filiado inválido");
        }
    }
 
    if ($id_filiado) {
        $o_filiado->insert_vinculo_usuario_filiado($id_usuario, $id_filiado);
    }
    $db->commit();
    APP::return_response(true, "Agricultor cadastrado com sucesso");
} catch (Exception $exc) {
    $db->rollback();
}
