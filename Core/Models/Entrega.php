<?php

class Entrega {

    private $id_entrega;

    function select_minhas_entregas_pendentes() {
        $id_usuario_produto = SESSION::get_id_usuario();
        $query = "
            SELECT
                id_entrega,
                data_saida,
                status
            FROM entregas
            WHERE TRUE
                AND fk_usuario = '{$id_usuario_produto}'
       ";
        return DATABASE::fetch_all($query);
    }

    function select_entrega() {
        $query = "
            SELECT
                id_entrega,
                data_saida,
                status
            FROM entregas
            INNER JOIN produtores ON id_produtor = fk_produtor
            WHERE TRUE
                AND id_entrega = '{$this->get_id_entrega()}'
       ";
        return DATABASE::fetch($query);
    }

    function select_clientes_entrega() {
        $query = "
            SELECT
                id_usuario,
                nome
            FROM entregas
            INNER JOIN vendas ON id_entrega = fk_entrega
            INNER JOIN usuarios ON id_usuario = fk_usuario_cliente
            WHERE TRUE
                AND id_entrega = '{$this->get_id_entrega()}'
        ";
        return DATABASE::fetch_all($query);
    }

    function get_id_entrega() {
        return $this->id_entrega;
    }

    function set_id_entrega($id_entrega) {
        $this->id_entrega = STRINGS::limpar($id_entrega);
    }

}
