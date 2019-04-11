<?php

class PagamentoAgricultor {
    
    private $conn;
    private $data_pagamento;
    private $obs_pagamento;

    function __construct() {
        $this->conn = DB::get_instance();
    }
    
    function get_data_pagamento() {
        return $this->data_pagamento;
    }
    
    function get_obs_pagamento() {
        return $this->obs_pagamento;
    }
    
    function set_data_pagamento($data_pagamento) {
        if (isset($data_pagamento) && !empty($data_pagamento)) {
            $this->data_pagamento = $data_pagamento;
        } else {
            APP::return_response(false, "Por favor, selecione a data de pagamento");
        }
    }
    
    function set_obs_pagamento($obs_pagamento) {
        if (isset($obs_pagamento) && !empty($obs_pagamento)) {
            $this->obs_pagamento = $obs_pagamento;
        } else {
            $this->obs_pagamento = false;
        }
    }
    
    function insert_pagamento_agricultor($fk_compra, $valor_total){
        $fk_filiado  = SESSION::get_id_filiado();
        
        $query = "
            INSERT INTO
                pagamentos_agricultores
            (fk_filiado, fk_compra, data_pagamento, obs, valor_total, valor_atual)
            VALUES 
            (
                '{$fk_filiado}',
                '{$fk_compra}',
                '{$this->get_data_pagamento()}',
                '{$this->get_obs_pagamento()}',
                '{$valor_total}',
                '{$valor_total}'
            )
        ";
        $this->conn->execute($query);
        return true;
    }
    
    function select_pagamento_especifico($id){
        $query = "
            SELECT
                *
            FROM pagamentos_agricultores
            WHERE TRUE
                AND fk_compra = '{$id}'
                AND ativo = '1'
        ";
        return $this->conn->fetch($query);
    }

}
