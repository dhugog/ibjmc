<?php

require BASE_URI . 'connection\ConnectionFactory.class.php';

class UsuarioDAO {
    private static $db_name = "ibjmc";
    private static $db_table = "usuarios";
    public static $lastId;
    
    public static function create(Usuario $user) {
        $con = ConnectionFactory::getConnection();
        $sql = "INSERT INTO " . self::$db_name . "." . self::$db_table . "(nome, email, senha, data_nascimento, sexo, membro) VALUES(:nome, :email, :senha, :data_nascimento, :sexo, :membro)";
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':nome', $user->getNome());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':senha', $user->getSenha());
            $stmt->bindValue(':data_nascimento', $user->getNasc());
            $stmt->bindValue(':sexo', $user->getSexo());
            $stmt->bindValue(':membro', $user->getMembro());
            $stmt->execute();
            self::$lastId = $con->lastInsertId();
            return true;
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . ".<br>Arquivo: " . $ex->getFile() . ".<br>Erro: " . $ex->getMessage() . ".<br>";
            }
            return false;
        }
    }
    
    public static function read($condition) {
        $con = ConnectionFactory::getConnection();
        $sql = "SELECT * FROM " . self::$db_name . "." . self::$db_table . " WHERE $condition";
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . ".<br>Arquivo: " . $ex->getFile() . ".<br>Erro: " . $ex->getMessage() . ".<br>";
            }
            return false;
        }
        
    }
    
    public static function update($values, $condition) {
        $con = ConnectionFactory::getConnection();
        $sql = "UPDATE " . self::$db_name . "." . self::$db_table . " SET $values WHERE $condition";
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . ".<br>Arquivo: " . $ex->getFile() . ".<br>Erro: " . $ex->getMessage() . ".<br>";
            }
            return false;
        }
    }
    
    public static function delete($id) {
        $con = ConnectionFactory::getConnection();
        $sql = "DELETE FROM " . self::$db_name . "." . self::$db_table . " WHERE id_usuario = $id";
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . ".<br>Arquivo: " . $ex->getFile() . ".<br>Erro: " . $ex->getMessage() . ".<br>";
            }
            return false;
        }
    }
    
    public static function checkReg(Usuario $user) {
        $con = ConnectionFactory::getConnection();
        $sql = "SELECT * FROM " . self::$db_name . "." . self::$db_table . " WHERE email = :email or senha = :senha";
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':senha', $user->getSenha());
            $stmt->execute();
            $rows = $stmt->rowCount();
            return $rows;
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . "<br>Arquivo: " . $ex->getFile() . "<br>Mensagem: " . $ex->getMessage() . "<br>";
            }
            return 2;
        }
    }
}
