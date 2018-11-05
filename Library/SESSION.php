<?php

class SESSION {

    static function get_id_usuario() {
        if (isset($_SESSION['id_usuario']) && is_numeric($_SESSION['id_usuario'])) {
            return STRINGS::limpar($_SESSION['id_usuario']);
        } else {
            return false;
        }
    }

}
