<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateMateria implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMateria = $factorySA->createSAMateria();
        $materia = $saMateria->createMateria($data);
        $responseContext = null;
        if ($materia != null) {
            $responseContext = new Context(CREATE_MATERIA_OK, $materia);
        } else {
            $responseContext = new Context(CREATE_MATERIA_FAIL, null);
        }
        return $responseContext;
    }
}
