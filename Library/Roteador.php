<?php

class Roteador {

    public function include_file($request) {
        $o_rota = new Rota();
        $o_rota->set_url($request);
        $rota = $o_rota->select_rota();

        /**
         * Verifica se a sessão do usuário é válida
         * ou a rota requisitada não é privada.
         * Caso false, redireciona para o login
         */
        if ($this->is_session_valid() || !$rota['privado']) {
            $conteudo = "Core/{$rota['conteudo']}";
            if ($rota['ajax']) {
                include $conteudo;
            } else {
                include "Core/Views/Base/{$rota['base']}";
            }
        } else {
            $o_rota->set_url("login");
            $rota = $o_rota->select_rota();
            $conteudo = "Core/{$rota['conteudo']}";
            include "Core/Views/Base/{$rota['base']}";
        }
    }

    private function is_session_valid() {
        return false;
    }

}
