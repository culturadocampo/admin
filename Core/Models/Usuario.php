<?php

class Usuario {

    private $usuario;
    private $senha;

    function select_usuario_login() {
        $query = "
            SELECT
                id_usuario,
                nome,
                email
            FROM usuarios
            WHERE TRUE
                AND ativo = 1
                AND usuario = '{$this->get_usuario()}'
                AND senha = '{$this->get_senha()}'
        ";
       return Database::fetch($query);
    }

    function get_usuario() {
        return $this->usuario;
    }

    function get_senha() {
        return $this->senha;
    }

    function set_usuario($usuario) {
        $this->usuario = Filtro::limpar($usuario);
    }

    function set_senha($senha) {
        $this->senha = Filtro::limpar($senha);
    }

}
