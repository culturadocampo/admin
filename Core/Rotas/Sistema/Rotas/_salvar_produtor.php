<?php
    
$o_produtor = new Produtor();
$o_telefone = new Telefone();
$o_endereco = new Endereco();

/**
 * Cadastro produtor
 */
$o_produtor->set_rg($_POST['rg']);
$o_produtor->set_data_nascimento($_POST['data_nascimento']);
$o_produtor->set_sexo($_POST['sexo']);
$o_produtor->set_cad_pro($_POST['cad_pro']);

/**
 * Cadastra telefones
 */
$o_telefone->set_celPrincipal($_POST['cel_principal']);
$o_telefone->set_celSecundario($_POST['cel_secundario']);
$o_telefone->set_TelFixo($_POST['tel_fixo']);

/**
 * Cadastra endereço
 */
$o_endereco->set_estado($_POST['estado']);
$o_endereco->set_cidade($_POST['cidade']);
$o_endereco->set_cep($_POST['cep']);
$o_endereco->set_bairro($_POST['bairro']);
$o_endereco->set_logradouro($_POST['logradouro']);
$o_endereco->set_numero($_POST['numero']);
$o_endereco->set_complemento($_POST['complemento']);

// Depois de validar todos os campos acima basta inserir no banco. 
$o_produtor->insert_produtor_usuario(SESSION::get_id_usuario());
$o_telefone->insert_telefone(SESSION::get_id_usuario());
$o_endereco->insert_endereco(SESSION::get_id_usuario());

APP::return_response(true, "Cadastrado com sucesso");