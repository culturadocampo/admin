<?php

class MOEDA {

    static function moeda_eua_para_br($valor) {
        return number_format($valor, 2, ',', '.');
    }
    
    static function moeda_br_para_eua($valor) {
        return number_format($valor, 2, '.', ',');
    }
}
