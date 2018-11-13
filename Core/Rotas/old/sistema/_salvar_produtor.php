<?php

$o_produtor = new Produtor();
$o_endereco = new Endereco();

/**
 * Cadastro produtor
 */
$o_produtor->set_cpf($_POST['cpf']);
$o_produtor->set_rg($_POST['rg']);
$o_produtor->set_cad_pro($_POST['cad_pro']);
$o_produtor->set_data_nascimento($_POST['data_nascimento']);

$o_produtor->insert_produtor_usuario(SESSION::get_id_usuario());


/**
 * Cadastra endereço
 */
$o_endereco->set_estado($_POST['estado']);
$o_endereco->set_cidade($_POST['cidade']);
$o_endereco->set_bairro($_POST['bairro']);
$o_endereco->set_logradouro($_POST['logradouro']);
$o_endereco->set_numero($_POST['numero']);
$o_endereco->set_complemento($_POST['complemento']);
$o_endereco->set_lat($_POST['latitude']);
$o_endereco->set_long($_POST['longitude']);

$o_endereco->insert_endereco(SESSION::get_id_usuario());

APP::return_response(true, "Cadastrado com sucesso");