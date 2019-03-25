<?php

//ARRAYS::pre_print($_POST);
$o_usuario = new Usuario();
$o_telefone = new Telefone();
$o_endereco = new Endereco();
$o_propriedade = new PropriedadeRural();
$o_certificacao = new Certificacao();
$o_trabalhador = new TrabalhadorRural();

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
     * Trabalhador rural
     */
    $o_trabalhador->setCaepf($_POST['caepf']);
    $o_trabalhador->setRg($_POST['rg']);
    $o_trabalhador->insert_trabalhador_rural($id_usuario);

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

    /**
     * Propriedade
     */
    if (isset($_POST['id_tecnico'])) {
        $id_tecnico = $_POST['id_tecnico'];
    } else {
        if (SESSION::get_id_tipo_usuario() == 5) {
            $id_tecnico = $_SESSION['id_tecnico'];
        } else {
            APP::return_response(false, "Ocorreu um erro: Técnico inválido");
        }
    }

    if (isset($_POST['id_filiado'])) {
        $id_filiado = $_POST['id_filiado'];
    } else {
        if (SESSION::get_id_tipo_usuario() == 3) {
            $id_filiado = $_SESSION['id_filiado'];
        } else {
            APP::return_response(false, "Ocorreu um erro: Filiado inválido");
        }
    }

    $o_propriedade->setIntegrantesUpf($_POST['integrantes_upf']);
    $o_certificacao->setIdCertificacao($_POST['id_certificacao']);
    $id_propriedade = $o_propriedade->insert_propriedade_rural($id_endereco, $o_certificacao->getIdCertificacao(), $id_usuario);

    if ($id_tecnico) {
        $o_propriedade->insert_vinculo_propriedade_tecnico($id_propriedade, $id_tecnico);
    }
    if ($id_filiado) {
        $o_propriedade->insert_vinculo_usuario_filiado($id_usuario, $id_filiado);
    }
    $db->commit();
    APP::return_response(true, "Agricultor cadastrado com sucesso");
} catch (Exception $exc) {
    $db->rollback();
    //gravar o erro no banco com o handling
}
