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
        return Database::fetch($query);
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

        Database::execute($query);
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
        Database::execute($query);
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
        return Database::fetch($query);
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
        $this->nome = strtoupper(Strings::limpar($nome));
    }

    function set_email($email) {
        $this->email = Strings::limpar($email);
    }

    function set_usuario($usuario) {
        $this->usuario = Strings::limpar($usuario);
    }

    function set_senha($senha) {
        $this->senha = Strings::limpar($senha);
    }

}
