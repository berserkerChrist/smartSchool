<?php
  include('src/conexion_bd.php');
  session_start();
  $grupo = $_SESSION['grupoDocente'];
  if(!$_SESSION){
    header("Location: index.php");
  }
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Panel de maestro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap 4/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap 4/adicionalPanel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" charset="utf-8"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="js/ajax.js" charset="utf-8"></script>
    <script src="js/vistaCalendario.js" charset="utf-8"></script>
  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar" class="bg-gradBlue">
        <div class="sidebar-header shadow-sm">
          <h3 class="text-center"><i class="fas fa-chalkboard-teacher fa-2x"></i><br><br>Hola <?php echo $_SESSION['nombreDocente']; ?></h3>
          <strong><i class="fas fa-chalkboard-teacher fa-lg"></i></strong>
          <!--<i class="material-icons md-64">supervised_user_circle</i> padre-->
        </div>

        <ul class="list-unstyled components">
          <li>
            <a href="#miGrupoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
              <i class="far fa-calendar-check fa-lg"></i>Mi grupo
            </a>
            <ul class="collapse list-unstyled" id="miGrupoSubmenu">
              <li>
                <a href="#" onclick="toggleVisibility('actRealizadas')">Actividades realizadas en clase</a>
              </li>
              <li>
                <a href="#" onclick="toggleVisibility('tareasAsignadas')">Tareas asignadas</a>
              </li>
              <li>
                <a href="#" onclick="toggleVisibility('tareasArchivo')">Tareas a calificar</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" onclick="toggleVisibility('planeacion')" class="">
              <i class="fas fa-file-upload fa-lg"></i>Planeacion
            </a>
          </li>
          <li>
            <a href="#" onclick="toggleVisibility('tareas')" class="">
              <i class="fas fa-book fa-lg"></i>Tareas
            </a>
          </li>
          <li>
            <a href="#" onclick="toggleVisibility('actividades')" class="">
              <i class="fas fa-pencil-alt fa-lg"></i>Actividades
            </a>
          </li>
          <li>
            <a href="#AdminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
              <i class="far fa-calendar-check fa-lg"></i>Calificaciones
            </a>
            <ul class="collapse list-unstyled" id="AdminSubmenu">
              <li>
                <a href="#" onclick="toggleVisibility('promedio')">Capturar calificaciones</a>
              </li>
              <li>
                <a href="#" onclick="toggleVisibility('proyecto')">Proyecto</a>
              </li>
              <li>
                <a href="#" onclick="toggleVisibility('reportes')">Reporte de actividades</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" onclick="toggleVisibility('calendario')" class="">
              <i class="far fa-calendar-alt fa-lg"></i>Calendario
            </a>
          </li>
          <li class="show-none">
            <a href="src/proces-unlgn.php" class="">
              <i class="fas fa-sign-out-alt fa-lg"></i>Cerrar sesión
            </a>
          </li>
        </ul>
      </nav>

      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-dark shadow bg-gradDarkBlue">
          <button type="button" id="sidebarCollapse" class="btn btn-outline-light">
            <i class="fas fa-bars"></i>
          </button>
          <div class="container w-50">
            <a class="navbar-brand mr-auto" href="#"><img src="images/items/logoSmall.png" width="50" height="50" alt=""> SmartSchool</a>
          </div>
          <ul class="navbar-nav ml-auto paddingRight">
            <li class="nav-item show-block">
              <a href="src/proces-unlgn.php" class=" nav-link text-white">
                <i class="fas fa-sign-out-alt fa-lg"></i> Cerrar sesión
              </a>
            </li>
          </ul>
        </nav>

        <div id="actRealizadas" class="espacioTop paddingSides">
          <div id="hint" class="alert alert-info" role="alert">
            <strong>En esta seccion puedes echar un vistazo a las actividades que has realizado con tu grupo</strong>
          </div>
          <br>
          <div id="mostrarActividadesDocente"></div>
          <div id="cargandoActDocente" class="text-center"></div>
          <br>
        </div>

        <div id="tareasAsignadas" class="espacioTop paddingSides none">
          <div id="hintTareas" class="alert alert-info" role="alert">
            <strong>En esta seccion puedes echar un vistazo a las tareas que has asignado a tu grupo</strong>
          </div>
          <br>
          <div id="mostrarTareasDoc"></div>
          <div id="cargandoDoc" class="text-center"></div>
          <br>
        </div>

        <div id="tareasArchivo" class="espacioTop paddingSides none">
          <div id="hintTareas" class="alert alert-info" role="alert">
            <strong>En esta seccion puedes echar un vistazo a las tareas que has asignado a tu grupo</strong>
          </div>
          <br>
          <div id="mostrarTareasDocArchivo"></div>
          <div id="cargandoDocArchivo" class="text-center"></div>
          <br>
        </div>

        <!--planeacion-->
        <div id="planeacion" class="espacioTop paddingSides none">

          <div class="card w-100 mx-auto shadow">
            <div class="card-header bg-white text-center">
              <h4>Subir planeacion</h4>
            </div>

            <div class="card-body">
              <form action="#" method="post" id="subirExcel">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="excelPlaneacion" id="excelPlaneacion">
                  <label class="custom-file-label" for="excelPlaneacion">Elegir archivo</label>
                </div>
              </form>
              <br>
              <div id="result">
              </div>
            </div>
            <!--CARD BODY-->
          </div>
          <!--CARD-->
        </div>
        <!--planeacion-->

        <!--actividades-->
        <div id="actividades" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto">
            <div class="card-header bg-white text-center">
              <h4 class="">Actividades</h4>
            </div>
            <div class="card-body">
              <h6 class="text-primary">Selecciona la actividad a publicar</h6>
              <hr>
              <form action="src/drivers/driverActividades.php" method="post">
                <div class="form-row">
                  <div class="col-md-9">
                    <select class="form-control" name="actividad">
                      <?php

                        $sql = "SELECT actividades.titulo, materia.nombre, materia.id, actividades.id AS a FROM actividades
                        INNER JOIN materia ON actividades.materia = materia.id
                        WHERE actividades.status = '300' AND actividades.grupo_fk = '".$grupo."' ORDER BY actividades.id DESC";
                        $resultado = mysqli_query($con, $sql);
                        while($fila = mysqli_fetch_array($resultado)){
                          echo "<option value=".$fila['a'].">".$fila['titulo']."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <input type="submit" class="btn btn-primary" name="publicarActividad" value="Publicar">
                  </div>
                </div>
              </form>
              <br>
              <h6 class="text-primary">Si lo deseas, tambien puedes crear una nueva</h6>
              <hr>
              <form action="src/drivers/driverActividades.php" method="post">
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" name="tituloAct">
                  </div>
                  <div class="col-md-4">
                    <label for="materia">Materia</label>
                    <select class="form-control" name="materiaAct">
                      <?php
                        include('src/conexion_bd.php');
                        $sql = "SELECT * FROM materia ORDER BY id ASC";
                        $resultado = mysqli_query($con, $sql);
                        while($fila = mysqli_fetch_array($resultado)){
                          echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="periodoTarea">Periodo</label>
                    <select class="form-control" name="periodoAct" required>
                      <option value="">Periodo de evaluacion</option>
                      <?php
                        $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                        $resultado = mysqli_query($con, $sql);
                        while ($fila = mysqli_fetch_array($resultado)) {
                          echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-9">
                    <label for="descripcion">Descripción de la actividad</label>
                    <textarea name="descripcionAct" class="form-control" rows="4" cols="80"></textarea>
                  </div>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="crearActividad" value="Crear">
              </form>
            </div>
            <!--CARD BODY-->
          </div>
        </div>
        <!--actividades-->

        <!--tareas-->
        <div id="tareas" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto shadow">
            <div class="card-header header bg-white text-center">
              <h4>Tareas</h4>
            </div>
            <div class="card-body">
              <h6 class="text-primary">Selecciona la tarea a publicar</h6>
              <hr>
              <form action="src/drivers/driverTareas.php" method="post">
                <div class="form-row">
                  <div class="col-md-9">
                    <select class="form-control" name="tareaPublicar">
                      <?php
                        include('src/conexion_bd.php');
                        $sql = "SELECT tareas.titulo, materia.id, materia.nombre, tareas.id AS t FROM tareas
                        INNER JOIN materia ON tareas.materia = materia.id
                        WHERE tareas.status = '300' AND tareas.grupo = '".$grupo."' ORDER BY tareas.id DESC;";
                        $resultado = mysqli_query($con, $sql);
                        while($fila = mysqli_fetch_array($resultado)){
                          echo "<option value=".$fila['t'].">".$fila['titulo']." - ".$fila['nombre']."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <input type="submit" class="btn btn-primary" name="publicarTarea" value="Publicar">
                  </div>
                </div>
              </form>
              <br>
              <h6 class="text-primary">Si lo deseas, tambien puedes crear una nueva</h6>
              <hr>
              <form action="src/drivers/driverTareas.php" method="post">
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" name="titulo">
                  </div>
                  <div class="col-md-4">
                    <label for="materia">Materia</label>
                    <select class="form-control" name="materia">
                      <?php
                        include('src/conexion_bd.php');
                        $sql = "SELECT * FROM materia ORDER BY id ASC";
                        $resultado = mysqli_query($con, $sql);
                        while($fila = mysqli_fetch_array($resultado)){
                          echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="semana">Semana</label>
                    <input type="text" class="form-control" name="semana">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="descripcion">Descripción de la tarea</label>
                    <textarea name="descripcion" class="form-control" rows="4" cols="80"></textarea>
                  </div>
                  <div class="col-md-3">
                    <label for="periodoTarea">Periodo</label>
                    <select class="form-control" name="periodoTarea" required>
                      <option value="">Periodo de evaluacion</option>
                      <?php
                        $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                        $resultado = mysqli_query($con, $sql);
                        while ($fila = mysqli_fetch_array($resultado)) {
                          echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="fecha_ent">fecha de entrega</label>
                    <input type="date" class="form-control" name="fecha_ent">
                  </div>
                </div>
                <br>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="archivo">
                  <label class="form-check-label" for="exampleCheck1">Activa esta opción si deseas que tu alumno suba un archivo de esta tarea a la plataforma</label>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="crearTarea" value="Crear">
              </form>
            </div>
            <!--Card-body-->
          </div>
          <!--CARD-->
        </div>
        <!--tareas-->

        <!--promedios-->
        <div id="promedio" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto shadow">
            <div class="card-header header bg-white text-center">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1">Actividades</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab2">Tareas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab3">Examen y participaciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab4">Promedios</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                  <form id="formularioCalAct" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="periodo">Periodo:</label>
                        <select class="form-control" name="periodo" id="selectPeriodo" required>
                          <option value="">Selecciona un periodo de evaluacion</option>
                          <?php
                          $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                          $resultado = mysqli_query($con, $sql);
                          while ($fila = mysqli_fetch_array($resultado)) {
                            echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                          }
                        ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="periodo">Materia:</label>
                        <select class="form-control" name="materia" id="selectMateria" required>
                          <option value="">Selecciona la materia</option>
                          <?php
                            $sql = "SELECT * FROM materia";
                            $resultado = mysqli_query($con, $sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                            echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                          }
                        ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="">Actividad a calificar:</label>
                        <select class="form-control" name="actividad" id="selectActividadCal">

                        </select>
                      </div>
                    </div>
                    <hr>
                    <div id="formCalificacionesAct"></div>
                    <br>
                    <div id="captura">
                    </div>
                  </form>
                </div>
                <div class="tab-pane " id="tab2">
                  <form id="formularioCalTareas" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="periodo">Periodo:</label>
                        <select class="form-control" name="periodoTareas" id="selectPeriodoTareas" required>
                          <option value="">Selecciona un periodo de evaluacion</option>
                          <?php
                          $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                          $resultado = mysqli_query($con, $sql);
                          while ($fila = mysqli_fetch_array($resultado)) {
                            echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                          }
                        ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="periodo">Materia:</label>
                        <select class="form-control" name="materiaTareas" id="selectMateriaTareas" required>
                          <option value="">Selecciona la materia</option>
                          <?php
                          $sql = "SELECT * FROM materia";
                          $resultado = mysqli_query($con, $sql);
                          while ($fila = mysqli_fetch_array($resultado)) {
                            echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                          }
                        ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="">Tarea a calificar:</label>
                        <select class="form-control" name="tareaCal" id="selectTareaCal">

                        </select>
                      </div>
                    </div>
                    <hr>
                    <div id="formCalificacionesTareas"></div>
                    <br>
                    <div id="capturaTarea">
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="tab3">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="periodo">Periodo:</label>
                      <select class="form-control" name="periodoTareas" id="selectPeriodoParEx" required>
                        <option value="">Selecciona un periodo de evaluacion</option>
                        <?php
                        $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                        $resultado = mysqli_query($con, $sql);
                        while ($fila = mysqli_fetch_array($resultado)) {
                          echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="periodo">Materia:</label>
                      <select class="form-control" name="materiaTareas" id="selectMateriaParEx" required>
                        <option value="">Selecciona la materia</option>
                        <?php
                        $sql = "SELECT * FROM materia";
                        $resultado = mysqli_query($con, $sql);
                        while ($fila = mysqli_fetch_array($resultado)) {
                          echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div id="formCalificacionesPE" method="post"></div>
                  <br>
                  <div id="msjParEx"></div>
                </div>
                <div class="tab-pane" id="tab4">
                  <h6 class="text-primary">Indica los porcentajes de ponderación</h6>
                  <hr>
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">Actividades</label>
                      <input type="number" id="pondActividades" class="form-control" min="1" max="99">
                    </div>
                    <div class="col-md-3">
                      <label for="">Tareas</label>
                      <input type="number" id="pondTareas" class="form-control" min="1" max="99">
                    </div>
                    <div class="col-md-3">
                      <label for="">Participaciones</label>
                      <input type="number" id="pondParticipaciones" class="form-control" min="1" max="99">
                    </div>
                    <div class="col-md-3">
                      <label for="">Examen</label>
                      <input type="number" id="pondExamen" class="form-control" min="1" max="99">
                    </div>
                  </div>
                  <br>

                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="periodo">Periodo:</label>
                      <div class="input-group">
                        <select class="form-control" name="periodoTareas" id="selectPeriodoPromedios" required>
                          <option value="">Selecciona un periodo de evaluacion</option>
                          <?php
                          $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                          $resultado = mysqli_query($con, $sql);
                          while ($fila = mysqli_fetch_array($resultado)) {
                            echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                          }
                        ?>
                        </select>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-primary" id="generarPromedios">Generar promedios</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div id="msjPromedios"></div>
                </div>
              </div>
            </div>
          </div>
          <!--CARD-->
        </div>
        <!--promedios-->

        <!--proyecto-->
        <div id="proyecto" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto shadow">
            <div class="card-header header bg-white text-center">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tab1Proyecto">Asignar proyecto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tab2Proyecto">Calificar proyecto</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="tab1Proyecto">
                  <h6 class="text-primary">Asigna un proyecto a tu grupo</h6>
                  <hr>
                  <form id="escalaRetro" method="post">
                    <div class="form-row">
                      <div class="col-md-4">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" name="tituloProyecto" required>
                      </div>
                      <div class="col-md-4">
                        <label for="materia">Materia</label>
                        <select class="form-control" name="materiaProyecto" required>
                          <?php
                            include('src/conexion_bd.php');
                            $sql = "SELECT * FROM materia ORDER BY id ASC";
                            $resultado = mysqli_query($con, $sql);
                            while($fila = mysqli_fetch_array($resultado)){
                              echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="">Periodo</label>
                        <select class="form-control" name="periodoProyecto" required>
                          <option value="">Periodo de evaluacion</option>
                          <?php
                            $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                            $resultado = mysqli_query($con, $sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                              echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="form-row">
                      <div class="col-md-9">
                        <label for="descripcion">Descripción del proyecto</label>
                        <textarea name="descripcionProyecto" class="form-control" rows="4" cols="80" required></textarea>
                      </div>
                      <div class="col-md-3">
                        <label for="fecha_entProyecto">fecha de entrega</label>
                        <input type="date" class="form-control" name="fecha_entProyecto" required>
                      </div>
                    </div>
                    <br>
                    <h6 class="text-primary">Define un comentario de retroalimentación para cada escala</h6>
                    <hr>
                    <div class="form-row">
                      <div class="col-md-3">
                        <label for="">Excelente</label>
                        <textarea name="retroExcelente" class="form-control" rows="4" cols="80" required></textarea>
                      </div>
                      <div class="col-md-3">
                        <label for="">Bueno</label>
                        <textarea name="retroBueno" class="form-control" rows="4" cols="80" required></textarea>
                      </div>
                      <div class="col-md-3">
                        <label for="">Regular</label>
                        <textarea name="retroRegular" class="form-control" rows="4" cols="80" required></textarea>
                      </div>
                      <div class="col-md-3">
                        <label for="">Insuficiente</label>
                        <textarea name="retroInsuficiente" class="form-control" rows="4" cols="80" required></textarea>
                      </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" name="crearProyecto" id="insertProyecto" value="Crear">
                  </form>
                  <br>
                  <div id="resProyecto"></div>
                </div>
                <div class="tab-pane" id="tab2Proyecto">
                  <form id="formularioCalPro" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="periodo">Periodo:</label>
                        <select class="form-control" name="periodoProyecto" id="selectPeriodoProyecto" required>
                          <option value="">Selecciona un periodo de evaluacion</option>
                          <?php
                          $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                          $resultado = mysqli_query($con, $sql);
                          while ($fila = mysqli_fetch_array($resultado)) {
                            echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div id="formCalificacionesProyecto"></div>
                    <br>
                    <div id="capturaProyecto">
                    </div>
                  </form>
                </div>
              </div>
              <!--Card-body-->
            </div>
            <!--CARD-->
          </div>
        </div>
      <!--proyecto-->

      <div id="reportes" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header header bg-white text-center">
            <h4 class="text-center">Reportes</h4>
          </div>
          <div class="card-body">
            <form action="src/pluginPDF/formato.php" method="post">
              <label for="periodoReporteDocente">Selecciona el periodo del reporte</label>
              <select class="form-control" name="periodoReporteDocente" required>
                <option value="">Periodo de evaluacion</option>
                <?php
                    $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                    $resultado = mysqli_query($con, $sql);
                    while ($fila = mysqli_fetch_array($resultado)) {
                      echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                    }
                  ?>
              </select>
              <br>
              <input type="submit" name="generarRepDocente" class="btn btn-primary" value="Generar reporte">
              <hr>
            </form>
            <br>
            <h6 class="text-primary">Si lo deseas, da un comentario a tus alumnos sobre su desempeño durante el periodo de evaluación</h6>
            <hr>
            <form action="src/comentarios.php" method="post">
              <div class="form-row">
                <div class="col-md-4">
                  <label for="alumno">Alumno:</label>
                  <select class="form-control" name="alumnoComentario" required>
                    <option value="">Selecciona un alumno a calificar</option>
                    <?php
                        $sql = "SELECT * FROM alumno WHERE grupo_fk = '".$grupo."'";
                        $resultado = mysqli_query($con, $sql);
                        while($fila = mysqli_fetch_array($resultado)){
                          echo "<option value=".$fila['nickname'].">".$fila['ap_paterno']." ".$fila['ap_materno']." ".$fila['nombre']."</option>";
                        }
                      ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="periodo">Periodo:</label>
                  <select class="form-control" name="periodoComentario" required>
                    <option value="">Selecciona un periodo de evaluacion</option>
                    <?php
                      $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                      $resultado = mysqli_query($con, $sql);
                      while ($fila = mysqli_fetch_array($resultado)) {
                        echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="comentario">Comentario</label>
                  <textarea name="comentario" class="form-control" rows="4" cols="80"></textarea>
                </div>
              </div>
              <br>
              <input type="submit" name="enviarComentario" class="btn btn-primary" value="Comentar">
            </form>
          </div>
        </div>
      </div>
      <!--row-->

      <!--calendario-->
      <div id="calendario" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header header bg-white text-center">
            <h4>Calendario</h4>
          </div>
          <div class="card-body">
            <div id="calendarView">

            </div>
          </div>
          <!--Card-body-->
        </div>
        <!--CARD-->
      </div>
      <!--calendario-->
    </div>
    <!--contenido-->
    </div>
    <!--wrapper-->

    <script type="text/javascript">

    $('#excelPlaneacion').on('change',function(){
          //get the file name
          var text = $(this).val();
          //replace the "Choose a file" label
          text = text.substring(text.lastIndexOf("\\") + 1, text.length);
          $(this).next('.custom-file-label').html(text);
      });

      //control de panel lateral
      $(document).ready(function() {

        $('#sidebarCollapse').on('click', function() {
          $('#sidebar').toggleClass('active');
        });

      });

      //Mostrar la opcion de panel lateral
      var divs = ["actRealizadas", "tareasAsignadas", "tareasArchivo", "planeacion", "tareas", "actividades", "promedio", "proyecto", "reportes", "calendario"];
      var visibleDivId = null;

      function toggleVisibility(divId) {
        if (visibleDivId === divId) {
          visibleDivId = null;
        } else {
          visibleDivId = divId;
        }
        hideNonVisibleDivs();
      }

      function hideNonVisibleDivs() {
        var i, divId, div;
        for (i = 0; i < divs.length; i++) {
          divId = divs[i];
          div = document.getElementById(divId);
          if (visibleDivId === divId) {
            div.style.display = "block";
          } else {
            div.style.display = "none";
          }
        }
      }
      //Mostrar la opcion de panel lateral

      //Seleccionar formulario
      $(function() {
        $('#formSelect0').change(function() {
          $('.formulario').hide();
          $('#' + $(this).val()).show();
        });
      });
      //seleccionar formulario

      $("ul li ul li").click(function() {
        // If this isn't already active
        if (!$(this).hasClass("active")) {
          // Remove the class from anything that is active
          $("ul li ul li.active").removeClass("active");
          // And make this active
          $(this).addClass("active");
        }
      });

      // When we click on the LI
      $("li").click(function() {
        // If this isn't already active
        if (!$(this).hasClass("active")) {
          // Remove the class from anything that is active
          $("li.active").removeClass("active");
          // And make this active
          $(this).addClass("active");
        }
      });
    </script>
  </body>

  </html>
