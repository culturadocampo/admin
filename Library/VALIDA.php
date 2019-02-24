<?php

class VALIDA {

    static function cpf($cpf) {
        if (empty($cpf)) {
            return false;
        }
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    static function rg($rg) {
        if ($rg && is_numeric($rg)) {
            return true;
        } else {
            return false;
        }
    }

    static function data($data) {
        if ($data) {
            $data = explode('/', $data);
            if (checkdate($data[1], $data[0], $data[2])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function existe_cpf($cpf) {
        $conn = DB::get_instance();
        $query = "
            SELECT 
                cpf
            FROM 
                usuarios
            WHERE TRUE
                AND cpf = '{$cpf}'
        ";
        $row = $conn->row_count($query);

        if ($row != 0) {
            return true;
        } else {
            return false;
        }
    }

    static function existe_email($email) {
        $conn = DB::get_instance();
        $query = "
            SELECT 
                email
            FROM 
                usuarios
            WHERE TRUE
                AND email = '{$email}'
        ";
        $row = $conn->row_count($query);

        if ($row != 0) {
            return true;
        } else {
            return false;
        }
    }

    static function existe_usuario($usuario) {
        $conn = DB::get_instance();
        $query = "
            SELECT 
                usuario
            FROM 
                usuarios
            WHERE TRUE
                AND usuario = '{$usuario}'
        ";
        $row = $conn->row_count($query);

        if ($row != 0) {
            return true;
        } else {
            return false;
        }
    }

    static function is_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}
