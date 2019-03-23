<?php

class PropriedadeRural {

    private $integrantesUpf;
    private $conn;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_propriedade_rural($id_endereco, $id_certificacao, $id_usuario) {
        $query = "
            INSERT INTO 
                propriedades_rurais
            (fk_endereco, fk_certificacao_organica, fk_usuario_responsavel, integrantes_upf)
            VALUES(
                '{$id_endereco}',
                '{$id_certificacao}',
                '{$id_usuario}',
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

    function insert_vinculo_usuario_filiado($id_usuario, $id_filiado) {
        $query = "
            INSERT INTO 
                xref_usuarios_filiados
            (fk_usuario, fk_filiado)
            VALUES(
                '{$id_usuario}',
                '{$id_filiado}'
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
    function select_propriedades_usuario($id_usuario) {
        $query = "
            SELECT
                id_propriedade_rural
            FROM propriedades_rurais
            WHERE TRUE
                AND fk_usuario_responsavel = '{$id_usuario}'
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
