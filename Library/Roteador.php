<?php

class Roteador {

    public static function include_file($request) {
        $o_rota = new Rota();
        $o_rota->set_url($request);
        $rota = $o_rota->select_rota();

        /**
         * Verifica se a sessão do usuário é válida
         * ou a rota requisitada não é privada.
         * Caso false, redireciona para o login
         */
        if (self::is_session_valid() || !$rota['privado']) {
            $conteudo = "Core/{$rota['path']}/{$rota['conteudo']}";
            if ($rota['ajax']) {
                include $conteudo;
            } else {
                include "Core/Views/Base/{$rota['base']}";
            }
        } else {
            $o_rota->set_url("login");
            $rota = $o_rota->select_rota();
            $conteudo = "Core/{$rota['path']}/{$rota['conteudo']}";
            include "Core/Views/Base/{$rota['base']}";
        }
    }

    private static function is_session_valid() {
        return true;
    }

    public function include_rota($id_rota) {
        
    }

    public function tem_permissao($id_rota) {
        
    }

}
