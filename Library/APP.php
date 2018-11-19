<?php

class APP {

    static function start() {
        $request = self::get_request();
        ROUTER::include_file($request);
    }

    private static function get_request() {
        if (isset($_SERVER['REDIRECT_URL'])) {
            $host = $_SERVER['HTTP_HOST'];
            $request = explode("/", $_SERVER['REDIRECT_URL']);
            if ($host == "localhost") {
                $request = $request[2] ? $request[2] : self::rota_default();
            } else {
                $request = $request[1] ? $request[1] : self::rota_default();
            }
        } else {
            $request = self::rota_default();
        }
        return $request;
    }

    /**
     * Verifica se a sessão do usuário é válida
     * ou a rota requisitada não é privada.
     * Caso false, redireciona para o login
     */
    static function is_logged() {
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['nome'])) {
            if ($_SESSION['id_usuario'] > 0 && !empty($_SESSION['nome'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function get_id_tipo_usuario() {
        if (isset($_SESSION['tipo_usuario'])) {
            return $_SESSION['tipo_usuario'];
        } else {
            return false;
        }
    }

    static function rota_default() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == "1") {
                return 'visao-geral';
            } else {
                return 'dashboard';
            }
        } else {
            return 'dashboard';
        }
    }

    static function return_response($result, $message) {
        $response['result'] = $result;
        $response['message'] = $message;
        ARRAYS::utf8_encode_deep($response);
        echo json_encode($response);
        exit;
    }

    static function get_base_url() {
        $host = $_SERVER['HTTP_HOST'];
        if ($host == "localhost") {
            return "http://localhost/pro_campo";
        } else {
            return "http://culturadocampo.com.br";
        }
    }

    static function get_origem_request() {
        if (array_key_exists('HTTP_REFERER', $_SERVER)) {
            $origem = $_SERVER['HTTP_REFERER'];
        } else {
            $origem = $_SERVER['REMOTE_ADDR'];
        }
        return $origem;
    }

}
