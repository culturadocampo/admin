<?php

function autoload($class) {
    if (is_readable(dirname(__FILE__) . "/Core/Models/" . $class . ".php")) {
        include(dirname(__FILE__) . "/Core/Models/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . './Library/' . $class . ".php")) {
        include(dirname(__FILE__) . './Library/' . $class . ".php");
    }
}

/**
 * A URL de acesso ao localhost deve ser:
 * 
 * localhost/pro_campo/
 * 
 * Caso contrário, as rotas podem não funcionar.
 * No servidor isso não é problema.
 */


spl_autoload_register("autoload");
session_start();
Application::start();