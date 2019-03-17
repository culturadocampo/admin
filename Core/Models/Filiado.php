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

    function insert_filiado($id_usuario, $id_coletivo) {
        $query = "
            INSERT INTO
                usuarios_filiados
            (
                fk_usuario,
                fk_coletivo,
                nome_fantasia,
                razao_social,
                cnpj
            )
            VALUES (
                '{$id_usuario}',
                '{$id_coletivo}',
                '{$this->getNomeFantasia()}',
                '{$this->getRazaoSocial()}',
                '{$this->getCnpj()}'
            )
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
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
