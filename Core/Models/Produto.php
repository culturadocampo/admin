<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Notheros
 */
class Produto {

    private $ncm_codigo;
    private $ncm_descricao;
    private $is_organico;
    private $is_hidroponico;

    function insert_produto_xml() {
        $query = "
            INSERT INTO produtos
            (ncm_codigo, ncm_descricao, organico, hidroponico)
            VALUES 
            (
            '{$this->get_ncm_codigo()}',
            '{$this->get_ncm_descricao()}',
            '{$this->is_organico()}',
            '{$this->is_hidroponico()}'
            )
        ";
        DATABASE::execute($query);
    }

    function select_produtos() {
        $query = "
            SELECT
                id_produto,
                nome,
                ncm_codigo,
                organico,
                hidroponico,
                categoria
            FROM produtos
            INNER JOIN categorias ON id_categoria = fk_categoria
            WHERE TRUE
                AND produtos.ativo = 1
                AND nome IS NOT NULL
            LIMIT 50
        ";
        return DATABASE::fetch_all($query);
    }

    function select_um_produto() {
        $query = "
            SELECT
                id_produto,
                nome,
                ncm_codigo,
                organico,
                hidroponico,
                categoria
            FROM produtos
            INNER JOIN categorias ON id_categoria = fk_categoria
            WHERE TRUE
                AND produtos.ativo = 1
                AND nome IS NOT NULL
                AND ncm_codigo = '{$this->get_ncm_codigo()}'
        ";
        return DATABASE::fetch($query);
    }

    function select_produtos_com_imagens() {
        $query = "
            SELECT
                ncm_codigo,
                ncm_descricao,
                url AS imagem
            FROM produtos
            INNER JOIN produtos_imagens ON fk_produto = id_produto 
            WHERE TRUE 
                AND produtos.ativo = 1
        ";
        return DATABASE::fetch_all($query);
    }

    function get_ncm_codigo() {
        return $this->ncm_codigo;
    }

    function get_ncm_descricao() {
        return $this->ncm_descricao;
    }

    function set_ncm_codigo($ncm_codigo) {
        $this->ncm_codigo = $ncm_codigo;
    }

    function set_ncm_descricao($ncm_descricao) {
        $this->ncm_descricao = STRINGS::limpar($ncm_descricao);
    }

    function is_organico() {
        return $this->is_organico;
    }

    function is_hidroponico() {
        return $this->is_hidroponico;
    }

    function set_is_organico($is_organico) {
        $this->is_organico = $is_organico;
    }

    function set_is_hidroponico($is_hidroponico) {
        $this->is_hidroponico = $is_hidroponico;
    }

}
