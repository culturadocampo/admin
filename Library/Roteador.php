<?php

class Roteador {

    public static function include_file($request) {
        $o_rota = new Rota();
        $o_rota->set_url($request);
        $rota = $o_rota->select_rota();

        if (Application::is_logged() || $rota['publico']) {
            $conteudo = "Core/Rotas/{$rota['conteudo']}";
            if ($rota['matriz']) {
                include "Public/Matriz/{$rota['matriz']}";
            } else {
                include $conteudo;
            }
        } else {
            $o_rota->set_url("login");
            $rota = $o_rota->select_rota();
            $conteudo = "Core/Rotas/{$rota['conteudo']}";
            include "Public/Matriz/{$rota['matriz']}";
         }
    }

    public function include_rota($id_rota) {
        
    }

    public function tem_permissao($id_rota) {
        
    }

}
