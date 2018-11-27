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

    private $descricao;

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
            INNER JOIN permissoes_tipos_usuario ON id_permissao = fk_permissao
            INNER JOIN tipos_usuario ON fk_tipo_usuario = id_tipo_usuario
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

}
