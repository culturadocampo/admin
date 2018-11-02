<?php

class Endereco {

    private $numero;
    private $complemento;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;

    function insert_endereco() {
        $query = "
            INSERT INTO enderecos
             (
                fk_usuario, 
                fk_cidade, 
                bairro, 
                rua, 
                numero,
                complemento
            )
            VALUES (
                '{$this->get_id_usuario()}',
                '{$this->get_cidade()}',
                '{$this->get_bairro()}',
                '{$this->get_logradouro()}',
                '{$this->get_numero()}',
                '{$this->get_complemento()}'
             )";
        DATABASE::execute($query);
    }

    function get_id_usuario() {
        if ($_SESSION['id_usuario']) {
            return STRINGS::limpar($_SESSION['id_usuario']);
        } else {
            APP::return_response(false, "Ocorreu um erro. Cód: 001");
        }
    }

    function get_numero() {
        return $this->numero;
    }

    function get_complemento() {
        return $this->complemento;
    }

    function get_logradouro() {
        return $this->logradouro;
    }

    function get_bairro() {
        return $this->bairro;
    }

    function get_cidade() {
        return $this->cidade;
    }

    function get_estado() {
        return $this->estado;
    }

    function set_numero($numero) {
        $this->numero = STRINGS::limpar($numero);
    }

    function set_complemento($complemento) {
        $this->complemento = STRINGS::limpar($complemento);
    }

    function set_logradouro($logradouro) {
        if ($logradouro) {
            $this->logradouro = STRINGS::limpar($logradouro);
        } else {
            APP::return_response(false, "Favor informar o LOGRADOURO");
        }
    }

    function set_bairro($bairro) {
        $this->bairro = STRINGS::limpar($bairro);
    }

    function set_cidade($cidade) {
        if ($cidade) {
            $this->cidade = STRINGS::limpar($cidade);
        } else {
            APP::return_response(false, "Favor informar a CIDADE");
        }
    }

    function set_estado($estado) {
        if ($estado) {
            $this->estado = STRINGS::limpar($estado);
        } else {
            APP::return_response(false, "Favor informar o ESTADO");
        }
    }

}
