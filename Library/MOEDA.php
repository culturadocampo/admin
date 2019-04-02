<?php

class MOEDA {

    static function moeda_br_para_mysql($valor) {
        $valor2 = str_replace('.', '', $valor);
        return str_replace(',', '.', $valor2);
    }
    
    static function moeda_mysql_para_br($valor){
        return number_format($valor, 2, ',', '.');
    }
}
