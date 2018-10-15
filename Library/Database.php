<?php

class Database {
    # Variável que guarda a conexão PDO.

    protected static $db;

    # Private construct - garante que a classe só possa ser instanciada internamente.

    private function __construct() {

        $db_host = "cultura.cuzewnrvgibv.sa-east-1.rds.amazonaws.com";
        $db_nome = "db_cultura";
        $db_usuario = "root";
        $db_senha = "INFODMZ626";
        $db_driver = "mysql";

        try {
            # Atribui o objeto PDO à variável $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }

    # Método estático - acessível sem instanciação.

    public static function conexao() {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db) {
            new Database();
        }
        # Retorna a conexão.
        return self::$db;
    }

    #Insert, Update, Delete e testa se o retorno é um objeto, para ter certeza que gravou no banco.

    public static function execute($query) {
        $db = Database::conexao();
        $sth = $db->prepare($query);
        $sth->execute();
        return Database::test_is_object($sth);
    }

    #Uso com apenas um array de resposta.

    public static function fetch($query) {
        $db = Database::conexao();
        $db = $db->query($query);
        return $db->fetch(PDO::FETCH_ASSOC);
    }

    #Uso com vários arrays de resposta.

    public static function fetch_all($query) {
        $db = Database::conexao();
        $db = $db->query($query);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    #Uso com apenas um array de resposta, podendo escolher uma coluna por parametro int (0,1,2,3).

    public static function fetch_column($query, $coluna = false) {
        $db = Database::conexao();
        $db = $db->query($query);
        return $db->fetchColumn($coluna);
    }

    #Retorna a quantidade de linhas na busca.

    public static function row_count($query) {
        $db = Database::conexao();
        $db = $db->query($query);
        return $db->rowCount();
    }

    #Testa se o retorno é um objeto, para ter certeza que gravou no banco.

    public static function test_is_object($result) {
        if (is_object($result)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
