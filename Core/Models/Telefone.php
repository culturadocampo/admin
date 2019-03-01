<?php

class Telefone {

    private $conn;
    private $telefone;
    private $tipoTelefone;

    function __construct() {
        $this->conn = DB::get_instance();
    }

    function insert_telefone($id_usuario) {
        $query = "
            INSERT INTO usuarios_telefones
             (
                fk_usuario, 
                tipo_telefone, 
                telefone
            )
            VALUES (
                '{$id_usuario}',
                '{$this->getTipoTelefone()}',
                '{$this->getTelefone()}'
             )";
        $this->conn->execute($query);
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function getTipoTelefone() {
        return $this->tipoTelefone;
    }

    function setTipoTelefone($tipoTelefone) {
        $this->tipoTelefone = $tipoTelefone;
    }

}
