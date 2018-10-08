<?php

/**
 * Aprenda a criar uma rota de acesso em:
 * https://github.com/app-culturadocampo/pro_campo#rotas-de-acesso
 */
class Roteador {

    public function include_file() {
        $o_rota = new Rota();
        $o_rota->set_url($_GET['url']);
        $rota = $o_rota->select_rota();
        include "Core/Views/Base/{$rota['base']}";
    }

//    function login() {
//        include 'Core/Views/Content/v_login.php';
//    }
//
//    function do_login() {
//        include 'Core/Controllers/login/do_login.php';
//    }
//
//    function dashboard() {
//        $base = 'Core/Views/Base/b_dashboard.php';
//        $content = 'Core/Views/Content/dashboard.php';
//        include $base;
//    }
//
//    function meu_nome() {
//        echo "Seu nome é {$_GET['nome']} e seu número é {$_GET['id']}";
//        //$base = 'Core/Views/Base/b_dashboard.php';
//        // $content = 'Core/Views/Content/enviar_nome.php';
//        //include $base;
//    }

}
