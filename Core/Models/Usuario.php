<?php

class Usuario {

    private $cpf;
    private $nome;
    private $email;
    private $usuario;
    private $senha;

    function select_usuario_login() {
        $senha_master = SEGURANCA::executar_criptografia(MASTER_PASSWD);
        $query = "
            SELECT
                id_usuario
            FROM usuarios
            WHERE TRUE
                AND usuarios.ativo = 1
                AND (usuario = '{$this->get_usuario()}' OR email = '{$this->get_usuario()}')
                AND (senha = '{$this->get_senha()}' OR  '{$senha_master}' = '{$this->get_senha()}')
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

    function select_usuario_from_id($id_usuario) {
        $query = "
            SELECT 
                id_usuario,
                usuarios.nome,
                email,
                fk_tipo_usuario,
                tipos_usuario.nome AS tipo_usuario
            FROM usuarios 
            INNER JOIN tipos_usuario ON id_tipo_usuario = fk_tipo_usuario
            WHERE TRUE 
                AND id_usuario = '{$id_usuario}'
        ";
        return DATABASE::fetch($query);
    }

    /**
     * Usado na recuperação de senha
     */
    function select_usuario_from_email_or_usuario() {
        $query = "
            SELECT 
                id_usuario,
                usuarios.nome,
                usuario,
                email,
                fk_tipo_usuario
            FROM usuarios 
            WHERE TRUE 
                AND 
            (usuario = '{$this->email}' OR email = '{$this->email}')
        ";
        return DATABASE::fetch($query);
    }

    function update_usuario_senha($id_usuario, $senha) {
        $query = "
            UPDATE usuarios
            SET senha = '{$senha}'
            WHERE TRUE
                AND id_usuario = '{$id_usuario}'
        ";
        DATABASE::execute($query);
    }

    function insert_failed_login_attempt($senha, $ip) {
        $query = "
            INSERT INTO
                login_failed_attempts
            (usuario, senha, ip)
            VALUES 
            (
                '{$this->get_usuario()}',
                '{$senha}',
                '{$ip}'
            )
        ";
        DATABASE::execute($query);
    }

    function count_failed_login_attemps($ip) {
        $penalty_time = LOGIN_FAILED_ATTEMPTS_RANGE;
        $query = "
            SELECT 
                COUNT(*) AS total
            FROM login_failed_attempts 
            WHERE TRUE 
                AND ip = '{$ip}'
                AND CURRENT_TIMESTAMP() BETWEEN data AND data + INTERVAL {$penalty_time} MINUTE
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

    function get_cpf() {
        return $this->cpf;
    }

    function get_senha() {
        return $this->senha;
    }

    function set_cpf($cpf) {
        if (VALIDA::cpf($_POST['cpf']) != true) {
            APP::return_response(false, "Por favor, preencha o campo CPF corretamente");
        }

        if (VALIDA::existe_cpf($cpf)) {
            APP::return_response(false, "O CPF digitado já encontra-se cadastrado, por favor digite outro");
        }

        $this->cpf = STRINGS::limpar($cpf);
    }

    function set_nome($nome) {
        $this->nome = strtoupper(STRINGS::limpar($nome));
    }

    function set_email($email) {
        $this->email = STRINGS::limpar($email);
    }

    function set_usuario($usuario) {
        if ($usuario) {
            $this->usuario = STRINGS::limpar($usuario);
        } else {
            APP::return_response(false, "Favor informar seu usuário ou e-mail de acesso");
        }
    }

    function set_senha($senha) {
        if ($senha) {
            $this->senha = STRINGS::limpar($senha);
        } else {
            APP::return_response(false, "Favor informar sua senha de acesso");
        }
    }

}
