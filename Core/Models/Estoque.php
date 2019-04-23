<?php

class Estoque {

    private $conn;
    private $filiado;

    function __construct() {
        $this->conn = DB::get_instance();
    }
    
    function get_filial_sessao() {
        $this->filial = $_SESSION['id_filiado'];
        return $this->filiado;
    }
    
    function list_estoque_filial($filiado){
        $query = "
            SELECT
                estoque_filiado.id_estoque_filiado as id_estoque,
                produtos.ncm_codigo,
                produtos.nome,
                produtos.ncm_descricao,
                estoque_filiado.quantidade,
                estoque_filiado.preco_unidade,
                medidas.descricao
            FROM
                estoque_filiado
            INNER JOIN produtos on produtos.id_produto = estoque_filiado.fk_produto
            INNER JOIN medidas on medidas.id_medida = estoque_filiado.fk_medida
            WHERE
                TRUE 
                AND fk_filiado = '{$filiado}'
                AND estoque_filiado.ativo = '1'
        ";
        return $this->conn->fetch_all($query);
    }
    
}
