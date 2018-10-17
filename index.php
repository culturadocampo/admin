<?php

function autoload($class) {
    if (is_readable(dirname(__FILE__) . "/Core/Models/" . $class . ".php")) {
        include(dirname(__FILE__) . "/Core/Models/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . './Library/' . $class . ".php")) {
        include(dirname(__FILE__) . './Library/' . $class . ".php");
    }
}

spl_autoload_register("autoload");
session_start();
Application::start();



//$data = file_get_contents("produtos.xml");
//$xml_obj = simplexml_load_string($data);
//$o_produto = new Produto();
//$produtos = $xml_obj->produto;
//foreach ($produtos as $produto) {
//    $ncm_codigo = str_replace(".", "", $produto->codigo);
//    $ncm_descricao = $produto->descricao;
//    $o_produto->set_ncm_codigo($ncm_codigo);
//    $o_produto->set_ncm_descricao($ncm_descricao);
//    if (strpos($ncm_descricao, 'ORGANICO') !== false) {
//        $o_produto->set_is_organico(1);
//    } else {
//        $o_produto->set_is_organico(0);
//    }
//    if (strpos($ncm_descricao, 'HIDROPONICO') !== false) {
//        $o_produto->set_is_hidroponico(1);
//    } else {
//        $o_produto->set_is_hidroponico(0);
//    }
//    $o_produto->insert_produto_xml();
//}