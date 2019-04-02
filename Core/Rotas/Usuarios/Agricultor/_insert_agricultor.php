<?php

$o_usuario = new Usuario();
$o_telefone = new Telefone();
$o_filiado = new Filiado();
$o_agricultor = new Agricultor();
$o_endereco = new Endereco();
$o_propriedade = new PropriedadeRural();
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
    $id_usuario_agricultor = $o_usuario->insert_novo_usuario(6);


    /**
     * Agricultor
     */
    $o_agricultor->setCaepf($_POST['caepf']);
    $o_agricultor->setRg($_POST['rg']);
    $o_agricultor->setIntegrantesUpf($_POST['integrantes_upf']);
    $id_agricultor = $o_agricultor->insert_agricultor($id_usuario_agricultor);

    /**
     * Telefones
     */
    if (isset($_POST['telefones']) && is_array($_POST['telefones'])) {
        foreach ($_POST['telefones'] as $value) {
            $o_telefone->setTelefone($value['telefone']);
            $o_telefone->setTipoTelefone($value['tipo_telefone']);
            $o_telefone->insert_telefone($id_usuario_agricultor);
        }
    } else {
        APP::return_response(false, "Necessário informar ao menos 1 celular ou telefone");
    }


    /**
     * Vínculo agricultor > filiado
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
        $o_agricultor->insert_vinculo_agricultor_filiado($id_agricultor, $id_filiado);
    }


    /**
     * Localização/Endereço
     */
    $id_estado = $o_endereco->get_id_from_uf($_POST['estado']);
    $id_municipio = $o_endereco->get_id_from_nome_municipio($_POST['municipio']);
    if (!$id_estado) {
        APP::return_response(false, "Estado selecionado é inválido");
    }
    if (!$id_municipio) {
        APP::return_response(false, "Município selecionado é inválido");
    }
    $o_endereco->set_estado($id_estado);
    $o_endereco->set_municipio($id_municipio);
    $o_endereco->set_lat($_POST['lat']);
    $o_endereco->set_lng($_POST['lng']);
    $o_endereco->set_complemento($_POST['complemento']);
    $o_endereco->set_bairro($_POST['bairro']);
    $o_endereco->set_cep($_POST['cep'], false);
    $o_endereco->set_logradouro($_POST['logradouro'], false);
    $o_endereco->set_numero($_POST['numero'], false);
    $o_endereco->set_comunidade($_POST['comunidade']);
    $id_endereco = $o_endereco->insertEndereco();


    $o_certificacao->setIdCertificacao($_POST['id_certificacao']);
    $id_propriedade = $o_propriedade->insert_propriedade_rural($id_endereco, $o_certificacao->getIdCertificacao(), $id_usuario_agricultor);

    $db->commit();
    APP::return_response(true, "Agricultor cadastrado com sucesso");
} catch (Exception $exc) {
    $db->rollback();
}
