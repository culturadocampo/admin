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
        $query = "
            SELECT 
                fk_usuario AS id_usuario
            FROM login_cookies
            WHERE TRUE
                AND token = '{$token}'
        ";
        return DATABASE::fetch($query);
    }

    function insert_cookie($token, $id_usuario) {
        $query = "
            INSERT INTO login_cookies
            (fk_usuario, token)
            VALUES 
            (
                '{$id_usuario}',
                '{$token}'
            )
        ";
        DATABASE::execute($query);
    }

    function delete_cookies_from_user($id_usuario) {
        $query = "
            DELETE
            FROM login_cookies
            WHERE fk_usuario = '{$id_usuario}'
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
