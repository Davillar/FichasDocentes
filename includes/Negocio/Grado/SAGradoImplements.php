<?php

namespace es\ucm;

require_once('includes/Negocio/Grado/SAGrado.php');
require_once('includes/Negocio/Grado/Grado.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGradoImplements implements SAGrado
{

    public static function findGrado($codigoGrado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->findGrado($codigoGrado);
        if ($grado && count($grado) === 1) {
            $grado = new Grado(
                $grado[0]['CodigoGrado'],
                $grado[0]['NombreGrado'],
                $grado[0]['Coordinador'],
                $grado[0]['HorasEcts'],
                $grado[0]['AnyoAcademico']
            );
        }
        return $grado;
    }

    public static function createGrado($grado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->createGrado($grado);
        return $grado;
    }

    public static function updateGrado($grado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->updateGrado($grado);
        return $grado;
    }

    public static function deleteGrado($codigoGrado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->deleteGrado($codigoGrado);
        return $grado;
    }

    public static function listGrado()
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grados = $DAOGrado->listGrado();
        $arrayGrados = array();
        if ($grados) {
            foreach ($grados as $grado) {
                $arrayGrados[] = new Grado($grado['CodigoGrado'], $grado['NombreGrado'], $grado['Coordinador'], $grado['HorasEcts'], $grado['AnyoAcademico']);
            }
        }
        return $arrayGrados;
    }
}
