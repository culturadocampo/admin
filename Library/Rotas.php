<?php

class Rotas {

    private static function get_rota() {
        $url = explode("/", strtolower($_SERVER["REQUEST_URI"]));
        $rota = implode("/", array_slice($url, 2));
        return $rota;
    }

    static function include_file() {
        $rota = self::get_rota();
        
        if ($rota === "login") {
            include 'App/Views/Content/v_login.php';
            exit;
        }

        if ($rota === "do-login") {
            include 'App/Controllers/login/do_login.php';
            exit;
        }

        if ($rota === "dashboard") {
            $base = 'App/Views/Base/b_dashboard.php';
            $content = 'App/Views/Content/c_dashboard.php';
            include $base;
            exit;
        }

        if (preg_match("^produto\/[0-9]+\/editar^", $rota)) {
            $params = explode("/", $rota);
            $id = $params[1];
            include 'App/Views/Content/editar_produto.php';
            exit;
        }

        echo "{$rota} not found";
    }

}
