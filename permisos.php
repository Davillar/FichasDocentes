<?php
require_once('includes/config.php');
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  echo '<link href="' . RUTA_CSS . 'estilos.css" rel="stylesheet" type="text/css" media="screen"/>
  <link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css">
  <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css">
  <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png">
  <script type="text/javascript" src="' . RUTA_JS . 'codigo.js"></script>
  <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="' . RUTA_JS . 'tinymce.min.js"></script>';
  ?>
  <title>Gestión Docente: Configuración</title>
</head>

<body>
  <div class="container-fluid">
    <?php
    require_once('includes/Presentacion/Vistas/html/cabecera.php');
    ?>
    <div class="row justify-content-center align-items-center"> 
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        if(isset($_GET['IdAsignatura']) && isset($_GET['IdGrado']) && isset($_GET['EmailProfesor'])){
          $IdAsignatura = htmlspecialchars(trim(strip_tags($_GET['IdAsignatura'])));
          $IdGrado = htmlspecialchars(trim(strip_tags($_GET['IdGrado'])));
          $EmailProfesor = htmlspecialchars(trim(strip_tags($_GET['EmailProfesor'])));
          
          if(isset($_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['coordinacion']) && $_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['coordinacion'] == true){

            $info['email'] = $EmailProfesor;
            $info['asignatura'] = $IdAsignatura;
            $controller = new es\ucm\ControllerImplements();
            $context = new es\ucm\Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA,$info);
            $permisos = $controller->action($context);
            $context = new es\ucm\Context(FIND_PROFESOR, $EmailProfesor);
            $profesor = $controller->action($context);

            if($permisos->getEvent() === FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_OK){
              ?>
              <div class="col-xl-10 col-12">
                <div class="card">
                  <div class="card-header text-center">
                    <h2>Modificar permisos de <?php echo $profesor->getData()->getNombre();?></h2>
                  </div>
                  <div class="card-body">
                    <?php
                    $access = new es\ucm\FormPermisos('idPermisos');
                    $datosIniciales= array();

                    $datosIniciales['IdPermiso'] = $permisos->getData()->getIdPermiso();
                    $datosIniciales['PermisoPrograma'] = $permisos->getData()->getPermisoPrograma();
                    $datosIniciales['PermisoCompetencias'] = $permisos->getData()->getPermisoCompetencias();
                    $datosIniciales['PermisoMetodologia'] = $permisos->getData()->getPermisoMetodologia();
                    $datosIniciales['PermisoBibliografia'] = $permisos->getData()->getPermisoBibliografia();
                    $datosIniciales['PermisoGrupoLaboratorio'] = $permisos->getData()->getPermisoGrupoLaboratorio();
                    $datosIniciales['PermisoGrupoClase']= $permisos->getData()->getPermisoGrupoClase();
                    $datosIniciales['PermisoEvaluacion'] = $permisos->getData()->getPermisoEvaluacion();
                    $datosIniciales['IdAsignatura'] = $permisos->getData()->getIdAsignatura();
                    $datosIniciales['EmailProfesor'] = $permisos->getData()->getEmailProfesor();
                    $datosIniciales['IdGrado'] =$IdGrado;
                    $access->gestionaModificacion($datosIniciales); 
                    ?>
                  </div>
                </div>
              </div>
              <?php
            }
            else{
              echo '
              <div class="col-md-6 col-12">
              <div class="alert alert-danger" role="alert">
              <h2 class="card-title text-center">ACCESO DENEGADO</h2>
              <h5 class="text-center">No se han encontrado permisos para el profesor seleccionado</h5>
              </div>
              </div>';
            }
          }
          else{
           echo '
           <div class="col-md-6 col-12">
           <div class="alert alert-danger" role="alert">
           <h2 class="card-title text-center">ACCESO DENEGADO</h2>
           <h5 class="text-center">No tienes permisos suficientes para esta apartado</h5>
           </div>
           </div>';
         }
       } 
       else{
        echo '
        <div class="col-md-6 col-12">
        <div class="alert alert-danger" role="alert">
        <h2 class="card-title text-center">ACCESO DENEGADO</h2>
        <h5 class="text-center">No se ha podido obtener la asignatura</h5>
        </div>
        </div>';
      }
    }
    else {
      echo '
      <div class="col-md-6 col-12">
      <div class="alert alert-danger" role="alert">
      <h2 class="card-title text-center">ACCESO DENEGADO</h2>
      <h5 class="text-center">Inicia sesión con un usuario que pueda acceder a este contenido</h5>
      </div>
      </div>';
    }
    ?>
  </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>