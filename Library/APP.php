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

    /*
     * Verifica se a sessão do usuário é válida
     * Caso false, redireciona para o login
     */

    static function is_logged() {
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['nome_usuario'])) {
            if ($_SESSION['id_usuario'] > 0 && !empty($_SESSION['nome_usuario'])) {
                $o_permissao = new Permissao();
                $_SESSION['permissoes'] = $o_permissao->select_permissoes_tipo_usuario($_SESSION['id_tipo_usuario']);
                return true;
            } else {
                return self::check_for_cookie();
            }
        } else {
            return self::check_for_cookie();
        }
    }

    static function gen_session($id_usuario) {
        $o_usuario = new Usuario();
        $usuario = $o_usuario->select_usuario_from_id($id_usuario);
        if (!empty($usuario)) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
            $_SESSION['id_tipo_usuario'] = $usuario['fk_tipo_usuario'];
            $_SESSION['email_usuario'] = $usuario['email'];
            return true;
        } else {
            return false;
        }
    }

    static function rota_default() {
        if (isset($_SESSION['tipo_usuario'])) {
            if ($_SESSION['tipo_usuario'] == "1") {
                return 'inicio';
            } else {
                return 'inicio';
            }
        } else {
            return 'inicio';
        }
    }

    static function return_response($result, $message) {
        $response['result'] = $result;
        $response['message'] = $message;
        echo json_encode($response);
        if ($result) {
            exit;
        } else {
            throw new Exception;
        }
    }

    static function get_base_url() {
        $host = $_SERVER['HTTP_HOST'];
        if ($host == "localhost") {
            return "http://localhost/admin";
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

    private static function check_for_cookie() {
        if (!isset($_COOKIE["REMEMBER_ME"])) {
            return false;
        } else {
            $o_cookie = new Cookie();
            $usuario = $o_cookie->get_usuario_from_cookie($_COOKIE["REMEMBER_ME"]);
            if (empty($usuario)) {
                $o_cookie->delete_cookie($_COOKIE["REMEMBER_ME"]);
                return false;
            } else {
                return APP::gen_session($usuario['id_usuario']);
            }
        }
    }

    static function gen_token($length) {
        $o_cookie = new Cookie();
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
        $is_new = $o_cookie->is_cookie_new($token);
        if ($is_new) {
            return $token;
        } else {
            self::gen_token($length);
        }
    }

    static function has_permissao($id_permissao) {
        if (in_array($id_permissao, SESSION::get_permissoes())) {
            return true;
        } else {
            return false;
        }
    }

    static function gravar_erro($arquivo, $tipo, $mensagem, $linha) {
        $db = DB::get_instance(true);

        $db->beginTransaction();
        $o_erro = new Erro();
        $o_erro->insert_erro($arquivo, $tipo, $mensagem, $linha);
        $db->commit();
    }

}
