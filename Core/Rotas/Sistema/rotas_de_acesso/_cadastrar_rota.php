<?php

//ARRAYS::pre_print($_POST);
$o_rota = new Rota();
$o_parametro = new Parametro();
$o_permissao = new Permissao();
$o_rota->set_url($_POST['url']);
$o_rota->set_conteudo($_POST['conteudo']);
$o_rota->set_matriz($_POST['matriz']);
$o_rota->set_publico($_POST['publico']);


if ($_POST['url']) {
    if ($_POST['conteudo']) {

        if (isset($_POST['params']) && !empty($_POST['params'])) {
            $expressao = $o_rota->save_on_htaccess($_POST['params']);
        } else {
            $expressao = $o_rota->save_on_htaccess();
        }

        $o_rota->set_expressao($expressao);
        $id_rota = $o_rota->insert_rota();

        if (isset($_POST['params']) && !empty($_POST['params'])) {
            foreach ($_POST['params'] as $key => $value) {
                if ($value['categoria'] == "1") {
                    $o_parametro->set_parametro($value['nome']);
                    $o_parametro->set_tipo($value['expressao']);
                    $o_parametro->set_indice($key + 1);
                    $o_parametro->insert_parametro($id_rota);
                }
            }
        }

        if (isset($_POST['permissoes']) && !empty($_POST['permissoes'])) {
            foreach ($_POST['permissoes'] as $key => $id_permissao) {
                $o_permissao->insert_permissao_rota($id_permissao, $id_rota);
            }
        }


        $response['result'] = true;
        $response['message'] = "Rota cadastrada com sucesso";
    } else {
        $response['result'] = false;
        $response['message'] = "Escolha um arquivo de conteúdo";
    }
} else {
    $response['result'] = false;
    $response['message'] = "Favor informar a URL base";
}


echo json_encode($response);
