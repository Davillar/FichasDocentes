<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAAsignatura();
        $asignatura = $saAsignatura->createAsignatura($data);
        $responseContext = null;
        if ($asignatura != null) {
            $responseContext = new Context(CREATE_ASIGNATURA_OK, $asignatura);
        } else {
            $responseContext = new Context(CREATE_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
