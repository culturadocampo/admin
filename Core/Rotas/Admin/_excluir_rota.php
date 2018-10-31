<?php

$o_rota = new Rota();

if (isset($_POST['id_rota']) && $_POST['id_rota']) {
    /**
     * Exclui a rota
     */
//    $o_rota->setId($_POST['id_rota']);
//    $o_rota->delete_rota();
    /**
     * Reconstroi o htaccess
     */
    $o_rota->rebuild_htaccess();

    $response['result'] = true;
    $response['message'] = "Rota excluída com sucesso";
} else {
    $response['result'] = false;
    $response['message'] = "Argumentos inválidos";
}

Strings::utf8_encode_deep($response);
echo json_encode($response);
