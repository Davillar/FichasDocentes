<?php

namespace es\ucm;

require_once('includes/Integracion/Evaluacion/DAOModEvaluacion.php');

class DAOModEvaluacionImplements implements DAOModEvaluacion
{
    public static function findModEvaluacion($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modevaluacion WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModEvaluacion($modEvaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modevaluacion (RealizacionExamenes, RealizacionExamenesi, PesoExamenes, RealizacionActividades, RealizacionActividadesi, PesoActividades, RealizacionLaboratorio, RealizacionLaboratorioi, PesoLaboratorio, CalificacionFinal, CalificacionFinali, IdModAsignatura) 
        VALUES (:realizacionExamenes, :realizacionExamenesI, :pesoExamenes, :realizacionActividades, :realizacionActividadesI, :pesoActividades, :realizacionLaboratorio, :realizacionLaboratorioI, :pesoLaboratorio, :calificacionFinal, :calificacionFinalI, :idModAsignatura)";
        $values = array(
            ':realizacionExamenes' => $modEvaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $modEvaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $modEvaluacion->getPesoExamenes(),
            ':realizacionActividades' => $modEvaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $modEvaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $modEvaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $modEvaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorioI' => $modEvaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $modEvaluacion->getPesolaboratorio(),
            ':calificacionFinal' => $modEvaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $modEvaluacion->getCalificacionFinalI(),
            ':idModAsignatura' => $modEvaluacion->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModEvaluacion($modEvaluacion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modevaluacion SET IdEvaluacion = :idEvaluacion,
        RealizacionExamenes = :realizacionExamenes,
        RealizacionExamenesi = :realizacionExamenesI,
        PesoExamenes = :pesoExamenes,
        RealizacionActividades = :realizacionActividades,
        RealizacionActividadesi = :realizacionActividadesI,
        PesoActividades = :pesoActividades,
        RealizacionLaboratorio = :realizacionLaboratorio,
        RealizacionLaboratorioi = :realizacionLaboratorioI,
        PesoLaboratorio = :pesoLaboratorio,
        CalificacionFinal = :calificacionFinal,
        CalificacionFinali = :calificacionFinalI,
        IdModAsignatura = :idModAsignatura  WHERE IdModAsignatura = :idModAsignatura";
        $values = array(
            ':idEvaluacion' => $modEvaluacion->getIdEvaluacion(),
            ':realizacionExamenes' => $modEvaluacion->getRealizacionExamenes(),
            ':realizacionExamenesI' => $modEvaluacion->getRealizacionExamenesI(),
            ':pesoExamenes' => $modEvaluacion->getPesoExamenes(),
            ':realizacionActividades' => $modEvaluacion->getRealizacionActividades(),
            ':realizacionActividadesI' => $modEvaluacion->getRealizacionActividadesI(),
            ':pesoActividades' => $modEvaluacion->getPesoActividades(),
            ':realizacionLaboratorio' => $modEvaluacion->getRealizacionLaboratorio(),
            ':realizacionLaboratorioI' => $modEvaluacion->getRealizacionLaboratorioI(),
            ':pesoLaboratorio' => $modEvaluacion->getPesolaboratorio(),
            ':calificacionFinal' => $modEvaluacion->getCalificacionFinal(),
            ':calificacionFinalI' => $modEvaluacion->getCalificacionFinalI(),
            ':idModAsignatura' => $modEvaluacion->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModEvaluacion($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modevaluacion WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
