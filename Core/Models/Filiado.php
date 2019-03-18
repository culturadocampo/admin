<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filiado
 *
 * @author Notheros
 */
class Filiado {

    private $conn;
    private $nomeFantasia;
    private $razaoSocial;
    private $cnpj;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_filiado($id_coletivo, $id_endereco) {
        $query = "
            INSERT INTO
                filiados
            (
                fk_endereco,
                fk_coletivo,
                nome_fantasia,
                razao_social,
                cnpj
            )
            VALUES (
                '{$id_endereco}',
                '{$id_coletivo}',
                '{$this->getNomeFantasia()}',
                '{$this->getRazaoSocial()}',
                '{$this->getCnpj()}'
            )
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
    }

    function insert_vinculo_usuario_filiado($id_usuario, $id_filiado) {
        $query = "
            INSERT INTO
                xref_filiados_usuarios
            (fk_filiado, fk_usuario)
            VALUES('{$id_filiado}', '{$id_usuario}')
        ";
        $this->conn->execute($query);
    }

    function select_todos_filiados_ativos() {
        $query = "
            SELECT 
                id_filiado,
                nome_fantasia,
                cnpj
            FROM filiados
            WHERE TRUE
                AND ativo = 1
        ";
        return $this->conn->fetch_all($query);
    }

    /**
     * Usado durante o login para descobrir
     * qual é o filiado do usuário que está logando
     */
    function select_filiado_usuario($id_usuario) {
        $query = "
            SELECT
                id_filiado, nome_fantasia
            FROM filiados
            INNER JOIN xref_filiados_usuarios ON id_filiado = fk_filiado
            WHERE TRUE
                AND fk_usuario = '{$id_usuario}'
        ";
        return $this->conn->fetch($query);
    }

    function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    function getRazaoSocial() {
        return $this->razaoSocial;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function setNomeFantasia($nomeFantasia) {
        if ($nomeFantasia) {
            $this->nomeFantasia = $nomeFantasia;
        } else {
            APP::return_response(false, "Informe o nome fantasia");
        }
    }

    function setRazaoSocial($razaoSocial) {
        if ($razaoSocial) {
            $this->razaoSocial = $razaoSocial;
        } else {
            APP::return_response(false, "Informe a razão social");
        }
    }

    function setCnpj($cnpj) {
        if (VALIDA::isCNPJ($cnpj)) {
            $this->cnpj = $cnpj;
        } else {
            APP::return_response(false, "Informe um CNPJ válido");
        }
    }

}
