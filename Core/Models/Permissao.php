<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Permissao
 *
 * @author Notheros
 */
class Permissao {

    private $id_permissao;
    private $descricao;
    private $ativo;

    function insert_permissao() {
        $query = "
            INSERT INTO permissoes
            (descricao)
            VALUES('{$this->get_descricao()}')
        ";
        DATABASE::execute($query);
        return DATABASE::last_id();
    }

    function select_all_permissoes() {
        $query = "
            SELECT
                id_permissao,
                permissoes.descricao,
                permissoes.data,
                GROUP_CONCAT(tipos_usuario.nome) AS usuarios
            FROM permissoes
            LEFT JOIN permissoes_tipos_usuario ON id_permissao = fk_permissao
            LEFT JOIN tipos_usuario ON fk_tipo_usuario = id_tipo_usuario
            WHERE TRUE
            GROUP BY id_permissao
        ";
        return DATABASE::fetch_all($query);
    }

    function insert_permissao_usuario($id_permissao, $tipo_usuario) {
        $query = "
            INSERT INTO permissoes_tipos_usuario
            (fk_permissao, fk_tipo_usuario)
            VALUES('{$id_permissao}', '{$tipo_usuario}')
        ";
        DATABASE::execute($query);
    }

    function insert_permissao_rota($id_permissao, $id_rota) {
        $query = "
            INSERT INTO permissoes_rotas
            (fk_permissao, fk_rota)
            VALUES('{$id_permissao}', '{$id_rota}')
        ";
        DATABASE::execute($query);
    }

    function delete_permissoes_rota($id_rota) {
        $query = "
            DELETE FROM permissoes_rotas
            WHERE fk_rota = '{$id_rota}'
        ";
        DATABASE::execute($query);
    }

    function delete_rotas_permissao() {
        $query = "
            DELETE FROM permissoes_rotas
            WHERE fk_permissao = '{$this->get_id_permissao()}'
        ";
        DATABASE::execute($query);
    }

    function delete_tipos_usuario_permissao() {
        $query = "
            DELETE FROM permissoes_tipos_usuario
            WHERE fk_permissao = '{$this->get_id_permissao()}'
        ";
        DATABASE::execute($query);
    }

    function select_permissao() {
        $query = "
            SELECT 
                descricao,
                ativo
            FROM permissoes
            WHERE id_permissao = '{$this->get_id_permissao()}'
        ";
        return DATABASE::fetch($query);
    }

    function select_tipos_usuario_permissao() {
        $query = "
            SELECT 
                group_concat(fk_tipo_usuario) AS ids
            FROM permissoes_tipos_usuario
            WHERE fk_permissao = '{$this->get_id_permissao()}'
        ";
        return DATABASE::fetch($query);
    }

    function select_rotas_permissao() {
        $query = "
            SELECT 
                group_concat(id_rota) AS ids
            FROM rotas
            INNER JOIN permissoes_rotas ON fk_rota = id_rota
            WHERE fk_permissao = '{$this->get_id_permissao()}'
        ";
        return DATABASE::fetch($query);
    }

    function update_permissao() {
        $query = "
            UPDATE permissoes
            SET 
                descricao           = '{$this->get_descricao()}',
                ativo               = '{$this->is_ativo()}'
            WHERE TRUE
                AND id_permissao    = '{$this->get_id_permissao()}'
        ";
        DATABASE::execute($query);
    }

    function select_tipos_usuario() {
        $query = "
            SELECT id_tipo_usuario, nome
            FROM tipos_usuario
            WHERE ativo = 1
        ";
        return DATABASE::fetch_all($query);
    }

    function get_id_permissao() {
        return $this->id_permissao;
    }

    function set_id_permissao($id_permissao) {
        $this->id_permissao = STRINGS::limpar($id_permissao);
    }

    function get_descricao() {
        return $this->descricao;
    }

    function set_descricao($descricao) {
        if ($descricao) {
            $this->descricao = STRINGS::limpar($descricao);
        } else {
            APP::return_response(false, "Informe a descrição da permissão");
        }
    }

    function is_ativo() {
        return $this->ativo;
    }

    function set_ativo($ativo) {
        if ($ativo) {
            $this->ativo = STRINGS::limpar($ativo);
        } else {
            APP::return_response(false, "Informe o status da permissão");
        }
    }

}
