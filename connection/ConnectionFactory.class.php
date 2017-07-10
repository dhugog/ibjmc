<?php

class ConnectionFactory {
    protected static $db;
    
    public function __construct() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db_name = "ibjmc";
        $driver = "mysql";
        
        $nome_sistema = "IBJMC";
        $email_sistema = "email@contato.com";
        
        try {
            self::$db = new PDO("$driver:host=$host; db_name=$db_name", $user, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec('SET NAMES utf8');
        } catch (Exception $ex) {
            mail($email_sistema, "PDOException em $nome_sistema", $ex->getMessage());
            if(LIVE) {
                echo "Ocorreu um erro na conexão. Desculpe-nos o transtorno.";
            } else {
                echo "Connection error: " . $ex->getMessage();
            }
        }
    }
        
    public static function getConnection() {
        if(!self::$db) {
            new ConnectionFactory();
        }
        
        return self::$db;
    }
}

