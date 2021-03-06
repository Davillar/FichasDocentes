<?php

namespace es\ucm;


require_once('includes/Negocio/Comparacion/SAComparacion.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAComparacionImplements implements SAComparacion
{

    public static function comparacion($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactorySAImplements();
        $DAO = $factoriesDAO->createSAConfiguracion();
        $configuracion = $DAO->findConfiguracion($idAsignatura);
        $comparacion = array(
            'conocimientosPrevios' => false,
            'conocimientosPreviosI' => false,
            "BreveDescripcion" => false,
            "BreveDescripcionI" => false,
            "ProgramaTeorico" => false,
            "ProgramaTeoricoI" => false,
            "ProgramaSeminarios" => false,
            "ProgramaSeminariosI" => false,
            "ProgramaLaboratorio" => false,
            "ProgramaLaboratorioI" => false,
            "ComGenerales" => false,
            "ComGeneralesI" => false,
            "ComEspecificas" => false,
            "ComEspecificasI" => false,
            "ComBasicas" => false,
            "ComBasicasI" => false,
            "ResultadosAprendizaje" => false,
            "ResultadosAprendizajeI" => false,
            "Metodologia" => false,
            "MetodologiaI" => false,
            "CitasBibliograficas" => false,
            "RecursosInternet" => false,
            "RealizacionExamenes" => false,
            "RealizacionExamenesI" => false,
            "CalificacionFinal" => false,
            "CalificacionFinalI" => false,
            "RealizacionActividades" => false,
            "RealizacionActividadesI" => false,
            "RealizacionLaboratorio" => false,
            "RealizacionLaboratorioI" => false
        );

        $DAOP = $factoriesDAO->createSAProgramaAsignatura();
        $DAOPM = $factoriesDAO->createSAModProgramaAsignatura();
        $asignatura = $DAOP->findProgramaAsignatura($idAsignatura);
        $modAsignatura = $DAOPM->findModProgramaAsignatura($idAsignatura);



        if ($configuracion->getConocimientosPrevios() === '1') {
            if (empty($modAsignatura) === false) {
                $n = $asignatura->getConocimientosPrevios();
                $modn = $modAsignatura->getConocimientosPrevios();

                //Lo convertimos en array
                $n = explode(" ", $n);
                $modn = explode(" ", $modn);

                //Comprobamos si son iguales
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["conocimientosPrevios"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["conocimientosPrevios"] = true;
                    }
                }
                }

                $n = $asignatura->getConocimientosPreviosI();
                $modn = $modAsignatura->getConocimientosPreviosI();

                //Lo convertimos en array
                $n = explode(" ", $n);
                $modn = explode(" ", $modn);

                //Comprobamos si son iguales
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["conocimientosPreviosI"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["conocimientosPreviosI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getBreveDescripcion() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getBreveDescripcion();
                $modn = $modAsignatura->getBreveDescripcion();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["BreveDescripcion"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["BreveDescripcion"] = true;
                    }
                }
                }
                $n =  $asignatura->getBreveDescripcionI();
                $modn = $modAsignatura->getBreveDescripcionI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["BreveDescripcionI"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["BreveDescripcionI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getProgramaTeorico() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getProgramaTeorico();
                $modn = $modAsignatura->getProgramaTeorico();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ProgramaTeorico"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ProgramaTeorico"] = true;
                    }
                }
                }
                $n =  $asignatura->getProgramaTeoricoI();
                $modn = $modAsignatura->getProgramaTeoricoI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ProgramaTeoricoI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ProgramaTeoricoI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getProgramaSeminarios() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getProgramaSeminarios();
                $modn = $modAsignatura->getProgramaSeminarios();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ProgramaSeminarios"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ProgramaSeminarios"] = true;
                    }
                }
                }
                $n =  $asignatura->getProgramaSeminariosI();
                $modn = $modAsignatura->getProgramaSeminariosI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ProgramaSeminariosI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ProgramaSeminariosI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getProgramaLaboratorio() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getProgramaLaboratorio();
                $modn = $modAsignatura->getProgramaLaboratorio();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ProgramaLaboratorio"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ProgramaLaboratorio"] = true;
                    }
                }
                }
                $n =  $asignatura->getProgramaLaboratorioI();
                $modn = $modAsignatura->getProgramaLaboratorioI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ProgramaLaboratorioI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ProgramaLaboratorioI"] = true;
                    }
                }
                }
            }
        }
        $DAOP = $factoriesDAO->createSACompetenciaAsignatura();
        $DAOPM = $factoriesDAO->createSAModCompetenciaAsignatura();
        $asignatura = $DAOP->findCompetenciaAsignatura($idAsignatura);
        $modAsignatura = $DAOPM->findModCompetenciaAsignatura($idAsignatura);


        if ($configuracion->getComGenerales() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getGenerales();
                $modn = $modAsignatura->getGenerales();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ComGenerales"] = true;
                }else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ComGenerales"] = true;
                    }
                }
                }

                $n =  $asignatura->getGeneralesI();
                $modn = $modAsignatura->getGeneralesI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ComGeneralesI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ComGeneralesI"] = true;
                    }
                }
                }
            }
        }

        if ($configuracion->getComEspecificas() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getEspecificas();
                $modn = $modAsignatura->getEspecificas();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ComEspecificas"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ComEspecificas"] = true;
                    }
                }
                }
                $n =  $asignatura->getEspecificasI();
                $modn = $modAsignatura->getEspecificasI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ComEspecificasI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ComEspecificasI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getComBasicas() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getBasicasYTransversales();
                $modn = $modAsignatura->getBasicasYTransversales();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ComBasicas"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ComBasicas"] = true;
                    }
                }
                }
                $n =  $asignatura->getBasicasYTransversalesI();
                $modn = $modAsignatura->getBasicasYTransversalesI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ComBasicasI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ComBasicasI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getResultadosAprendizaje() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getResultadosAprendizaje();
                $modn = $modAsignatura->getResultadosAprendizaje();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ResultadosAprendizaje"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ResultadosAprendizaje"] = true;
                    }
                }
                }

                $n =  $asignatura->getResultadosAprendizajeI();
                $modn = $modAsignatura->getResultadosAprendizajeI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["ResultadosAprendizajeI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["ResultadosAprendizajeI"] = true;
                    }
                }
                }
            }
        }
        $DAOP = $factoriesDAO->createSAMetodologia();
        $DAOPM = $factoriesDAO->createSAModMetodologia();
        $asignatura = $DAOP->findMetodologia($idAsignatura);
        $modAsignatura = $DAOPM->findModMetodologia($idAsignatura);

        if ($configuracion->getMetodologia() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getMetodologia();
                $modn = $modAsignatura->getMetodologia();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["Metodologia"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["Metodologia"] = true;
                    }
                }
                }

                $n =  $asignatura->getMetodologiaI();
                $modn = $modAsignatura->getMetodologiaI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["MetodologiaI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["MetodologiaI"] = true;
                    }
                }
                }
            }
        }
        $DAOP = $factoriesDAO->createSABibliografia();
        $DAOPM = $factoriesDAO->createSAModBibliografia();
        $asignatura = $DAOP->findBibliografia($idAsignatura);
        $modAsignatura = $DAOPM->findModBibliografia($idAsignatura);

        if ($configuracion->getCitasBibliograficas() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getCitasBibliograficas();
                $modn = $modAsignatura->getCitasBibliograficas();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["CitasBibliograficas"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["CitasBibliograficas"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getRecursosInternet() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getRecursosInternet();
                $modn = $modAsignatura->getRecursosInternet();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RecursosInternet"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RecursosInternet"] = true;
                    }
                }
                }
            }
        }
        $DAOP = $factoriesDAO->createSAEvaluacion();
        $DAOPM = $factoriesDAO->createSAModEvaluacion();
        $asignatura = $DAOP->findEvaluacion($idAsignatura);
        $modAsignatura = $DAOPM->findModEvaluacion($idAsignatura);

        if ($configuracion->getRealizacionExamenes() === '1') {
            if (empty($modAsignatura) === false) {

                $n =  $asignatura->getRealizacionExamenes();
                $modn = $modAsignatura->getRealizacionExamenes();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RealizacionExamenes"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RealizacionExamenes"] = true;
                    }
                }
                }
                $n =  $asignatura->getRealizacionExamenesI();
                $modn = $modAsignatura->getRealizacionExamenesI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RealizacionExamenesI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RealizacionExamenesI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getCalificacionFinal() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getCalificacionFinal();
                $modn = $modAsignatura->getCalificacionFinal();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["CalificacionFinal"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["CalificaciónFinal"] = true;
                    }
                }
                }
                $n =  $asignatura->getCalificacionFinalI();
                $modn = $modAsignatura->getCalificacionFinalI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["CalificacionFinalI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["CalificacionFinalI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getRealizacionActividades() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getRealizacionActividades();
                $modn = $modAsignatura->getRealizacionActividades();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RealizacionActividades"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RealizacionActividades"] = true;
                    }
                }
                }
                $n =  $asignatura->getRealizacionActividadesI();
                $modn = $modAsignatura->getRealizacionActividadesI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RealizacionActividadesI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RealizacionActividadesI"] = true;
                    }
                }
                }
            }
        }
        if ($configuracion->getRealizacionLaboratorio() === '1') {
            if (empty($modAsignatura) === false) {
                $n =  $asignatura->getRealizacionLaboratorio();
                $modn = $modAsignatura->getRealizacionLaboratorio();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RealizacionLaboratorio"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RealizacionLaboratorio"] = true;
                    }
                }
                }
                $n =  $asignatura->getRealizacionLaboratorioI();
                $modn = $modAsignatura->getRealizacionLaboratorioI();

                $n = explode(" ", $n);
                $modn = explode(" ", $modn);
                if (sizeof($n) !== sizeof($modn)) {
                    $comparacion["RealizacionLaboratorioI"] = true;
                }
                else
                {
                for ($i=0; $i < sizeof($n) && $i < sizeof($modn) ; $i++) { 
                    if($n[$i] !== $modn[$i]){
                        $comparacion["RealizacionLaboratorioI"] = true;
                    }
                }
                }
            }
        }
        return $comparacion;
    }
}
