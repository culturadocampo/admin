<?php

class Anuncio {

    private $quantidade;
    private $valor;
    private $visivel;
    private $ativo;
    
       function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_anuncio($fk_produtor, $fk_produto) {
        $query = "
            INSERT INTO anuncios
             (
                fk_produtor, 
                fk_produto, 
                quantidade,
                valor, 
                descricao, 
                visivel,
                ativo
            )
            VALUES (
                '{$fk_produtor}',
                '{$fk_produto}',
                '{$this->get_quantidade()}',
                '{$this->get_valor()}',
                '{$this->get_descricao()}',
                '{$this->get_visivel()}',
                '{$this->get_ativo()}'
             )";
        $this->conn->execute($query);
    }

    public function anuncios_ativos() {
        $query = "
            SELECT 
                * 
            FROM 
                anuncios
            WHERE 
                TRUE 
            AND ativo = 1   
        ";
        return $this->conn->fetch_all($query);
    }

    public function meus_anuncios() {
        $query = "
            SELECT 
                * 
            FROM 
                anuncios
        ";
        return $this->conn->fetch_all($query);
    }

    function get_quantidade() {
        return $this->quantidade;
    }

    function get_valor() {
        return $this->valor;
    }

    function get_descricao() {
        return $this->descricao;
    }

    function get_visivel() {
        return $this->visivel;
    }

    function get_ativo() {
        return $this->ativo;
    }

    function get_data_cadastro() {
        return $this->data_cadastro;
    }

    function set_quantidade($quantidade) {
        if ($quantidade) {
            $this->quantidade = STRINGS::limpar($quantidade);
        } else {
            APP::return_response(false, "Favor informar a quantidade");
        }
    }

    function set_valor($valor) {
        if ($valor) {
            $this->valor = STRINGS::limpar($valor);
        } else {
            APP::return_response(false, "Favor informar o valor");
        }
    }

    function set_visivel($visivel) {
        $this->visivel = STRINGS::limpar($visivel);
    }

    function set_ativo($ativo) {
        $this->ativo = STRINGS::limpar($ativo);
    }

}
