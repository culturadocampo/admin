<?php


class ARRAYS {

    static public function utf8_encode_deep(&$array) {
        if (is_string($array)) {
            $array = utf8_encode($array);
        } else if (is_array($array)) {
            foreach ($array as &$value) {
                self::utf8_encode_deep($value);
            }
            unset($value);
        } else if (is_object($array)) {
            $vars = array_keys(get_object_vars($array));
            foreach ($vars as $var) {
                self::utf8_encode_deep($array->$var);
            }
        }
    }

}
