<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application
 *
 * @author Notheros
 */
class Application {

    static function start() {
        $o_roteador = new Roteador();
        $o_roteador->include_file();
    }

 
}
