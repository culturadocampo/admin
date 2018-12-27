<?php

class Endereco {

    private $numero;
    private $complemento;
    private $logradouro;
    private $cep;
    private $bairro;
    private $cidade;
    private $estado;
    private $lat;
    private $long;
    
       function __construct() {
        $this->conn = DB::get_instance();
    }

    public function estados() {
        $query = "SELECT * FROM estados";
        return $this->conn->fetch_all($query);
    }

    public function cidades() {
        $query = "SELECT id_municipio, nome, uf FROM municipios";
        return $this->conn->fetch_all($query);
    }
    
    function insert_endereco($id_usuario) {
        $query = "
            INSERT INTO enderecos
             (
                fk_usuario, 
                fk_cidade, 
                cep,
                bairro, 
                rua, 
                numero,
                complemento
            )
            VALUES (
                '{$id_usuario}',
                '{$this->get_cidade()}',
                '{$this->get_cep()}',
                '{$this->get_bairro()}',
                '{$this->get_logradouro()}',
                '{$this->get_numero()}',
                '{$this->get_complemento()}'
             )";
        $this->conn->execute($query);
    }

    function select_enderecos_usuarios($id_usuario) {
        $query = "
            SELECT 
                lng, lat
            FROM enderecos
            WHERE TRUE
                AND fk_usuario = '{$id_usuario}'
        ";
        return $this->conn->fetch($query);
    }
    
    function get_lat() {
        return $this->lat;
    }
    
    function get_cep(){
        return $this->cep;
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
    
    function set_cep($cep) {
         if($cep){
            $this->cep = STRINGS::limpar($cep);
        } else {
             APP::return_response(false, "Favor informar o CEP");
        }
    }
    
    function set_lat($lat) {
         if($lat){
            $this->lat = STRINGS::limpar($lat);
        } else {
             APP::return_response(false, "Favor clique no botão GERAR");
        }
    }
    
    function set_long($long) {
        if($long){
            $this->long = STRINGS::limpar($long);
        } else {
             APP::return_response(false, "Favor clique no botão GERAR");
        }
    }

    function set_numero($numero) {
        if($numero){
            $this->numero = STRINGS::limpar($numero);
        } else {
            APP::return_response(false, "Favor informar o Nº");
        }
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
        if($bairro){
            $this->bairro = STRINGS::limpar($bairro);
        } else {
            APP::return_response(false, "Favor informar o BAIRRO");
        }
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
