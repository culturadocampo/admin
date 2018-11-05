<?php

class SEGURANCA {
    
    private static function chave() {
        return "X5aa65ag@dfeL65836A";
        
    }
    public static function executar_criptografia($senha) {
        $chave = SEGURANCA::chave();
        return base64_encode($senha.$chave.$senha);
    }

}
