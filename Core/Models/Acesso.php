<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acesso
 *
 * @author Notheros
 */
class Acesso {

    function insert_acesso($id_rota) {
        $id_usuario = SESSION::get_id_usuario();
        $query = "
            INSERT INTO acessos
            (fk_usuario, fk_rota)
            VALUES('{$id_usuario}', '{$id_rota}')   
        ";
        DATABASE::execute($query);
    }

}
