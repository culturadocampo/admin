<?php

class Produtor {

    private $fk_usuario;
    private $cpf;
    private $rg;
    private $cad_pro;
    private $data_nascimento;

    public function estados() {
        $query = "SELECT * FROM estados";
        return DATABASE::fetch_all($query);
    }

    public function cidades() {
        $query = "SELECT id_municipio, nome, uf FROM municipios";
        return DATABASE::fetch_all($query);
    }

    function insert_produtor_usuario() {
        $query = "
            INSERT INTO produtores
             (
                 fk_usuario, 
                 cpf, 
                 rg, 
                 cadpro, 
                 data_nascimento
             )
             VALUES 
             (
               '{$this->get_id_usuario()}',
                '{$this->get_cpf()}',
                '{$this->get_rg()}',
                '{$this->get_cad_pro()}',
                '{$this->get_data_nascimento()}'
             )                    
        ";
        DATABASE::execute($query);
    }

    function get_id_usuario() {
        if ($_SESSION['id_usuario']) {
            return STRINGS::limpar($_SESSION['id_usuario']);
        } else {
            APP::return_response(false, "Ocorreu um erro. Cód: 001");
        }
    }

    function get_cpf() {
        return $this->cpf;
    }

    function get_rg() {
        return $this->rg;
    }

    function get_cad_pro() {
        return $this->cad_pro;
    }

    function get_data_nascimento() {
        return $this->data_nascimento;
    }

    function set_cpf($cpf) {
        if (VALIDA::cpf($_POST['cpf'])) {
            $this->cpf = STRINGS::limpar($cpf);
        } else {
            APP::return_response(false, "Por favor, preencha o campo CPF corretamente");
        }
    }

    function set_rg($rg) {
        if (VALIDA::rg($rg)) {
            $this->rg = STRINGS::limpar($rg);
        } else {
            APP::return_response(false, "Por favor, preencha o campo RG corretamente");
        }
    }

    function set_cad_pro($cad_pro) {
        if ($cad_pro) {
            $this->cad_pro = STRINGS::limpar($cad_pro);
        } else {
            APP::return_response(false, "Por favor, preencha o campo CAD/PRO corretamente");
        }
    }

    function set_data_nascimento($data_nascimento) {
        if (VALIDA::data($data_nascimento)) {
            $data_nascimento = STRINGS::limpar($data_nascimento);
            $data_nascimento = DATA::date_to_mysql($data_nascimento);
            $this->data_nascimento = $data_nascimento;
        } else {
            APP::return_response(false, "Por favor, preencha o campo DATA DE NASCIMENTO corretamente");
        }
    }

}
