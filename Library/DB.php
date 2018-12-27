<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DB {

    protected static $instance;
    protected $link;

    protected function __construct() {
        $db_nome = "db_cultura";
        $db_usuario = "root";
        $db_senha = "INFODMZ626";
        if (empty($this->link)) {
            $db_info = array(
                "db_port" => "3306",
                "db_user" => "$db_usuario",
                "db_pass" => "$db_senha",
                "db_name" => "$db_nome",
                "db_charset" => "UTF-8");
            try {
                $this->link = new PDO("mysql:host=" . CONFIG::$DATABASE_HOST . ';port=3306;dbname=' . $db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
                $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->link->query('SET NAMES utf8');
                $this->link->query('SET CHARACTER SET utf8');
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }
    }

    static function get_instance() {
        if (!isset(self::$instance)) {
            $c = new DB();
            self::$instance = $c;
        }
        return self::$instance;
    }

    function execute($query) {
        $sth = $this->link->prepare($query);
        $sth->execute();
    }

    function fetch($query) {
        $sth = $this->link->query($query);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    function fetch_all($query) {
        $sth = $this->link->query($query);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function row_count($query) {
        $sth = $this->link->query($query);
        return $sth->rowCount();
    }

    function last_id() {
        $sth = $this->link->query("SELECT LAST_INSERT_ID()");
        return $sth->fetchColumn();
    }

}
