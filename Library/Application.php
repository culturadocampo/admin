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
        $request = self::get_request();
        Roteador::include_file($request);
    }

    private static function get_request() {
        $host = $_SERVER['HTTP_HOST'];
        $request = $_SERVER['REDIRECT_URL'];
        $request = explode("/", $request);

        if ($host == "localhost") {
            $request = $request[2] ? $request[2] : 'inicio';
        } else {
            $request = $request[0] ? $request[0] : 'inicio';
        }
        return $request;
    }

}
