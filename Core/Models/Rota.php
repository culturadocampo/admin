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
    private $matriz;
    private $publico;

    function select_rota() {
        $query = "
            SELECT
                matriz,
                conteudo,
                publico
            FROM rotas 
            WHERE TRUE
                AND url = '{$this->get_url()}'
                AND ativo = '1'
        ";
        return Database::fetch($query);
    }

    function select_all_permissoes() {
        $query = "
          SELECT
              id_permissao,
              descricao,
              COUNT(*) as qtde_rotas
          FROM permissoes
          INNER JOIN rotas ON id_permissao = fk_permissao
          GROUP BY id_permissao
        ";
        return Database::fetch_all($query);
    }

    function get_arquivos_base() {
        $dir = "Public/Matriz/";
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
        $conteudo = array();
        $dir = "Core/Rotas/";
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
        foreach ($iterator as $file) {
            if ($file->isDir())
                continue;
            $path = str_replace("\\", "/", $file->getPathname());
            $path = str_replace("Core/Rotas/", "", $path);
            array_push($conteudo, $path);
        }
        return $conteudo;
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

    function insert_rota() {
        $query = "
            INSERT INTO rotas
            (url, matriz, conteudo, publico)
            VALUES(
                '{$this->get_url()}',
                '{$this->get_matriz()}',
                '{$this->get_conteudo()}',
                '{$this->get_publico()}'
            )
        ";
        Database::execute($query);
    }

    function get_url() {
        return $this->url;
    }

    function get_conteudo() {
        return $this->conteudo;
    }

    function get_matriz() {
        return $this->matriz;
    }

    function get_publico() {
        return $this->publico;
    }

    function set_url($url) {
        $this->url = $url;
    }

    function set_conteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function set_matriz($matriz) {
        $this->matriz = $matriz;
    }

    function set_publico($publico) {
        $this->publico = $publico;
    }

}
