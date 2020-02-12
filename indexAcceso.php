<?php
require_once('includes/config.php');
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
            <script src="' . RUTA_JS . 'jquery-3.4.1.min.js" type="text/javascript"></script>';
    ?>
    <title>Gestion Docente: Panel de control</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once('includes/Presentacion/Vistas/html/cabecera.php');
        ?>
        <div class="row margenes">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header text-center">
                        <h2>Listado de asignaturas por grado</h2>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Fisica
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Álgebra</p>
                                        <p>Cálculo</p>
                                        <p>Química</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Ingenieria de materiales
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Biología</p>
                                        <p>Diagramas y transformaciones de fases</p>
                                        <p>Introduccion a la ingenieria de materiales</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Ingenieria electronica de comunicaciones
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Álgebra</p>
                                        <p>Ampliacion de matematicas</p>
                                        <p>Informática</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header text-center">
                        <h2>Informacion docente de la asignatura: Ejemplo asignatura</h2>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-info-asignatura-tab" data-toggle="tab" href="#nav-info-asignatura" role="tab" aria-controls="nav-info-asignatura" aria-selected="true">Informacion asignatura</a>
                                <a class="nav-item nav-link" id="nav-prog-asignatura-tab" data-toggle="tab" href="#nav-prog-asignatura" role="tab" aria-controls="nav-prog-asignatura" aria-selected="false">Programa asignatura</a>
                                <a class="nav-item nav-link" id="nav-comp-asignatura-tab" data-toggle="tab" href="#nav-comp-asignatura" role="tab" aria-controls="nav-comp-asignatura" aria-selected="false">Competencias asignatura</a>
                                <a class="nav-item nav-link" id="nav-metodologia-tab" data-toggle="tab" href="#nav-metodologia" role="tab" aria-controls="nav-metodologia" aria-selected="false">Metodologia</a>
                                <a class="nav-item nav-link" id="nav-bibliografia-tab" data-toggle="tab" href="#nav-bibliografia" role="tab" aria-controls="nav-bibliografia" aria-selected="false">Bibliografia</a>
                                <a class="nav-item nav-link" id="nav-grupo-laboratorio-tab" data-toggle="tab" href="#nav-grupo-laboratorio" role="tab" aria-controls="nav-grupo-laboratorio" aria-selected="false">Grupo laboratorio</a>
                                <a class="nav-item nav-link" id="nav-grupo-clase-tab" data-toggle="tab" href="#nav-grupo-clase" role="tab" aria-controls="nav-grupo-clase" aria-selected="false">Grupo clase</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!--Pestaña informacion asignatura-->
                            <div class="tab-pane fade show active" id="nav-info-asignatura" role="tabpanel" aria-labelledby="nav-info-asignatura-tab">
                                Nombre asignatura: ...<br />
                                Nombre asignatura en ingles:...<br />
                                Materia:...<br />
                                Modulo:...<br />
                                Caracter:...<br />
                                Curso:...<br />
                                Semestre:...<br />
                                Creditos materia:...<br />
                                Coordinadores:...<br />
                                Reparto de creditos:
                                <div class="table-responsible">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Créditos</th>
                                                <th scope="col">Presencial</th>
                                                <th scope="col">Horas totales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Teóricos</th>
                                                <td>5</td>
                                                <td>33%</td>
                                                <td>42</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Problemas</th>
                                                <td>3.5</td>
                                                <td>40%</td>
                                                <td>35</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Laboratorio</th>
                                                <td>0.5</td>
                                                <td>70%</td>
                                                <td>9</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!--Pestaña programa asignatura-->
                            <div class="tab-pane fade" id="nav-prog-asignatura" role="tabpanel" aria-labelledby="nav-prog-asignatura-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Conocimientos previos</h5>
                                        <p class="card-text">Ejemplo de conocimientos previos</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Conocimientos previos (Ingles)</h5>
                                        <p class="card-text">Ejemplo de conocimientos previos en ingles</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Breve descripcion</h5>
                                        <p class="card-text">Ejemplo de breve descripcion</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Breve descripcion (Ingles)</h5>
                                        <p class="card-text">Ejemplo de breve descripcion en ingles</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Programa detallado</h5>
                                        <p class="card-text">Ejemplo de programa detallado</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Programa detallado</h5>
                                        <p class="card-text">Ejemplo de programa detallado en ingles</p>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-programa-asignatura">
                                    Modificar
                                </button>

                                <div class="modal fade" id="modal-programa-asignatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Modificar programa asignatura</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                $access = new es\ucm\FormProgramaAsignatura('idProgramaAsignatura');
                                                $access->gestiona();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-comp-asignatura" role="tabpanel" aria-labelledby="nav-comp-asignatura-tab">...</div>
                            <div class="tab-pane fade" id="nav-metodologia" role="tabpanel" aria-labelledby="nav-metodologia-tab">...</div>
                            <div class="tab-pane fade" id="nav-bibliografia" role="tabpanel" aria-labelledby="nav-bibliografia-tab">...</div>
                            <div class="tab-pane fade" id="nav-grupo-laboratorio" role="tabpanel" aria-labelledby="nav-grupo-laboratorio-tab">...</div>
                            <div class="tab-pane fade" id="nav-grupo-clase" role="tabpanel" aria-labelledby="nav-grupo-clase-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>