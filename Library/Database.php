<?php

class Database {

    protected static $db;

    private function __construct() {
        $db_host = "localhost";
        $db_nome = "db_cultura";
        $db_usuario = "postgres";
        $db_senha = "infodmz626";
        $db_driver = "pgsql";
        # Informações sobre o sistema:
        $sistema_titulo = "Cultura do Campo";
        $sistema_email = "app.culturadocampo@gmail.com";

        try {
            # Atribui o objeto PDO à variável $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exce��es durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codifica��o UFT-8.
            self::$db->exec();
        } catch (PDOException $e) {
            # Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conex�o.
          //  mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
            # Então não carrega nada mais da página.
            die("Connection Error: " . $e->getMessage());
        }
    }

    # M�todo est�tico - acess�vel sem instancia��o.

    public static function conexao() {
        # Garante uma �nica instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db) {
            new Database();
        }
        # Retorna a conexão.
        return self::$db;
    }

    public static function fetch($query) {
        $db = Database::conexao();
        $db = $db->query($query);
        if ($db->fetch()) {
            return $db->fetch();
        } else {
            return false;
        }
    }

}


//    public static function fetch($query) {
//        $db = Database::conexao();
//        $db = $db->query($query);
//        if ($db->fetch()) {
//            return $db->fetch();
//        } else {
//            return false;
//        }
//    }
