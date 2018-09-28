<?php

function autoload($class) {
    if (is_readable(dirname(__FILE__) . "/Models/" . $class . ".php")) {
        include(dirname(__FILE__) . "/Models/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . './Library/' . $class . ".php")) {
        include(dirname(__FILE__) . './library/' . $class . ".php");
    }
}

session_start();
spl_autoload_register("autoload");
Application::start();