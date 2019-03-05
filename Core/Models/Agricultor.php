<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agricultor
 *
 * @author Notheros
 */
class Agricultor {

    private $rg;
    private $caepf;
    private $integrantesUpf;
    private $coletivo;
    private $conn;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_agricultor($id_usuario) {
        $query = "
            INSERT INTO 
                usuarios_agricultores
            (fk_usuario, rg, caepf, integrantes_upf, coletivo)
            VALUES(
                '{$id_usuario}',
                '{$this->getRg()}',
                '{$this->getCaepf()}',
                '{$this->getIntegrantesUpf()}',
                '{$this->getColetivo()}'
            )
        ";
        $this->conn->execute($query);
    }

    function getRg() {
        return $this->rg;
    }

    function getCaepf() {
        return $this->caepf;
    }

    function getIntegrantesUpf() {
        return $this->integrantesUpf;
    }

    function getColetivo() {
        return $this->coletivo;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCaepf($caepf) {
        $this->caepf = $caepf;
    }

    function setIntegrantesUpf($integrantesUpf) {
        $this->integrantesUpf = $integrantesUpf;
    }

    function setColetivo($coletivo) {
        $this->coletivo = $coletivo;
    }

}
