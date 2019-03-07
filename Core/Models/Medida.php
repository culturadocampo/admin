<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unidade
 * UNIDADE DE MEDIDA
 * @author Notheros
 */
class Medida {

    private $conn;
    private $idUnidade;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function select_unidades_medida() {
        $query = "
            SELECT id_unidade, descricao
            FROM produto_unidades
            WHERE ativo = 1
        ";
        return $this->conn->fetch_all($query);
    }

    function is_unidade_valida($idUnidade) {
        $query = "
            SELECT id_unidade
            FROM produto_unidades
            WHERE TRUE
                AND ativo = 1
                AND id_unidade = '{$idUnidade}'
        ";
        return $this->conn->fetch($query);
    }

    function getIdUnidade() {
        return $this->idUnidade;
    }

    function setIdUnidade($idUnidade) {
        $unidade = $this->is_unidade_valida($idUnidade);
        if ($unidade) {
            $this->idUnidade = $idUnidade;
        } else {
            APP::return_response(false, "A unidade de medida selecionada é inválida");
        }
    }

}
