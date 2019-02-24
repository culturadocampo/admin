<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Municipio
 *
 * @author Notheros
 */
class Municipio {

    private $conn;
    private $codigo;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function selectMunicipio($codigo) {
        $query = "
            SELECT 
                id, nome, uf 
            FROM municipios
            WHERE codigo = '{$codigo}'
        ";
        return $this->conn->fetch($query);
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $municipio = $this->selectMunicipio($codigo);
        if ($municipio) {
            $this->codigo = $codigo;
        } else {
            APP::return_response(false, "Ocorreu um erro: MUNICÍPIO inexistente");
        }
    }

}
