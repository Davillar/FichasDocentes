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
    echo '<link rel="stylesheet" href="' . RUTA_CSS . 'bootstrap.css">
    <link rel="stylesheet" href="' . RUTA_CSS . 'fichasdocentes.css">
    <link rel="shortcut icon" type="image/x-icon" href="' . RUTA_IMGS . 'LogoUniversidad.png">
    <script type="text/javascript" src="' . RUTA_JS . 'codigo.js"></script>
    <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="' . RUTA_JS . 'tinymce.min.js"></script>';
    ?>
    <title>Gestión Docente: Evaluación</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row justify-content-center align-items-center">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {

                if (isset($_GET['IdModAsignatura']) && isset($_GET['IdGrado'])) {
                    $IdAsignatura = htmlspecialchars(trim(strip_tags($_GET['IdModAsignatura'])));
                    $IdGrado = htmlspecialchars(trim(strip_tags($_GET['IdGrado'])));

                    if ((isset($_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['coordinacion']) && $_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['coordinacion'] == true) || (isset($_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['permisos']) && unserialize($_SESSION['asignaturas'][$IdGrado][$IdAsignatura]['permisos'])->getPermisoEvaluacion() == true)) {
                        $controller = new es\ucm\ControllerImplements();
                        $context = new es\ucm\Context(FIND_CONFIGURACION, $IdAsignatura);
                        $contextConfiguacion = $controller->action($context);

                        if ($contextConfiguacion->getEvent() === FIND_CONFIGURACION_OK && ($contextConfiguacion->getData()->getRealizacionExamenes() == 1 || $contextConfiguacion->getData()->getRealizacionActividades() == 1 || $contextConfiguacion->getData()->getRealizacionLaboratorio() == 1 || $contextConfiguacion->getData()->getCalificacionFinal() == 1)) {
                            ?>
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h2>Borrar el borrador de la evaluación</h2>
                                    </div>
                                    <div class="card-body text-center">
                                        <?php
                                        if (isset($_GET['Confirmacion']) && $_GET['Confirmacion'] === 'y') {
                                            
                                            $context = new es\ucm\Context(FIND_MODEVALUACION, $IdAsignatura);
                                            
                                            $contextEvaluacion = $controller->action($context);

                                            if ($contextEvaluacion->getEvent() === FIND_MODEVALUACION_OK) {
                                                $context = new es\ucm\Context(DELETE_MODEVALUACION, $IdAsignatura);
                                                $contextEvaluacion = $controller->action($context);
                                                if ($contextEvaluacion->getEvent() === DELETE_MODEVALUACION_OK) {
                                                    header('Location: indexAcceso.php?IdGrado=' . $IdGrado . '&IdAsignatura=' . $IdAsignatura . '&eliminado=y');
                                                } elseif ($contextEvaluacion->getEvent() === DELETE_MODEVALUACION_FAIL) {
                                                    header('Location: indexAcceso.php?IdGrado=' . $IdGrado . '&IdAsignatura=' . $IdAsignatura . '&eliminado=n');
                                                }
                                            }
                                        }else{
                                            ?>
                                            ¿Estás seguro de que quieres borrar el borrador de la evaluación?
                                            <div class="text-center">
                                               <a href="indexAcceso.php?IdGrado=<?php echo $IdGrado; ?>&IdAsignatura=<?php echo $IdAsignatura; ?>">
                                                <button type="button" class="btn btn-secondary" id="btn-form">
                                                  Cancelar
                                              </button>
                                          </a>
                                          <a href="borrarEvaluacion.php?IdGrado=<?php echo $IdGrado; ?>&IdModAsignatura=<?php echo $IdAsignatura; ?>&Confirmacion=y">
                                            <button type="button" class="btn btn-success" id="btn-form">
                                               Aceptar
                                           </button>

                                       </a>

                                   </div>
                                   <?php
                               }


                               ?>
                           </div>
                       </div>
                   </div>
                   <?php
               } else {
                echo '
                <div class="col-md-6 col-12">
                <div class="alert alert-danger" role="alert">
                <h2 class="card-title text-center">ACCESO DENEGADO</h2>
                <h5 class="text-center">La asignatura seleccionada no ha sido creada correctamente o no contiene este apartado. Contacta con el administrador</h5>
                </div>
                </div>';
            }
        } else {
            echo '
            <div class="col-md-6 col-12">
            <div class="alert alert-danger" role="alert">
            <h2 class="card-title text-center">ACCESO DENEGADO</h2>
            <h5 class="text-center">No tienes permisos suficientes para esta apartado</h5>
            </div>
            </div>';
        }
    } else {
        echo '
        <div class="col-md-6 col-12">
        <div class="alert alert-danger" role="alert">
        <h2 class="card-title text-center">ACCESO DENEGADO</h2>
        <h5 class="text-center">No se ha podido obtener la asignatura</h5>
        </div>
        </div>';
    }
} else {
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
<script>
    tinymce.init({
        selector: '#generales',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#generalesI',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#especificas',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#especificasI',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#basicasYtransversales',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#basicasYTransversalesI',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#resultadosAprendizaje',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
    tinymce.init({
        selector: '#resultadosAprendizajeI',
        plugins: ['link image lists table'],
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignjustify | bullist numlist outdent indent | image link table | removeformat',
        menubar: false,
    });
</script>
</body>

</html>