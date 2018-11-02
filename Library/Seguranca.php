<?php

class Seguranca {
    private static function chave() {
        return "X5aa65ag@dfeL65836A";
        
    }
    public static function executar_criptografia($senha) {
        $chave = Seguranca::chave();
        return base64_encode($senha.$chave.$senha);
    }

}
