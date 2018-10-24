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
