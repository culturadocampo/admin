<?php

class Estoque {

    private $conn;

    function __construct() {
        $this->conn = DB::get_instance();
    }
}
