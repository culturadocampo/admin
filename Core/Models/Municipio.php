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
                id_municipio, nome, uf 
            FROM municipios
            WHERE codigo = '{$codigo}'
        ";
        return $this->conn->fetch($query);
    }
    
    function select_todos_municipios_uf($uf){
          $query = "
            SELECT 
                codigo, nome
            FROM municipios
            WHERE uf = '{$uf}'
        ";
        return $this->conn->fetch_all($query);
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
