<?php


class Usuario {
    
    private $usuario;
    private $senha;
    
    
    function select_usuario_login(){
        
    }
    
    
    function get_usuario() {
        return $this->usuario;
    }

    function get_senha() {
        return $this->senha;
    }

    function set_usuario($usuario) {
        $this->usuario = $usuario;
    }

    function set_senha($senha) {
        $this->senha = $senha;
    }


    
}
