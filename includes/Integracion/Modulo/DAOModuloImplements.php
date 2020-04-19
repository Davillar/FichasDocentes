<?php
namespace es\ucm;

require_once('includes/Integracion/Modulo/DAOModulo.php');

class DAOModuloImplements implements DAOModulo{
    
    
    public static function findModulo($idModulo){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modulo WHERE IdModulo = :idModulo";
        $values=array(':idModulo' => $idModulo);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModulo($Modulo){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modulo (IdModulo, NombreModulo, Caracter, CodigoGrado) 
        VALUES (:idModulo, :nombreModulo, :caracter, :codigoGrado)";
        $values=array(':idModulo' => $Modulo->getIdModulo(),
        ':nombreModulo' => $Modulo->getNombreModulo(),
        ':caracter' => $Modulo->getCaracter(),
        ':codigoGrado' => $Modulo->getCodigoGrado());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateModulo($Modulo){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modulo SET IdModulo = :idModulo, NombreModulo = :nombreModulo, Caracter = :caracter, CodigoGrado = :codigoGrado WHERE IdModulo = :idModulo";
        $values=array(':idModulo' => $Modulo->getIdModulo(),
        ':nombreModulo' => $Modulo->getNombreModulo(),
        ':caracter' => $Modulo->getCaracter(),
        ':codigoGrado' => $Modulo->getCodigoGrado());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteModulo($idModulo){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modulo WHERE IdModulo = :idModulo";
        $values=array(':idModulo' => $idModulo);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}