<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TrabalhadorRural
 *
 * @author Notheros
 */
class TrabalhadorRural {

    private $conn;
    private $caepf;
    private $rg;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_trabalhador_rural($id_usuario) {
        $query = "
            INSERT INTO trabalhadores_rurais
            (fk_usuario, caepf, rg)
            VALUES('{$id_usuario}', '{$this->getCaepf()}', '{$this->getRg()}')
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
    }

    function select_trabalhador_usuario($id_usuario) {
        $query = "
            SELECT id_trabalhador, caepf 
            FROM trabalhadores_rurais
            WHERE fk_usuario = '{$id_usuario}'
        ";
        return $this->conn->fetch($query);
    }

    function getCaepf() {
        return $this->caepf;
    }

    function setCaepf($caepf) {
        $this->caepf = STRINGS::limpar($caepf);
    }

    function getRg() {
        return $this->rg;
    }

    function setRg($rg) {
        $this->rg = STRINGS::limpar($rg);
    }

}
