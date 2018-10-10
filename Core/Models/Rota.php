<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rota
 *
 * @author Notheros
 */
class Rota {

    private $url;
    private $conteudo;

    function select_rota() {
        $query = "
            SELECT
                base,
                conteudo,
                privado,
                ajax
            FROM rotas 
            WHERE TRUE
                AND url = '{$this->get_url()}'
                AND ativo = '1'
        ";
        return Database::fetch($query);
    }

    function get_arquivos_base() {
        $dir = "Core/Views/Base/";
        $filelist = scandir($dir);
        foreach ($filelist as $key => $file) {
            if (!is_file($dir . $file)) {
                unset($filelist[$key]);
            }
        }
        $filelist = array_values($filelist);
        return $filelist;
    }

    function get_arquivos_conteudo() {
        $dir = "Core/Views/Conteudo/";
        $filelist = scandir($dir);
        foreach ($filelist as $key => $file) {
            if (!is_file($dir . $file)) {
                unset($filelist[$key]);
            }
        }
        $filelist = array_values($filelist);
        return $filelist;
    }

    function select_conteudo() {
        $query = "
            SELECT
                id_rota
            FROM rotas 
            WHERE TRUE
                AND conteudo = '{$this->get_conteudo()}'
                AND ativo = '1'
        ";
        return Database::fetch($query);
    }

    function get_url() {
        return $this->url;
    }

    function get_conteudo() {
        return $this->conteudo;
    }

    function set_url($url) {
        $this->url = $url;
    }

    function set_conteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

}
