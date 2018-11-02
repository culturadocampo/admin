<?php

class Usuario {

    private $nome;
    private $email;
    private $usuario;
    private $senha;

    function select_usuario_login() {
        $query = "
            SELECT
                id_usuario,
                nome,
                email,
                fk_tipo_usuario
            FROM usuarios
            WHERE TRUE
                AND ativo = 1
                AND usuario = '{$this->get_usuario()}'
                AND senha = '{$this->get_senha()}'
        ";
        return DATABASE::fetch($query);
    }

    function insert_novo_usuario() {
        $query = "
            INSERT INTO
                usuarios
            (fk_tipo_usuario, nome, usuario, senha, email)
            VALUES 
            (
                '2',
                '{$this->get_nome()}',
                '{$this->get_usuario()}',
                '{$this->get_senha()}',
                '{$this->get_email()}'
            )
        ";

        DATABASE::execute($query);
    }

    function insert_novo_usuario_google() {
        $query = "
            INSERT INTO
                usuarios
            (fk_tipo_usuario, nome, usuario, email)
            VALUES 
            (
                '2',
                '{$this->get_nome()}',
                '{$this->get_usuario()}',
                '{$this->get_email()}'
            )
        ";
        DATABASE::execute($query);
    }

    function select_usuario($usuario) {
        $query = "
            SELECT 
                id_usuario,
                nome,
                email,
                fk_tipo_usuario
            FROM usuarios 
            WHERE TRUE 
                AND usuario = '{$usuario}'
        ";
        return DATABASE::fetch($query);
    }

    function get_nome() {
        return $this->nome;
    }

    function get_email() {
        return $this->email;
    }

    function get_usuario() {
        return $this->usuario;
    }

    function get_senha() {
        return $this->senha;
    }

    function set_nome($nome) {
        $this->nome = strtoupper(STRINGS::limpar($nome));
    }

    function set_email($email) {
        $this->email = STRINGS::limpar($email);
    }

    function set_usuario($usuario) {
        $this->usuario = STRINGS::limpar($usuario);
    }

    function set_senha($senha) {
        $this->senha = STRINGS::limpar($senha);
    }

}
