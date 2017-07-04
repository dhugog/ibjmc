<?php

require_once BASE_URI . 'connection\ConnectionFactory.class.php';

class VersiculoDAO {
    
    public static function create(Versiculo $vers) { 
        $con = ConnectionFactory::getConnection();
        if($vers->getDataExibicao() != null) {
            $query = "INSERT INTO ibjmc.versiculos(versiculo, referencia, dataExibicao) VALUES(:versiculo, :referencia, :dataExibicao)";
        } else {
            $query = "INSERT INTO ibjmc.versiculos(versiculo, referencia) VALUES(:versiculo, :referencia)";   
        }
        
        try {
            $stmt = $con->prepare($query);
            $stmt->bindValue(':versiculo', $vers->getVersiculo());
            $stmt->bindValue(':referencia', $vers->getReferencia());
            if ($vers->getDataExibicao() != null) {
                $stmt->bindValue(':dataExibicao', $vers->getDataExibicao());
            }
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            echo "<br>Erro ao inserir dados.<br>Linha: " . $ex->getLine() . "<br>Classe: " . $ex->getFile() . "<br>Mensagem: " . $ex->getMessage() . "<br>";
            return false;
        }
    }
    
    public static function read($id_vers) {
        $con = ConnectionFactory::getConnection();
        $query = "SELECT * FROM ibjmc.versiculos WHERE id_versiculo = :id";
        
        try {
            $stmt = $con->prepare($query);
            $stmt->bindValue(':id', $id_vers);
            $stmt->execute();            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (Exception $ex) {
            echo "<br>Erro ao ler dados.<br>Linha: " . $ex->getLine() . "<br>Classe: " . $ex->getFile() . "<br>Mensagem: " . $ex->getMessage() . "<br>";
        }
    }
}

