<?php
namespace es\ucm;
require_once('includes/Integracion/Grado/DAOGrado.php');

class DAOGradoImplements implements DAOGrado{


    public static function findGrado($codigoGrado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM grado WHERE CodigoGrado = :codigoGrado";
        $values=array(':codigoGrado' => $codigoGrado);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }


    public static function createGrado($grado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO grado (CodigoGrado,NombreGrado,CoordinadorGrado,Activo,HorasEcts) 
        VALUES (:codigoGrado, :nombreGrado, :coordinadorGrado,:activo, :horasEcts)";
        $values=array(':codigoGrado' => $grado->getCodigoGrado(),
            ':nombreGrado' => $grado->getNombreGrado(),
            ':coordinadorGrado' => $grado->getCoordinadorGrado(),
            ':activo'=> $grado->getActivo(),
            ':horasEcts' => $grado->getHorasEcts());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateGrado($grado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE grado SET CodigoGrado = :codigoGrado, NombreGrado = :nombreGrado,CoordinadorGrado = :coordinadorGrado,Activo = :activo,HorasEcts = :horasEcts WHERE CodigoGrado = :codigoGrado";
        $values=array(':codigoGrado' => $grado->getCodigoGrado(),
            ':nombreGrado' => $grado->getNombreGrado(),
            ':coordinadorGrado' => $grado->getCoordinadorGrado(),
            ':activo'=> $grado->getActivo(),
            ':horasEcts' => $grado->getHorasEcts());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteGrado($codigoGrado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM grado WHERE CodigoGrado = :codigoGrado";
        $values=array(':codigoGrado' => $codigoGrado);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function listGrado(){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM grado";
        $values =array();
        $results=$dataSource->executeQuery($sql, $values);
        return $results;
    }
}