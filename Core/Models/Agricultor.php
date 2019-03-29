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

    private $conn;
    private $caepf;
    private $rg;
    private $integrantesUpf;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_agricultor($id_usuario) {
        $query = "
            INSERT INTO agricultores
            (fk_usuario, caepf, rg, integrantes_upf)
            VALUES(
                '{$id_usuario}',
                '{$this->getCaepf()}',
                '{$this->getRg()}',
                '{$this->getIntegrantesUpf()}'
            )
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
    }

    function select_agricultor($id_usuario) {
        $query = "
            SELECT id_agricultor, caepf, rg
            FROM agricultores
            WHERE fk_usuario = '{$id_usuario}'
        ";
        return $this->conn->fetch($query);
    }

    function select_todos_agricultores_filiado($fk_filiado) {
        $query = "SELECT
                    fk_usuario,
                    usuarios.nome,
                    usuarios.cpf
                 FROM
                    xref_agricultores_filiados
                 INNER JOIN
                    usuarios ON id_usuario = fk_usuario
                 WHERE 
                    fk_filiado = '{$fk_filiado}'";

        return $this->conn->fetch_all($query);
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
                id_usuario, nome, cpf
            FROM 
                usuarios
            WHERE TRUE
                AND fk_tipo_usuario = 6
                AND ativo = 1";
        return $this->conn->fetch_all($query);
    }

    function select_agricultores_do_coordenador() {
        $id_usuario = SESSION::get_id_usuario();

        $query = "
            SELECT 
                id_propriedade_rural, estados.nome AS estado, municipios.nome AS municipio
            FROM 
                propriedades_rurais
            INNER JOIN xref_propriedades_tecnicos ON fk_propriedade_rural = id_propriedade_rural
            INNER JOIN tecnicos ON fk_tecnico = id_tecnico
            INNER JOIN enderecos ON id_endereco = fk_endereco
            INNER JOIN estados on fk_estado = id_estado
            INNER JOIN municipios ON enderecos.fk_municipio = id_municipio
            WHERE TRUE
                AND propriedades_rurais.ativo = 1
		AND fk_usuario_coordenador = '{$id_usuario}'";
        return $this->conn->fetch_all($query);
    }

    function select_agricultores_do_tecnico() {
        $query = "
            SELECT 
                id_propriedade_rural, estados.nome AS estado, municipios.nome AS municipio
            FROM propriedades_rurais
            INNER JOIN xref_propriedades_tecnicos ON fk_propriedade_rural = id_propriedade_rural
            INNER JOIN enderecos ON id_endereco = fk_endereco
            INNER JOIN estados on fk_estado = id_estado
            INNER JOIN municipios ON enderecos.fk_municipio = id_municipio
            WHERE TRUE
                AND propriedades_rurais.ativo = 1
		AND fk_tecnico = '{$_SESSION['id_tecnico']}'
	";
        return $this->conn->fetch_all($query);
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

    function getIntegrantesUpf() {
        return $this->integrantesUpf;
    }

    function setIntegrantesUpf($integrantesUpf) {
        if (is_numeric($integrantesUpf) && $integrantesUpf > 0) {
            $this->integrantesUpf = $integrantesUpf;
        } else {
            APP::return_response(false, "Informe um número de integrantes válido");
        }
    }

}
