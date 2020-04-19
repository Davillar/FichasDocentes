<?php
namespace es\ucm;
require_once('includes/Integracion/ProgramaAsignatura/DAOProgramaAsignatura.php');

class DAOProgramaAsignaturaImplements implements DAOProgramaAsignatura{


    public static function findProgramaAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM programaAsignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createProgramaAsignatura($programaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO programaAsignatura (IdPrograma,ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ConocimientosPreviosI,BreveDescripcionI,ProgramaDetalladoI,IdAsignatura) 
        VALUES (:idPrograma, :conocimientosPrevios, :breveDescripcion, :programaDetallado, :conocimientosPreviosI, :breveDescripcionI, :programaDetalladoI, :idAsignatura)";
        $values=array(':idPrograma' => $programaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $programaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $programaAsignatura->getProgramaDetalladoI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateProgramaAsignatura($programaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE programaAsignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ConocimientosPreviosI = :conocimientosPreviosI,BreveDescripcionI = :breveDescripcionI,ProgramaDetalladoI = :programaDetalladoI,IdAsignatura = :idAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $programaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $programaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $programaAsignatura->getProgramaDetalladoI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteProgramaAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM programaAsignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}