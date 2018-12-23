<?php

include_once './settings.php';

ob_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set(TIMEZONE);

spl_autoload_register("autoload");
session_start();
APP::start();

function autoload($class) {
    if (is_readable(dirname(__FILE__) . "/Core/Models/" . $class . ".php")) {
        include(dirname(__FILE__) . "/Core/Models/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/Library/' . $class . ".php")) {
        include(dirname(__FILE__) . '/Library/' . $class . ".php");
    }
}
