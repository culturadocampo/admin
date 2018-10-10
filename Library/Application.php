<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application
 *
 * @author Notheros
 */
class Application {

    static function start() {
        $o_roteador = new Roteador();
        $request = self::get_request();
        $o_roteador->include_file($request);
    }

    private static function get_request() {
        $host = $_SERVER['HTTP_HOST'];
        $request = $_SERVER['REDIRECT_URL'];
        if ($host == "localhost") {
            $request = explode("/", $request);
            return $request[2];
        } else {
            return $request[0];
        }
    }

}
