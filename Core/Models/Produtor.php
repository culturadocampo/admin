<?php

class Produtor {

    private $rg;
    private $sexo;
    private $cad_pro;
    private $data_nascimento;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_produtor_usuario($id_usuario) {
        $query = "
            INSERT INTO produtores
             (
                 fk_usuario, 
                 rg, 
                 cadpro, 
                 data_nascimento,
                 sexo
             )
             VALUES 
             (
                '{$id_usuario}',
                '{$this->get_rg()}',
                '{$this->get_cad_pro()}',
                '{$this->get_data_nascimento()}',
                '{$this->get_sexo()}'
             )                    
        ";
        $this->conn->execute($query);
    }

    function meus_dados() {
        $id_usuario = SESSION::get_id_usuario();

        $query = "
            SELECT
                nome, email, cpf, rg, cadpro, data_nascimento, sexo, fk_cidade, cep, bairro, rua, numero, complemento, cel_principal, cel_secundario
            FROM 
                usuarios
            INNER JOIN produtores ON produtores.fk_usuario = id_usuario 
            INNER JOIN enderecos  ON enderecos.fk_usuario  = id_usuario
            INNER JOIN telefones  ON telefones.fk_usuario  = id_usuario
            WHERE TRUE 
                AND id_usuario = '$id_usuario'
                
        ";
        return $this->conn->fetch($query);
    }

    function get_rg() {
        return $this->rg;
    }

    function get_sexo() {
        return $this->sexo;
    }

    function get_cad_pro() {
        return $this->cad_pro;
    }

    function get_data_nascimento() {
        return $this->data_nascimento;
    }

    function set_rg($rg) {
        if (VALIDA::rg($rg)) {
            $this->rg = STRINGS::limpar($rg);
        } else {
            APP::return_response(false, "Por favor, preencha o campo RG corretamente");
        }
    }

    function set_sexo($sexo) {
        if (isset($sexo)) {
            if ($sexo) {
                $this->sexo = STRINGS::limpar($sexo);
            } else {
                APP::return_response(false, "Por favor, preencha o campo SEXO corretamente");
            }
        } else {
            APP::return_response(false, "Por favor, preencha o campo SEXO corretamente");
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
        if ($data_nascimento) {
            $this->data_nascimento = STRINGS::limpar($data_nascimento);
        } else {
            APP::return_response(false, "Por favor, preencha o campo DATA DE NASCIMENTO corretamente");
        }
    }

    // public static function verifica_cadastro_produtor() {
    //     $query = "SELECT fk_usuario FROM produtores WHERE fk_usuario = '$_SESSION[id_usuario]' ";
    //     $retorno_prod = $this->conn->row_count($query);

    //     if ($retorno_prod != 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}
