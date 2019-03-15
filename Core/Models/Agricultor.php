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
    private $conn;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_agricultor($id_usuario, $id_tecnico_responsavel, $id_certificacao) {
        $query = "
            INSERT INTO 
                usuarios_agricultores
            (fk_usuario, fk_usuario_tecnico, fk_certificacao_organica, rg, caepf, integrantes_upf)
            VALUES(
                '{$id_usuario}',
                '{$id_tecnico_responsavel}',
                '{$id_certificacao}',
                '{$this->getRg()}',
                '{$this->getCaepf()}',
                '{$this->getIntegrantesUpf()}'
            )
        ";
        $this->conn->execute($query);
    }

    function select_agricultores_ativos() {
        $id_tipo_usuario = SESSION::get_id_tipo_usuario();
        if ($id_tipo_usuario == 1) {
            return $this->select_todos_agricultores();
        } else if ($id_tipo_usuario == 2) {
            return $this->select_agricultores_do_coordenador();
        } else if ($id_tipo_usuario == 5) {
            return $this->select_agricultores_do_tecnico();
        } else {
            return array();
        }
    }

    function select_todos_agricultores() {
        $query = "
            SELECT 
                id_usuario, nome, fk_estado, fk_municipio
            FROM 
                usuarios_agricultores
            INNER JOIN usuarios ON usuarios_agricultores.fk_usuario = id_usuario
            INNER JOIN enderecos ON enderecos.fk_usuario = id_usuario
            WHERE TRUE
                AND usuarios.ativo = 1";
        return $this->conn->fetch_all($query);
    }

    function select_agricultores_do_coordenador() {
        $ids_tecnicos_cooordenador = SESSION::get_meus_tecnicos();
        $query = "
            SELECT 
                id_usuario, nome, fk_estado, fk_municipio
            FROM 
                usuarios_agricultores
            INNER JOIN usuarios ON usuarios_agricultores.fk_usuario = id_usuario
            INNER JOIN enderecos ON enderecos.fk_usuario = id_usuario
            WHERE TRUE
                AND fk_usuario_tecnico IN ($ids_tecnicos_cooordenador)
                AND usuarios.ativo = 1";
        return $this->conn->fetch_all($query);
    }

    function select_agricultores_do_tecnico() {
        $id_usuario_tecnico = SESSION::get_id_usuario();
        $query = "
            SELECT 
                id_usuario, nome, fk_estado, fk_municipio
            FROM 
                usuarios_agricultores
            INNER JOIN usuarios ON usuarios_agricultores.fk_usuario = id_usuario
            INNER JOIN enderecos ON enderecos.fk_usuario = id_usuario
            WHERE TRUE
                AND fk_usuario_tecnico = '{$id_usuario_tecnico}'
                AND usuarios.ativo = 1";
        return $this->conn->fetch_all($query);
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



}
