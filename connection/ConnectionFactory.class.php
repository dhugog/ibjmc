<?php

class ConnectionFactory {
    protected static $db;
    
    public function __construct() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db_nome = "ibjmc";
        $driver = "mysql";
        
        $nome_sistema = "IBJMC";
        $email_sistema = "email@contato.com";
        
        try {
            self::$db = new PDO("$driver:host=$host; db_name=$db_nome", $user, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec('SET NAMES utf8');
        } catch (Exception $ex) {
            mail($email_sistema, "PDOException em $nome_sistema", $ex->getMessage());
            echo "Connection error: " . $ex->getMessage();
        }
    }
        
    public static function getConnection() {
        if(!self::$db) {
            new ConnectionFactory();
        }
        
        return self::$db;
    }
}

