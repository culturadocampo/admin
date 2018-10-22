<?php

$o_rota = new Rota();
$o_rota->set_url($_POST['url']);
$o_rota->set_conteudo($_POST['conteudo']);
$o_rota->set_matriz($_POST['matriz']);
$o_rota->set_publico($_POST['publico']);

//$is_url_existente = $o_rota->select_rota();

if ($_POST['url']) {
//    if (!$is_url_existente) {
    if ($_POST['conteudo']) {

        if (isset($_POST['params'])) {
            $expressao = $o_rota->save_on_htaccess($_POST['params']);
        } else {
            $expressao = $o_rota->save_on_htaccess();
        }

        $o_rota->set_expressao($expressao);
        $o_rota->insert_rota();

        $response['result'] = true;
        $response['message'] = "Rota cadastrada com sucesso";
    } else {
        $response['result'] = false;
        $response['message'] = "Escolha um arquivo de conteúdo";
    }
//    } else {
//        $response['result'] = false;
//        $response['message'] = "Esta URL já existe";
//    }
} else {
    $response['result'] = false;
    $response['message'] = "Favor informar a URL base";
}


echo json_encode($response);
