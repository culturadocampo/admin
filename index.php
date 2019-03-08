<?php
set_time_limit(90);
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
spl_autoload_register("autoload");
date_default_timezone_set(CONFIG::$TIMEZONE);

function autoload($class) {
    if (is_readable(dirname(__FILE__) . "/Core/Models/" . $class . ".php")) {
        include(dirname(__FILE__) . "/Core/Models/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/Library/' . $class . ".php")) {
        include(dirname(__FILE__) . '/Library/' . $class . ".php");
    }
}

session_start();
APP::start();