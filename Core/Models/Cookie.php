<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cookie
 *
 * @author Notheros
 */
class Cookie {

    function is_cookie_new($token) {
        $query = "
            SELECT 
                id_cookie
            FROM login_cookies
            WHERE token = '{$token}'
        ";
        $result = DATABASE::fetch($query);
        if (!empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    function get_usuario_from_cookie($token) {
        $current_time = date("Y-m-d H:i:s");
        $query = "
            SELECT 
                fk_usuario AS id_usuario
            FROM login_cookies
            WHERE TRUE
                AND token = '{$token}'
                AND '{$current_time}' BETWEEN inicio AND fim
        ";
        return DATABASE::fetch($query);
    }

    function insert_cookie($token, $id_usuario) {
        $lifetime = LOGIN_COOKIE_LIFETIME;
        $inicio = date("Y-m-d H:i:s");
        $fim = date("Y-m-d H:i:s", strtotime("+$lifetime sec"));
        $query = "
            INSERT INTO login_cookies
            (fk_usuario, token, inicio, fim)
            VALUES 
            (
                '{$id_usuario}',
                '{$token}',
                '{$inicio}',
                '{$fim}'
            )
        ";
        DATABASE::execute($query);
    }

    function delete_cookie($token) {
        $query = "
            DELETE FROM login_cookies
            WHERE TRUE
                AND token = '{$token}'
        ";
        DATABASE::execute($query);
    }

}
