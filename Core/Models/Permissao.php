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

    function select_all_permissoes() {
        $query = "
            SELECT
                id_permissao,
                descricao,
                data
            FROM permissoes
            WHERE TRUE
        ";
        return DATABASE::fetch_all($query);
    }

}
