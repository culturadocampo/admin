<?php

class ROUTER {

    public static function include_file($request) {
        $o_rota = new Rota();
        $o_rota->set_url($request);
        $array_rotas = $o_rota->select_rota();

        $rota = self::get_rota_apropriada($array_rotas);

        if (APP::is_logged() || $rota['publico']) {
            if (!$rota['publico'] || APP::is_logged()) {
                self::insert_acesso($rota['id_rota']);
            }
            $conteudo = "Core/Rotas/{$rota['conteudo']}";
            if ($rota['matriz']) {
                include "Public/Matriz/{$rota['matriz']}";
            } else {
                include $conteudo;
            }
        } else {
            $_SESSION['login_request'] = self::get_uri();
            $o_rota->set_url("login");
            $array_rotas = $o_rota->select_rota();
            $rota = self::get_rota_apropriada($array_rotas, $o_rota->get_url());
            $conteudo = "Core/Rotas/{$rota['conteudo']}";
            include "Public/Matriz/{$rota['matriz']}";
        }
    }

    static function include_rota($id_rota) {
        
    }

    static function tem_permissao($id_rota) {
        
    }

    /**
     * 
     * @param type $array_rotas
     * @param type $uri passado quando é necessário um redirecionamento 
     * diferente do digitado na navegador
     * @return type
     */
    private static function get_rota_apropriada($array_rotas, $uri = false) {
        $uri = $uri ? $uri : self::get_uri();
        foreach ($array_rotas as $rota) {
            if (preg_match("@{$rota['expressao']}@", $uri)) {
                return $rota;
            }
        }
    }

    private static function get_uri() {
        $uri = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
        $host = $_SERVER['HTTP_HOST'];
        if ($host == "localhost") {
            unset($uri[0]);
        }
        $uri = implode("/", $uri);
        return $uri ? $uri : APP::rota_default();
    }

    private static function insert_acesso($id_rota) {
        $o_acesso = new Acesso();
        $o_acesso->insert_acesso($id_rota);
    }

}
