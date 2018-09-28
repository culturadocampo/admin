<?php

class Database{
    # Vari�vel que guarda a conex�o PDO.
    protected static $db;
    # Private construct - garante que a classe s� possa ser instanciada internamente.
    private function __construct(){
        # Informa��es sobre o banco de dados:
        $db_host = "localhost";
        $db_nome = "CdoC";
        $db_usuario = "root";
        $db_senha = "infodmz626";
        $db_driver = "mysql";
        # Informa��es sobre o sistema:
        $sistema_titulo = "Cultura do Campo";
        $sistema_email = "app.culturadocampo@gmail.com";
       
        try{
            # Atribui o objeto PDO � vari�vel $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exce��es durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codifica��o UFT-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e){
            # Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conex�o.
            mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
            # Ent�o n�o carrega nada mais da p�gina.
            die("Connection Error: " . $e->getMessage());
        }
    }
    # M�todo est�tico - acess�vel sem instancia��o.
    public static function conexao(){
        # Garante uma �nica inst�ncia. Se n�o existe uma conex�o, criamos uma nova.
        if (!self::$db){
            new Database();
        }
        # Retorna a conex�o.
        return self::$db;
    }
    public static function fetch($query){
        $db = Database::conexao();
        $db = $db->query($query);  
        if($db->fetch()){
            return $db->fetch();
        }else{
            return false;
        }
    }
}

 