<?php


class Compras {

    private $conn;
    private $operador;
    private $fk_produtor;
    private $valor_total;
    private $status_compra;
    private $fk_filiado;

    function __construct() {
        $this->conn = DB::get_instance();
    }
    
    function get_fk_operador() {
        $this->operador = $_SESSION['id_usuario'];
        return $this->operador;
    }
    
    function get_fk_filiado() {
        $this->fk_filiado = $_SESSION['id_filiado'];
        return $this->fk_filiado;
    }
    
    function get_fk_produtor() {
        return $this->fk_produtor;
    }
    
    function get_valor_total() {
        return $this->valor_total;
    }
    
    function get_status_compra() {
        return $this->status_compra;
    }
    
    function set_fk_operador() {
        if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
            $this->operador = $_SESSION['id_usuario'];
        } else {
            APP::return_response(false, "Erro: Por favor relogue do sistema");
        }
    }
    
    function set_fk_filiado() {
        if (isset($_SESSION['id_filiado']) && !empty($_SESSION['id_filiado'])) {
            $this->fk_filiada = $_SESSION['id_filiado'];
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
    
    function set_status_compra($status) {
        if (isset($status) && !empty($status)) {
            if($status == "1"){
                $this->status_compra = "2";
            }else{
                $this->status_compra = "0";
            }
        } else {
            APP::return_response(false, "Por favor, selecione buscar o produto 'Sim' ou 'Não' ");
        }
    }
    
    function insert_nova_compra() {
        $query = "
            INSERT INTO
                compras
            (fk_operador, fk_produtor, fk_filiada, valor_total, status)
            VALUES 
            (
                '{$this->get_fk_operador()}',
                '{$this->get_fk_produtor()}',
                '{$this->get_fk_filiada()}',
                '{$this->get_valor_total()}',
                '{$this->get_status_compra()}'
            )
        ";
        $this->conn->execute($query);
        return $this->conn->last_id();
    }
    
    function select_todas_compras_filiado(){
        //  [id_filiado] => 4
        //  [id_usuario] => 168
        $query = "
            SELECT
                *
            FROM compras
            WHERE TRUE
                AND fk_filiado = '{$_SESSION['id_filiado']}'
            ORDER BY
               id_compra
        ";
        return $this->conn->fetch_all($query);
    }


}
