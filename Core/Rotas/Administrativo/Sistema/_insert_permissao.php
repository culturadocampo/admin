<?php

$o_permissao = new Permissao();

//ARRAYS::pre_print($_POST);

$o_permissao->set_descricao($_POST['descricao']);

$id_permissao = $o_permissao->insert_permissao();

if (isset($_POST['tipo_usuario']) && !empty($_POST['tipo_usuario'])) {
    if (count($_POST['tipo_usuario']) != 0) {
        foreach ($_POST['tipo_usuario'] as $tipo) {
            $o_permissao->insert_permissao_usuario($id_permissao, $tipo);
        }
    } else {
        APP::return_response(false, "Selecione, ao menos, um tipo de usuário");
    }
} else {
    APP::return_response(false, "Selecione, ao menos, um tipo de usuário");
}
APP::return_response(true, "Permissão cadastrada com sucesso");
