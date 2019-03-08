<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coordenador
 *
 * @author Notheros
 */
class Coordenador {

    private $conn;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function select_coordenadores() {
        $query = "
            SELECT
                id_usuario, nome
            FROM
                usuarios
            WHERE TRUE
                AND fk_tipo_usuario = 2
                AND ativo = 1
        ";
        return $this->conn->fetch_all($query);
    }
    

}
