<?php

class Endereco {

    private $numero;
    private $complemento;
    private $logradouro;
    private $cep;
    private $bairro;
    private $municipio;
    private $estado;
    private $lat;
    private $lng;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    public function estados() {
        $query = "SELECT * FROM estados";
        return $this->conn->fetch_all($query);
    }

    public function municipios() {
        $query = "SELECT id_municipio, nome, uf FROM municipios";
        return $this->conn->fetch_all($query);
    }

    public function get_id_from_uf($uf) {
        $query = "SELECT id_estado FROM estados WHERE uf = '{$uf}'";
        $estado = $this->conn->fetch($query);
        if (isset($estado['id_estado']) && $estado['id_estado'] > 0) {
            return $estado['id_estado'];
        } else {
            return false;
        }
    }

    public function get_id_from_nome_municipio($nome) {
        $query = "SELECT id_municipio FROM municipios WHERE nome = '{$nome}'";
        $municipio = $this->conn->fetch($query);
        if (isset($municipio['id_municipio']) && $municipio['id_municipio'] > 0) {
            return $municipio['id_municipio'];
        } else {
            return false;
        }
    }

    function insertEndereco($id_usuario) {
        $query = "
            INSERT INTO enderecos
             (
                fk_usuario, 
                fk_estado,
                fk_municipio, 
                cep,
                bairro, 
                rua, 
                numero,
                complemento,
                lat,
                lng
            )
            VALUES (
                '{$id_usuario}',
                '{$this->get_estado()}',
                '{$this->get_municipio()}',
                '{$this->get_cep()}',
                '{$this->get_bairro()}',
                '{$this->get_logradouro()}',
                '{$this->get_numero()}',
                '{$this->get_complemento()}',
                '{$this->get_lat()}',
                '{$this->get_lng()}'
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

    function get_cep() {
        return $this->cep;
    }

    function get_lng() {
        return $this->lng;
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

    function get_municipio() {
        return $this->municipio;
    }

    function get_estado() {
        return $this->estado;
    }

    function set_cep($cep) {
        if ($cep) {
            $this->cep = STRINGS::limpar($cep);
        } else {
            APP::return_response(false, "Favor informar o CEP");
        }
    }

    function set_lat($lat) {
        if (VALIDA::isValidLatitude($lat)) {
            $this->lat = STRINGS::limpar($lat);
        } else {
            APP::return_response(false, "(LAT) Latitude inválida");
        }
    }

    function set_lng($lng) {
        if (VALIDA::isValidLongitude($lng)) {
            $this->lng = STRINGS::limpar($lng);
        } else {
            APP::return_response(false, "(LNG) Longitude inválida");
        }
    }

    function set_numero($numero) {
        if ($numero) {
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
        $this->bairro = STRINGS::limpar($bairro);
    }

    function set_municipio($municipio) {
        if ($municipio) {
            $this->municipio = STRINGS::limpar($municipio);
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
