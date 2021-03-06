<?php

namespace es\ucm;

require_once('includes/Integracion/HorarioClase/DAOHorarioClase.php');

class DAOHorarioClaseImplements implements DAOHorarioClase
{
    public static function listHorarioClase($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM horarioclase WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findHorarioClase($idHorarioClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM horarioclase WHERE IdHorarioClase = :idHorarioClase";
        $values = array(':idHorarioClase' => $idHorarioClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }
    public static function findHorarioClaseGrupoyDia($comparacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM horarioclase WHERE IdGrupoClase = :idGrupoClase AND Dia = :dia";
        $values = array(':idGrupoClase' => $comparacion[0], ':dia' => $comparacion[1]);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }
   
    public static function createHorarioClase($horarioClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO horarioclase (IdHorarioClase,Aula,Dia,HoraInicio,HoraFin,IdGrupoClase) 
        VALUES (:idHorarioClase, :aula, :dia, :horaInicio, :horaFin, :idGrupoClase)";
        $values = array(
            ':idHorarioClase' => $horarioClase->getIdHorarioClase(),
            ':aula' => $horarioClase->getAula(),
            ':dia' => $horarioClase->getDia(),
            ':horaInicio' => $horarioClase->getHoraInicio(),
            ':horaFin' => $horarioClase->getHoraFin(),
            ':idGrupoClase' => $horarioClase->getIdGrupoClase()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateHorarioClase($horarioClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE horarioclase SET IdHorarioClase = :idHorarioClase, Aula = :aula,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoClase = :idGrupoClase WHERE IdHorarioClase = :idHorarioClase";
        $values = array(
            ':idHorarioClase' => $horarioClase->getIdHorarioClase(),
            ':aula' => $horarioClase->getAula(),
            ':dia' => $horarioClase->getDia(),
            ':horaInicio' => $horarioClase->getHoraInicio(),
            ':horaFin' => $horarioClase->getHoraFin(),
            ':idGrupoClase' => $horarioClase->getIdGrupoClase()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteHorarioClase($idHorarioClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM horarioclase WHERE IdHorarioClase = :idHorarioClase";
        $values = array(':idHorarioClase' => $idHorarioClase);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
