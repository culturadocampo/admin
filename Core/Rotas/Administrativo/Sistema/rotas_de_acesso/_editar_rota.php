<?php

if (!$_POST['id_rota']) {
    APP::return_response(false, "Informe o ID da rota");
}

if (!$_POST['url']) {
    APP::return_response(false, "Informe o URI da rota");
}


$o_rota = new Rota();
$o_parametro = new Parametro();
$o_rota->set_id_rota($_POST['id_rota']);
$o_rota->set_url($_POST['url']);
$o_rota->set_publico($_POST['publico']);
$o_rota->set_matriz($_POST['matriz']);

$expressao = $o_rota->save_on_htaccess($_POST['params']);


$o_rota->set_expressao($expressao);

$o_rota->update_rota();


if ($_POST['params']) {
    $o_parametro->delete_parametros_rota($_POST['id_rota']);
    foreach ($_POST['params'] as $key => $value) {
        if ($value['categoria'] == "1") {
            $o_parametro->set_parametro($value['nome']);
            $o_parametro->set_tipo($value['expressao']);
            $o_parametro->set_indice($key + 1);
            $o_parametro->insert_parametro($_POST['id_rota']);
        }
    }
}



$o_rota->rebuild_htaccess();

APP::return_response(true, "Rota alterada com sucesso");

