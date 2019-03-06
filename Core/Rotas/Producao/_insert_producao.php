<?php

$o_producao = new Producao();


try {
    $db = DB::get_instance();
    $db->beginTransaction();

    $o_producao->setQuantidade($_POST['quantidade']);
    $o_producao->setPeriodoInicio($_POST['periodo_inicial']);
    $o_producao->setPeriodoFim($_POST['periodo_final']);
    $o_producao->insert_producao($_SESSION['id_usuario'], $_POST['id_produto'], $_POST['id_unidade']);
    
    $db->commit();
    APP::return_response(true, "Produto cadastrado à sua produção");
} catch (Exception $exc) {
    $db->rollback();
    //gravar o erro no banco com o handling
}
