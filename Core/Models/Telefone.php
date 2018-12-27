<?php

class Telefone {

    private $celPrincipal;
    private $celSecundario;
    private $telFixo;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_telefone($id_usuario) {
        $query = "
            INSERT INTO telefones
             (
                fk_usuario, 
                cel_principal, 
                cel_secundario, 
                tel_fixo
            )
            VALUES (
                '{$id_usuario}',
                '{$this->get_celPrincipal()}',
                '{$this->get_celSecundario()}',
                '{$this->get_telFixo()}'
             )";
        $this->conn->execute($query);
    }

    function get_celPrincipal() {
        return $this->celPrincipal;
    }

    function get_celSecundario() {
        return $this->celSecundario;
    }

    function get_telFixo() {
        return $this->telFixo;
    }

    function set_celPrincipal($celPrincipal) {
        if ($celPrincipal) {
            $this->celPrincipal = STRINGS::limpar($celPrincipal);
        } else {
            APP::return_response(false, "Favor informar o nº do CEL. PRINCIPAL");
        }
    }

    function set_celSecundario($celSecundario) {
        $this->celSecundario = STRINGS::limpar($celSecundario);
    }

    function set_telFixo($telFixo) {
        $this->telFixo = STRINGS::limpar($telFixo);
    }

}
