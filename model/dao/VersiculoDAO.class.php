<?php

require BASE_URI . 'connection\ConnectionFactory.class.php';

class VersiculoDAO {
    private static $db_name = "ibjmc";
    private static $db_table = "versiculos";
    
    public static function create(Versiculo $vers) { 
        $con = ConnectionFactory::getConnection();
        if($vers->getDataExibicao() != null) {
            $sql = "INSERT INTO " . self::$db_name . "." . self::$db_table . "(versiculo, referencia, dataExibicao) VALUES(:versiculo, :referencia, :dataExibicao)";
        } else {
            $sql = "INSERT INTO " . self::$db_name . "." . self::$db_table . "(versiculo, referencia) VALUES(:versiculo, :referencia)";   
        }
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':versiculo', $vers->getVersiculo());
            $stmt->bindValue(':referencia', $vers->getReferencia());
            if ($vers->getDataExibicao() != null) {
                $stmt->bindValue(':dataExibicao', $vers->getDataExibicao());
            }
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . ".<br>Arquivo: " . $ex->getFile() . ".<br>Erro: " . $ex->getMessage() . ".<br>";
            }
            return false;
        }
    }
    
    public static function read($id_vers) {
        $con = ConnectionFactory::getConnection();
        $sql = "SELECT * FROM " . self::$db_name . "." . self::$db_table . " WHERE id_versiculo = :id";
        
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $id_vers);
            $stmt->execute();            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $ex) {
            if(!LIVE) {
                echo "<br>Linha: " . $ex->getLine() . ".<br>Arquivo: " . $ex->getFile() . ".<br>Erro: " . $ex->getMessage() . ".<br>";
            }
            return null;
        }
    }
}

