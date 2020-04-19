<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModHorarioClase implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioClase = $factorySA->createSAModHorarioClase();
        $horarioClase = $saHorarioClase->createModHorarioClase($data);
        $responseContext = null;
        if ($horarioClase) {
            $responseContext = new Context(CREATE_MODHORARIO_CLASE_OK, $horarioClase);
        } else {
            $responseContext = new Context(CREATE_MODHORARIO_CLASE_FAIL, null);
        }
        return $responseContext;
    }
}