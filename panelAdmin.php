<?php

session_start();
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Panel de administrador</title>
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="js/ajax.js" charset="utf-8"></script>
  <script src="js/calendario.js" charset="utf-8"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="bg-gradBlue">
      <div class="sidebar-header">
        <h3 class="text-center"><i class="fas fa-user-cog fa-2x"></i><br>Hola admin</h3>
        <strong><i class="fas fa-user-cog fa-2x"></i></strong>
      </div>
      <ul class="list-unstyled components">
        <li>
          <a href="#" onclick="toggleVisibility('agregarDocente')">
            <i class="fas fa-user-plus fa-lg"></i>Agregar docente
          </a>
        </li>
        <li>
          <a href="#eliminarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
            <i class="fas fa-user-plus fa-lg"></i>Baja de usuarios
          </a>
          <ul class="collapse list-unstyled" id="eliminarSubmenu">
            <li>
              <a href="#" onclick="toggleVisibility('eliminarDocente')">Baja docente</a>
            </li>
            <li>
              <a href="#" onclick="toggleVisibility('eliminarAlumno')">Baja alumno</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#gruposSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
            <i class="fas fa-users fa-lg"></i>Administrar grupos
          </a>
          <ul class="collapse list-unstyled" id="gruposSubmenu">
            <li>
              <a href="#" onclick="toggleVisibility('crearGrupo')">Crear grupo</a>
            </li>
            <li>
              <a href="#" onclick="toggleVisibility('modificarGrupo')">Modificar grupos</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#datosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
            <i class="fas fa-users fa-lg"></i>Modificar datos
          </a>
          <ul class="collapse list-unstyled" id="datosSubmenu">
            <li>
              <a href="#" onclick="toggleVisibility('modificarDatosA')">Alumnos</a>
            </li>
            <li>
              <a href="#" onclick="toggleVisibility('modificarDatosD')">Docentes</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" onclick="toggleVisibility('periodos')">
            <i class="far fa-calendar-check fa-lg"></i>Periodo de evaluación
          </a>
        </li>
        <li>
          <a href="#" onclick="toggleVisibility('calendario')">
            <i class="far fa-calendar-alt fa-lg"></i>Calendario
          </a>
        </li>
        <li class="show-none">
          <a href="src/proces-unlgn.php">
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
            <a href="#" class=" nav-link text-white">
              <i class="fas fa-sign-out-alt fa-lg"></i> Cerrar sesión
            </a>
          </li>
        </ul>
      </nav>

      <!--agregar docente-->
      <div id="agregarDocente" class="espacioTop paddingSides">

        <div class="card w-100 mx-auto shadow">
          <div class="card-header">
            <h4 class="text-center">Agregar usuario docente</h4>
          </div>

          <div class="card-body">
            <form action="src/agregarDocente.php" method="post">
              <h6 class="text-primary">Datos de docente</h6>
              <hr>
              <div class="form-row">
                <div class="col-md-4 mb-2">
                  <label for="nombreDocente">Nombre(s)</label>
                  <input type="text" class="form-control" id="nombreDocente" name="nombreDocente" pattern="[a-zA-Z\s]+" title="No se admiten caracteres especiales o números"  required>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="apPaterno">Apellido paterno</label>
                  <input type="text" class="form-control" id="apPaterno" name="apPaterno"  pattern="[a-zA-Z]+" title="No se admiten caracteres especiales o números"  required>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="apMaterno">Apellido materno</label>
                  <input type="text" class="form-control" id="apMaterno" name="apMaterno"  pattern="[a-zA-Z]+" title="No se admiten caracteres especiales o números" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-3 mb-3">
                  <label for="nomina">Nómina</label>
                  <input type="text" class="form-control" id="nomina" name="nomina" pattern="[A-Z0-9]+" title="No se admiten caracteres especiales"  required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="grupo">Grupo</label>
                  <select class="form-control" name="grupoDocente" required>
                    <option value="">Elige un grupo</option>
                    <?php
                      include('src/conexion_bd.php');
                      $sql = "SELECT * FROM grupo ORDER BY id_grupo DESC";
                      $resultado = mysqli_query($con, $sql);
                      while($fila = mysqli_fetch_array($resultado)){
                        echo "<option value=".$fila['id_grupo'].">".$fila['grupo']."</option>";
                      }
                     ?>
                  </select>
                </div>
              </div>
              <hr>
              <button class="btn btn-primary" type="submit">Agregar docente</button>
            </form>
          </div>
          <!--CARD BODY-->
        </div>
        <!--CARD-->
      </div>
      <!--agregar docente-->

      <!--eliminar docente-->
      <div id="eliminarDocente" class="espacioTop paddingSides none">

        <div class="card w-100 mx-auto shadow">
          <div class="card-header bg-white text-center">
            <h4>Baja usuario docente</h4>
          </div>

          <div class="card-body">
            <div>
              <form action="src/eliminarDocente.php" method="post" id="buscar-docente">
                <div class="form-row">
                  <label for="deleteDocente">Ingresa la nómina del docente</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="deleteDocente" name="deleteDocente" pattern="[A-Z0-9]" title="No se admiten caracteres especiales" onkeyup="buscarDocente()">
                  </div>
                </div>
              </form>
              <br>
              <!--tablaScript eliminarProv-->
              <div class="table-responsive" id="ver-buscarProv">

              </div>
              <!--tablaScript eliminarProv-->
            </div>
            <!--formulario 1-->
          </div>
          <!--CARD BODY-->
        </div>
        <!--CARD-->
      </div>
      <!--eliminar docente-->

      <!--eliminar Alumno-->
      <div id="eliminarAlumno" class="espacioTop paddingSides none">

        <div class="card w-100 mx-auto shadow">
          <div class="card-header bg-white text-center">
            <h4>Eliminar usuario alumno</h4>
          </div>

          <div class="card-body">
            <div class="formulario 1">
              <form action="src/eliminarAlumno.php" method="post" id="buscar-alumno">
                <div class="form-row">
                  <label for="deleteProv">Nombre de alumno</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="deleteAlumno" name="deleteAlumno" pattern="[A-Z0-9]" title="No se admiten caracteres especiales" onkeyup="buscarAlumno()">
                  </div>
                </div>
              </form>
              <br>
              <!--tablaScript eliminarProv-->
              <div class="table-responsive" id="ver-buscarAlumno">

              </div>
              <!--tablaScript eliminarProv-->
            </div>
            <!--formulario 1-->
          </div>
          <!--CARD BODY-->
        </div>
        <!--CARD-->
      </div>
      <!--eliminar Alumno-->

      <!--modificarGrupo-->
      <div id="modificarGrupo" class="espacioTop paddingSides none">
        <!--row-->
        <div class="card w-100 mx-auto shadow">
          <div class="card-header bg-white text-center">
            <h4>Modificar grupo</h4>
          </div>

          <div class="card-body">
            <div class="formulario 1">
              <form action="#" method="post" id="buscar-grupo">
                <div class="form-row">
                  <label for="modGroup">Ingresa el grupo que quieres modificar</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="modGrupo" name="modGrupo" onkeyup="buscarGrupo()">
                  </div>
                </div>
              </form>
              <br>
              <!--tablaScript eliminarProv-->
              <div class="table-responsive" id="ver-buscarGrupo">

              </div>
              <!--tablaScript eliminarProv-->
            </div>
            <!--formulario 1-->
          </div>
          <!--CARD BODY-->
        </div>
        <!--CARD-->
        <!--row-->
      </div>
      <!--modificarGrupo-->

      <!--crearGrupo-->
      <div id="crearGrupo" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header">
            <h4 class="text-center">Crear grupo virtual</h4>
          </div>
          <div class="card-body">
            <form action="src/crearGrupo.php" method="post">
              <h6 class="text-primary">Datos del grupo</h6>
              <hr>
              <div class="form-row">
                <div class="col-md-4 mb-2">
                  <label for="nombreProv">Grado y grupo</label>
                  <input type="text" class="form-control" id="nombreProv" pattern="[1-6A-F]+" title="Formato invalido" name="nombreGrupo" required>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="nombreProv">Ciclo escolar</label>
                  <input type="text" class="form-control" id="cicEscolar" pattern="[0-9-]+" title="Escribe el ciclo escolar separado por un guión" name="cicloEscolar" required>
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Crear grupo</button>
            </form>
          </div>
          <!--CARD BODY-->
        </div>
        <!--CARD-->
      </div>
      <!--crearGrupo-->

      <!--datos docente-->
      <div id="modificarDatosD" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header header bg-white text-center">
            <h4>Modificar datos de docente</h4>
          </div>
          <div class="card-body">
            <form action="#" method="post" id="modificar-docente">
              <div class="form-row">
                <label for="modificarDocente">Ingresa la nómina del docente</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="modDocente" name="modDocente" onkeyup="modificarDocente()">
                </div>
              </div>
            </form>
            <br>
            <div class="table-responsive" id="ver-buscarDocente">

            </div>
          </div>
          <!--Card-body-->
        </div>
        <!--CARD-->
      </div>
      <!--datos docente-->

      <!--datos alumno-->
      <div id="modificarDatosA" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header header bg-white text-center">
            <h4>Modificar datos de alumno</h4>
          </div>
          <div class="card-body">
            <form action="#" method="post" id="modificar-alumno">
              <div class="form-row">
                <label for="modificarAlumno">Ingresa el nombre del alumno</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="modAlumno" name="modAlumno" onkeyup="modificarAlumno()">
                </div>
              </div>
            </form>
            <br>
            <div class="table-responsive" id="ver-buscarAlumnoMod">

            </div>
          </div>
          <!--Card-body-->
        </div>
        <!--CARD-->
      </div>
      <!--datos alumno-->

      <!--periodos de evaluacion-->
      <div id="periodos" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header">
            <h4 class="text-center">Periodos de evaluación</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-primary">Iniciar periodo de evaluación</h6>
                <hr>
                <form action="src/drivers/driverPeriodo.php" method="post">
                  <label for="periodo">Nuevo periodo:</label>
                  <div class="input-group">
                    <input type="text" name="periodo" class="form-control" required value="trimestre ">
                    <input type="submit" name="crearPeriodo" class="btn btn-primary" value="Iniciar">
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <h6 class="text-primary">Terminar periodo de evaluación</h6>
                <hr>
                <form action="src/drivers/driverPeriodo.php" method="post">
                  <label for="periodo">Periodo:</label>
                  <div class="input-group">
                    <select class="form-control" name="concluirPeriodo" required>
                      <option value="">Selecciona un periodo de evaluacion</option>
                      <?php
                        $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                        $resultado = mysqli_query($con, $sql);
                        while ($fila = mysqli_fetch_array($resultado)) {
                          echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                        }
                      ?>
                    </select>
                    <input type="submit" name="concluir" class="btn btn-primary" value="Concluir">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--periodos de evaluacion-->

      <!--calendario-->
      <div id="calendario" class="espacioTop paddingSides none">
        <div class="card w-100 mx-auto shadow">
          <div class="card-header header bg-white text-center">
            <h4>Calendario</h4>
          </div>
          <div class="card-body">
            <div id="calendar"></div>
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

  <!--Modificar docente-->
  <div id="modalModificarDocente" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualizar datos de docente</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form">
            <label for="nominaDocente">Nomina:</label>
            <input type="text" name="nominaDocente" id="nominaDocente" class="form-control" disabled>
            <label for="nombreDoc">Nombre:</label>
            <input type="text" name="nombreDoc" id="nombreDoc" pattern="[a-zA-Z\s]+" title="No se admiten caracteres especiales o números" class="form-control">
            <br />
            <label for="apPaternoDocente">Apellido paterno:</label>
            <input type="text" name="apPaternoDocente" id="apPaternoDocente" pattern="[a-zA-Z]+" title="No se admiten caracteres especiales o números" class="form-control">
            <br />
            <label for="apMaternoDocente">Apellido materno</label>
            <input type="text" name="apMaternoDocente" id="apMaternoDocente" pattern="[a-zA-Z]+" title="No se admiten caracteres especiales o números" class="form-control" >
            <br />
            <label for="grupo">Grupo</label>
            <select class="form-control" name="grupofk" id="grupofk">
              <?php
                include('src/conexion_bd.php');
                $select = "SELECT * FROM grupo WHERE status = '200' ORDER BY id_grupo ASC";
                $res = mysqli_query($con, $select);
                while($fila = mysqli_fetch_array($res)){
                  echo "<option value=".$fila['id_grupo'].">".$fila['grupo']." ".$fila['ciclo_escolar']."</option>";
                }
               ?>
            </select>
            <br />
            <input type="hidden" name="nominaDoc" id="nominaDoc">
            <input type="submit" name="insert" id="insert" class="btn btn-primary" />
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modificar docente-->

  <!--Modificar alumno-->
  <div id="modalModificarAlumno" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualizar datos de docente</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form_alumno">
            <label for="nicknameAlumno">Nombre de usuario:</label>
            <input type="text" name="nicknameAlumno" id="nicknameAlumno" class="form-control" disabled>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombreAl" id="nombreAl" class="form-control">
            <br />
            <label for="apPaternoAlumno">Apellido paterno:</label>
            <input type="text" name="apPaternoAlumno" id="apPaternoAlumno" pattern="[a-zA-Z]+" title="No se admiten caracteres especiales o números" class="form-control">
            <br />
            <label for="apMaternoAlumno">Apellido materno</label>
            <input type="text" name="apMaternoAlumno" id="apMaternoAlumno" pattern="[a-zA-Z]+" title="No se admiten caracteres especiales o números" class="form-control" >
            <br />
            <label for="grupofkAl">Grupo</label>
            <select class="form-control" name="grupofkAl" id="grupofkAl" required>
              <?php
                include('src/conexion_bd.php');
                $select = "SELECT id_grupo, grupo FROM grupo ORDER BY id_grupo ASC";
                $res = mysqli_query($con, $select);
                while($fila = mysqli_fetch_array($res)){
                  echo "<option value=".$fila['id_grupo'].">".$fila['grupo']."</option>";
                }
               ?>
            </select>
            <br />
            <input type="hidden" name="nickAlumno" id="nickAlumno">
            <input type="submit" name="insertAl" id="insertAl" class="btn btn-primary" />
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modificar alumno-->

  <!--Modificar grupo-->
  <div id="modalModificarGrupo" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Mover grupo</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form_grupo">
            <div class="form-row">
              <div class="col-md-6">
                <label for="">Grupo anterior:</label>
                <input type="text" id="grupoAnterior" class="form-control" disabled>
              </div>
              <div class="col-md-6">
                <label for="">Ciclo escolar:</label>
                <input type="text" id="cicloEscolarAnterior" class="form-control" disabled>
              </div>
            </div>
            <label for="">Cambiar status de grupo:</label>
            <select class="form-control" name="statusGrupo" id="statusGrupo">
              <option value="">Selecciona un status</option>
              <option value="404">Inactivo</option>
            </select>
            <br>
            <h6 class="text-primary">Crea el grupo nuevo</h6>
            <hr>
            <div class="form-row">
              <div class="col-md-6">
                <label for="">Grupo:</label>
                <input type="text" name="nombreNuevoG" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="">Ciclo escolar nuevo:</label>
                <input type="text" name="nuevoCE" class="form-control" required>
              </div>
            </div>
            <input type="hidden" name="idAntiguoGrupo" id="idAntiguoGrupo">
            <br>
            <input type="submit" name="insertGr" id="insertGr" class="btn btn-primary" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Modificar grupo-->

  <script type="text/javascript">
    //control de panel lateral
    $(document).ready(function() {

      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });

    });

    //Mostrar la opcion de panel lateral
    var divs = ["agregarDocente", "eliminarDocente", "eliminarAlumno", "crearGrupo", "modificarGrupo", "modificarDatosD", "modificarDatosA", "periodos", "calendario"];
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
