<?php

class Endereco {

    private $numero;
    private $complemento;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $lat;
    private $long;

    function insert_endereco($id_usuario) {
        $query = "
            INSERT INTO enderecos
             (
                fk_usuario, 
                fk_cidade, 
                bairro, 
                rua, 
                numero,
                complemento,
                lng,
                lat
            )
            VALUES (
                '{$id_usuario}',
                '{$this->get_cidade()}',
                '{$this->get_bairro()}',
                '{$this->get_logradouro()}',
                '{$this->get_numero()}',
                '{$this->get_complemento()}',
                '{$this->get_lat()}',
                '{$this->get_long()}'
             )";
        DATABASE::execute($query);
    }

    function select_enderecos_usuarios($id_usuario) {
        $query = "
            SELECT 
                lng, lat
            FROM enderecos
            WHERE TRUE
                AND fk_usuario = '{$id_usuario}'
        ";
        return DATABASE::fetch($query);
    }
    
    function get_lat() {
        return $this->lat;
    }
    
    function get_long() {
        return $this->long;
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
    
    function set_lat($lat) {
        $this->lat = STRINGS::limpar($lat);
    }
    
    function set_long($long) {
        $this->long = STRINGS::limpar($long);
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
