<?php


class Compras {

    private $conn;
    private $operador;
    private $fk_produtor;
    private $valor_total;

    function __construct() {
        $this->conn = DB::get_instance();
    }
    
    function get_fk_operador() {
        $this->operador = $_SESSION['id_usuario'];
        return $this->operador;
    }
    
    function get_fk_produtor() {
        return $this->fk_produtor;
    }
    
    function get_valor_total() {
        return $this->valor_total;
    }
    
    function set_fk_operador() {
        if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
            $this->operador = $_SESSION['id_usuario'];
        } else {
            APP::return_response(false, "Erro: Por favor relogue do sistema");
        }
    }
    
    function set_fk_produtor($produtor) {
        if (isset($produtor) && !empty($produtor)) {
            $this->fk_produtor = $produtor;
        } else {
            APP::return_response(false, "Selecione o produtor");
        }
    }
    
    function set_valor_total($valor_total) {
        if (isset($valor_total) && !empty($valor_total)) {
            $this->valor_total = $valor_total;
        } else {
            APP::return_response(false, "Erro: Sem valor total");
        }
    }
    
    function insert_nova_compra() {
        $query = "
            INSERT INTO
                compras
            (fk_operador, fk_produtor, valor_total)
            VALUES 
            (
                '{$this->get_fk_operador()}',
                '{$this->get_fk_produtor()}',
                '{$this->get_valor_total()}'
            )
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
    }


}
