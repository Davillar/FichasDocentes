<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/Verifica/Verifica.php');

class FormVerifica extends Form
{

    protected function generaCamposFormulario($datosIniciales)
    {
        $IdVerifica = $datosIniciales['IdVerifica'];
        $IdAsignatura = $datosIniciales['IdAsignatura'];
        $IdGrado = $datosIniciales['IdGrado'];
        $maximoExamenes = isset($datosIniciales['maximoExamenes']) ? $datosIniciales['maximoExamenes'] : 0;
        $minimoExamenes = isset($datosIniciales['minimoExamenes']) ? $datosIniciales['minimoExamenes'] : 0;
        $maximoActividades = isset($datosIniciales['maximoActividades']) ? $datosIniciales['maximoActividades'] : 0;
        $minimoActividades = isset($datosIniciales['minimoActividades']) ? $datosIniciales['minimoActividades'] : 0;
        $maximoLaboratorio = isset($datosIniciales['maximoLaboratorio']) ? $datosIniciales['maximoLaboratorio'] : 0;
        $minimoLaboratorio = isset($datosIniciales['minimoLaboratorio']) ? $datosIniciales['minimoLaboratorio'] : 0;

        $html =
        '<input type="hidden" name="IdVerifica" id="IdVerifica" value="' . $IdVerifica . '" required />
        <input type="hidden" name="IdAsignatura" id="IdAsignatura" value="' . $IdAsignatura . '" required />
        <input type="hidden" name="IdGrado" id="IdGrado" value="' . $IdGrado . '" required />


        <table class="table table-hover">
        <tbody>

        <tr>
        <th scope="row" class="text-center text-primary" colspan="2">EXÁMENES</th>
        </tr>

        <tr>
        <th scope="row">Máximo</th>
        <td>  
        <input class="form-control" type="number" id="maximoExamenes" name="maximoExamenes" min="0" max="100" step="1" value="' . $maximoExamenes . '" required />
        </td>
        </tr>

        <tr>
        <th scope="row">Mínimo</th>
        <td> 
        <input class="form-control" type="number" id="minimoExamenes" name="minimoExamenes" min="0" max="100" step="1" value="' . $minimoExamenes . '" required />
        </td>
        </tr>

        <tr>
        <th scope="row" class="text-center text-primary" colspan="2">ACTIVIDADES</th>
        </tr>

        <tr>
        <th scope="row">Máximo</th>
        <td>  
        <input class="form-control" type="number" id="maximoActividades" name="maximoActividades" min="0" max="100" step="1" value="' . $maximoActividades . '" required />
        </td>
        </tr>

        <tr>
        <th scope="row">Mínimo</th>
        <td> 
        <input class="form-control" type="number" id="minimoActividades" name="minimoActividades" min="0" max="100" step="1" value="' . $minimoActividades . '" required />
        </td>
        </tr>

        <tr>
        <th scope="row" class="text-center text-primary" colspan="2">LABORATORIO</th>
        </tr>
        
        <tr>
        <th scope="row">Máximo</th>
        <td>  
        <input class="form-control" type="number" id="maximoLaboratorio" name="maximoLaboratorio" min="0" max="100" step="1" value="' . $maximoLaboratorio . '" required />
        </td>
        </tr>

        <tr>
        <th scope="row">Mínimo</th>
        <td> 
        <input class="form-control" type="number" id="minimoLaboratorio" name="minimoLaboratorio" min="0" max="100" step="1" value="' . $minimoLaboratorio . '" required />
        </td>
        </tr>

        </tbody>
        </table>


        <div class="text-center">
        <a href="indexAcceso.php?IdGrado=' . $IdGrado . '&IdAsignatura=' . $IdAsignatura . '#nav-configuracion">
        <button type="button" class="btn btn-secondary" id="btn-form">
        Cancelar
        </button>
        </a>

        <button type="submit" class="btn btn-success" id="btn-form" name="registrar">Guardar</button>
        </div>';

        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $erroresFormulario = array();
        $controller = new ControllerImplements();
        $context = new Context(FIND_VERIFICA, $datos['IdAsignatura']);
        $contextVerifica = $controller->action($context);

        if ($contextVerifica->getEvent() === FIND_VERIFICA_OK) {
            $IdVerifica = $datos['IdVerifica'];
            $MaximoExamenes = isset($datos['maximoExamenes']) ? $datos['maximoExamenes'] : 0;
            $MinimoExamenes = isset($datos['minimoExamenes']) ? $datos['minimoExamenes'] : 0;
            $MaximoActividades = isset($datos['maximoActividades']) ? $datos['maximoActividades'] : 0;
            $MinimoActividades = isset($datos['minimoActividades']) ? $datos['minimoActividades'] : 0;
            $MaximoLaboratorio = isset($datos['maximoLaboratorio']) ? $datos['maximoLaboratorio'] : 0;
            $MinimoLaboratorio = isset($datos['minimoLaboratorio']) ? $datos['minimoLaboratorio'] : 0;
            $IdAsignatura = $datos['IdAsignatura'];

            if ($MaximoExamenes<$MinimoExamenes) {
                $erroresFormulario[] = "El porcentaje máximo de exámenes es menor que el mínimo";
            }

            if ($MaximoActividades<$MinimoActividades) {
                $erroresFormulario[] = "El porcentaje máximo de actividades es menor que el mínimo";
            }

            if ($MaximoLaboratorio<$MinimoLaboratorio) {
                $erroresFormulario[] = "El porcentaje máximo de laboratorio es menor que el mínimo";
            }

            if (count($erroresFormulario) === 0) {
                if ($MaximoExamenes == $contextVerifica->getData()->getMaximoExamenes() && $MinimoExamenes == $contextVerifica->getData()->getMinimoExamenes() && $MaximoActividades == $contextVerifica->getData()->getMaximoActividades() && $MinimoActividades == $contextVerifica->getData()->getMinimoActividades() && $MaximoLaboratorio == $contextVerifica->getData()->getMaximoLaboratorio() && $MinimoLaboratorio == $contextVerifica->getData()->getMinimoLaboratorio()) {
                  $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['IdGrado'] . "&IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
              }
              else{
                  $verifica = new Verifica(
                    $IdVerifica,
                    $MaximoExamenes,
                    $MinimoExamenes,
                    $MaximoActividades,
                    $MinimoActividades,
                    $MaximoLaboratorio,
                    $MinimoLaboratorio,
                    $IdAsignatura
                );

                  $context = new Context(UPDATE_VERIFICA, $verifica);
                  $contextVerifica = $controller->action($context);

                  if ($contextVerifica->getEvent() === UPDATE_VERIFICA_OK) {
                    $erroresFormulario = "indexAcceso.php?IdGrado=" . $datos['IdGrado'] . "&IdAsignatura=" . $datos['IdAsignatura'] . "&modificado=y#nav-configuracion";
                } 
                elseif ($contextVerifica->getEvent() === UPDATE_VERIFICA_FAIL) {
                    $erroresFormulario[] = "No se ha podido modificar la verificación de procentajes";
                }
            } 
        }
    }
    else{
        $erroresFormulario[] = "La verificación no existe";
    }

    return $erroresFormulario;
}
}
