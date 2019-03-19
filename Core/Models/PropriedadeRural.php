<?php

class PropriedadeRural {

    private $integrantesUpf;
    private $conn;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_propriedade_rural($id_endereco, $id_certificacao) {
        $query = "
            INSERT INTO 
                propriedades_rurais
            (fk_endereco, fk_certificacao_organica, integrantes_upf)
            VALUES(
                '{$id_endereco}',
                '{$id_certificacao}',
                '{$this->getIntegrantesUpf()}'
            )
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
    }

    function insert_vinculo_propriedade_tecnico($id_propriedade, $id_tecnico) {
        $query = "
            INSERT INTO 
                xref_propriedades_tecnicos
            (fk_propriedade_rural, fk_tecnico)
            VALUES(
                '{$id_propriedade}',
                '{$id_tecnico}'
            )
        ";
        $this->conn->execute($query);
    }

    function insert_vinculo_propriedade_filiado($id_propriedade, $id_filiado) {
        $query = "
            INSERT INTO 
                xref_propriedades_filiados
            (fk_propriedade_rural, fk_filiado)
            VALUES(
                '{$id_propriedade}',
                '{$id_filiado}'
            )
        ";
        $this->conn->execute($query);
    }

    function insert_vinculo_propriedade_trabalhador($id_propriedade, $id_trabalhador_rural) {
        $query = "
            INSERT INTO 
                xref_propriedades_trabalhadores
            (fk_propriedade_rural, fk_trabalhador_rural)
            VALUES(
                '{$id_propriedade}',
                '{$id_trabalhador_rural}'
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
                id_propriedade_rural, estados.nome AS estado, municipios.nome AS municipio
            FROM 
                propriedades_rurais
            INNER JOIN enderecos ON id_endereco = fk_endereco
            INNER JOIN estados on fk_estado = id_estado
            INNER JOIN municipios ON fk_municipio = id_municipio
            WHERE TRUE
                AND propriedades_rurais.ativo = 1";
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

    /**
     * Usado durante o login para descobrir
     * qual é a propriedade do usuário que está logando
     */
    function select_propriedade_trabalhador($id_trabalhador) {
        $query = "
            SELECT
                id_propriedade_rural
            FROM propriedades_rurais
            INNER JOIN xref_propriedades_trabalhadores ON id_propriedade_rural = fk_propriedade_rural
            WHERE TRUE
                AND fk_trabalhador_rural = '{$id_trabalhador}'
        ";
        return $this->conn->fetch_all($query);
    }


    function getIntegrantesUpf() {
        return $this->integrantesUpf;
    }

    function getColetivo() {
        return $this->coletivo;
    }

    function setIntegrantesUpf($integrantesUpf) {
        $this->integrantesUpf = $integrantesUpf;
    }

}
