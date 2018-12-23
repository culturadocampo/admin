<?php

ob_start();
date_default_timezone_set("America/Sao_Paulo");

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/*
 * CONSTANTES ÚTEIS
 */
DEFINE('LOGIN_COOKIE_LIFETIME', 86400);

function autoload($class) {
    if (is_readable(dirname(__FILE__) . "/Core/Models/" . $class . ".php")) {
        include(dirname(__FILE__) . "/Core/Models/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/Library/' . $class . ".php")) {
        include(dirname(__FILE__) . '/Library/' . $class . ".php");
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

APP::start();
