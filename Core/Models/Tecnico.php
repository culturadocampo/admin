<?php

class Tecnico {

    private $conn;
    private $idTecnico;
    private $rg;
    private $formacao;
    private $areaAtuacao;
    private $entidade;
    private $telefone;
    private $celular;
    private $email;
    private $observacao;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insertTecnico($id_usuario, $id_municipio) {
        $query = "
            INSERT INTO tecnicos
            (
                fk_usuario,
                fk_municipio,
                rg,
                formacao,
                area_atuacao,
                entidade,
                telefone,
                celular,
                email,
                observacao
            )
            VALUES (
                '{$id_usuario}',
                '{$id_municipio}',
                '{$this->getRg()}',
                '{$this->getFormacao()}',
                '{$this->getAreaAtuacao()}',
                '{$this->getEntidade()}',
                '{$this->getTelefone()}',
                '{$this->getCelular()}',
                '{$this->getEmail()}',
                '{$this->getObservacao()}'
            )
        ";
        $this->conn->execute($query);
    }

    function getIdTecnico() {
        return $this->idTecnico;
    }

    function getRg() {
        return $this->rg;
    }

    function getFormacao() {
        return $this->formacao;
    }

    function getAreaAtuacao() {
        return $this->areaAtuacao;
    }

    function getEntidade() {
        return $this->entidade;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function setIdTecnico($idTecnico) {
        $this->idTecnico = $idTecnico;
    }

    function setRg($rg) {
        if (!empty($rg)) {
            $this->rg = STRINGS::limpar($rg);
        } else {
            APP::return_response(false, "Favor informar o RG do técnico.");
        }
    }

    function setFormacao($formacao) {
        if (!empty($formacao)) {
            $this->formacao = STRINGS::limpar($formacao);
        } else {
            APP::return_response(false, "Favor informar o FORMAÇÃO do técnico.");
        }
    }

    function setAreaAtuacao($areaAtuacao) {
        if (!empty($areaAtuacao)) {
            $this->areaAtuacao = STRINGS::limpar($areaAtuacao);
        } else {
            APP::return_response(false, "Favor informar a ÁREA DE ATUAÇÃO.");
        }
    }

    function setEntidade($entidade) {
        if (!empty($entidade)) {
            $this->entidade = STRINGS::limpar($entidade);
        } else {
            APP::return_response(false, "Favor informar a ENTIDADE a qual pertence.");
        }
    }

    function setTelefone($telefone) {
        if (!empty($telefone)) {
            $this->telefone = STRINGS::limpar($telefone);
        } else {
            APP::return_response(false, "Favor informar o TELEFONE do técnico.");
        }
    }

    function setCelular($celular) {
        if (!empty($celular)) {
            $this->celular = STRINGS::limpar($celular);
        } else {
            APP::return_response(false, "Favor informar o CELULAR do técnico.");
        }
    }

    function setEmail($email) {
        if (!empty($email)) {
            $this->email = STRINGS::limpar($email);
        } else {
            APP::return_response(false, "Favor informar o E-MAIL do técnico.");
        }
    }

    function setObservacao($observacao) {
        $this->observacao = STRINGS::limpar($observacao);
    }

}
