<?php

namespace es\ucm;

require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
require_once('includes/Negocio/GrupoLaboratorio/ModGrupoLaboratorio.php');
require_once('includes/Negocio/Asignatura/ModAsignatura.php');

class FormGrupoLaboratorioProfesor extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idGrupoLaboratorio = isset($datosIniciales['idGrupoLaboratorio']) ? $datosIniciales['idGrupoLaboratorio'] : null;
		$emailProfesor = isset($datosIniciales['emailProfesor']) ? $datosIniciales['emailProfesor'] : null;
		$idAsignatura = isset($datosIniciales['idAsignatura']) ? $datosIniciales['idAsignatura'] : null;

		$html = '<input type="hidden" name="idGrupoLaboratorio" value="' . $idGrupoLaboratorio . '" required />
		<input type="hidden" name="idAsignatura" value="' . $idAsignatura . '" required />

		<div class="form-group">
			<label for="emailProfesor">Profesor</label>
			<select class="form-control" id="emailProfesor" name="emailProfesor" >';
		$controller = new ControllerImplements();
		$context = new Context(FIND_PERMISOS, $idAsignatura);
		$contextPermisos = $controller->action($context);
		if ($contextPermisos->getEvent() === FIND_PERMISOS_OK) {
			foreach ($contextPermisos->getData() as $permiso) {
				$context = new Context(FIND_PROFESOR, $permiso->getEmailProfesor());
				$contextProfesor = $controller->action($context);
				if ($contextProfesor->getData()->getEmail() == $emailProfesor) {
					$html .= '<option value="' . $contextProfesor->getData()->getEmail() . '" selected >' . $contextProfesor->getData()->getNombre() . '</option>';
				} else {
					$html .= '<option value="' . $contextProfesor->getData()->getEmail() . '">' . $contextProfesor->getData()->getNombre() . '</option>';
				}
			}
		}
		$html .= '	</select>
		</div>

		<div class="text-right">
		<a href="indexAcceso.php?IdAsignatura=' . $idAsignatura . '#nav-grupo-laboratorio">
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

		$emailProfesor = isset($datos['emailProfesor']) ? $datos['emailProfesor'] : null;
		$emailProfesor = self::clean($emailProfesor);
		if (empty($emailProfesor)) {
			$erroresFormulario[] = "No has introducido al profesor.";
		}

		if (count($erroresFormulario) === 0) {
			$controller = new ControllerImplements();
			$arrayGrupoLaboratorioProfesor=array();
			$arrayGrupoLaboratorioProfesor['idGrupoLaboratorio']=$datos['idGrupoLaboratorio'];
			$arrayGrupoLaboratorioProfesor['emailProfesor']=$emailProfesor;
			$context = new Context(FIND_MODGRUPO_LABORATORIO_PROFESOR, $arrayGrupoLaboratorioProfesor);
			$contextGrupoLaboratorio = $controller->action($context);

			if ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_OK) {
				$erroresFormulario[] = "El profesor ya se encuentra registrado en el grupo.";
			} elseif ($contextGrupoLaboratorio->getEvent() === FIND_MODGRUPO_LABORATORIO_PROFESOR_FAIL) {

				$grupoLaboratorioProfesor = new ModGrupoLaboratorioProfesor($datos['idGrupoLaboratorio'], $emailProfesor);
				$context = new Context(CREATE_MODGRUPO_LABORATORIO_PROFESOR, $grupoLaboratorioProfesor);
				$contextGrupoLaboratorio = $controller->action($context);
				if ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_PROFESOR_OK) {
					$modAsignatura = new ModAsignatura($datos['idAsignatura'], date("Y-m-d H:i:s"), $_SESSION['idUsuario'], $datos['idAsignatura']);
					$context = new Context(UPDATE_MODASIGNATURA, $modAsignatura);
					$contextModAsignatura = $controller->action($context);
					$erroresFormulario = "indexAcceso.php?IdAsignatura=" . $datos['idAsignatura'] . "&anadido=y#nav-grupo-laboratorio";
				} elseif ($contextGrupoLaboratorio->getEvent() === CREATE_MODGRUPO_LABORATORIO_PROFESOR_FAIL) {
					$erroresFormulario[] = "No se ha podido registar al profesor en el grupo.";
				}
			}
		}
		return $erroresFormulario;
	}
}
