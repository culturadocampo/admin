<?php

class ContaBancaria {
    
    private $conn;
    private $banco;
    private $agencia;
    private $conta;
    

    function __construct() {
        $this->conn = DB::get_instance();
    }
    
     function getBanco() {
        return $this->banco;
    }
    
     function getAgencia() {
        return $this->agencia;
    }
    
     function getConta() {
        return $this->conta;
    }
    
    function setBanco($banco) {
        if(!empty($banco)){
           $this->banco = $banco;
        }
    }
    
    function setAgencia($agencia) {
        if(!empty($agencia)){
            $this->agencia = $agencia;
        }
    }
    
    function setConta($conta) {
        if(!empty($conta)){
            $this->conta = $conta;
        }
    }
    
    function insertContaBancaria($fk_fornecedor){
        $query = "
            INSERT INTO 
                contas_bancarias
            (fk_fornecedor, banco, agencia, conta)
            VALUES(
                '{$fk_fornecedor}',
                '{$this->getBanco()}',
                '{$this->getAgencia()}',
                '{$this->getConta()}'
            )
        ";
        $this->conn->execute($query);
    }
}
