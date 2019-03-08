<?php

class SESSION {

    static function get_id_usuario() {
        if (isset($_SESSION['id_usuario']) && is_numeric($_SESSION['id_usuario'])) {
            return STRINGS::limpar($_SESSION['id_usuario']);
        } else {
            return false;
        }
    }

    static function get_nome_usuario() {
        if (isset($_SESSION['nome_usuario'])) {
            return STRINGS::proper_case($_SESSION['nome_usuario']);
        } else {
            return false;
        }
    }

    static function get_email_usuario() {
        if (isset($_SESSION['email_usuario'])) {
            return $_SESSION['email_usuario'];
        } else {
            return false;
        }
    }

    static function get_id_tipo_usuario() {
        if (isset($_SESSION['id_tipo_usuario'])) {
            return $_SESSION['id_tipo_usuario'];
        } else {
            return false;
        }
    }

    static function get_tipo_usuario() {
        if (isset($_SESSION['tipo_usuario'])) {
            return $_SESSION['tipo_usuario'];
        } else {
            return false;
        }
    }

    static function get_permissoes() {
        if (isset($_SESSION['permissoes'])) {
            return explode(',', $_SESSION['permissoes']);
        } else {
            return false;
        }
    }
    
}
