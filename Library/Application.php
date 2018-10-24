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
        $request = explode("/", $_SERVER['REDIRECT_URL']);
        if ($host == "localhost") {
            $request = $request[2] ? $request[2] : self::rota_default();
        } else {
            $request = $request[0] ? $request[0] : self::rota_default();
        }
        return $request;
    }

    /**
     * Verifica se a sessão do usuário é válida
     * ou a rota requisitada não é privada.
     * Caso false, redireciona para o login
     */
    static function is_logged() {
        if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
            if ($_SESSION['id'] > 0 && !empty($_SESSION['nome'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function rota_default() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == "1") {
                return 'dashboard';
            } else {
                return 'pagina-inicial';
            }
        } else {
            return 'pagina-inicial';
        }
    }

    static function get_url_base() {
        $host = $_SERVER['HTTP_HOST'];
        if ($host == "localhost") {
            $folder = explode('/', $_SERVER['REQUEST_URI'])[1];
            $base_url = "$host/$folder";
            return $base_url;
        } else {
            return $host;
        }
    }

}
