<?php
  session_start();

  if(empty($_SESSION['nombrePadre'])){
    header("Location: index.php");
  }



 ?>

  <!DOCTYPE html>

  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Panel de Padre</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="js/ajax.js" charset="utf-8"></script>
    <script src="js/vistaCalendario.js" charset="utf-8"></script>
    <script src="js/graficas/lineChartPadre.js" charset="utf-8"></script>
    <script src="js/graficas/barChartPadre.js" charset="utf-8"></script>
  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar" class="bg-gradBlue">
        <div class="sidebar-header shadow-sm">
          <h3 class="text-center"><i class="material-icons md-64">supervised_user_circle</i><br>Hola <?php echo $_SESSION['nombrePadre']; ?></h3>
          <strong><i class="material-icons md-64">supervised_user_circle</i></strong>
        </div>

        <ul class="list-unstyled components">
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
                <a href="#" onclick="toggleVisibility('promedio')">Promedios</a>
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
            <a href="#" class="text-white">
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

        <!--tareas-->
        <div id="tareas" class="espacioTop paddingSides">
          <div id="mostrarTareas"></div>
          <div class="text-center" id="cargando"></div>
          <br>
        </div>
        <!--tareas-->

        <!--actividades-->
        <div id="actividades" class="espacioTop paddingSides none">
          <div id="mostrarActividades"></div>
          <div class="text-center" id="cargandoAct"></div>
          <br>
        </div>
        <!--actividades-->

        <!--promedios-->
        <div id="promedio" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto shadow">
            <div class="card-header header text-center">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#promedios">Promedios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#graficas">Gráficas</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div id="promedios" class="container tab-pane active">
                  <canvas id="bar-chart" width="800" height="450"></canvas>
                </div>
                <div id="graficas" class="container tab-pane">
                  <canvas id="line-chart" width="800" height="450"></canvas>
                </div>
              </div>
            </div>
            <!--Card-body-->
          </div>
          <!--CARD-->
        </div>
        <!--promedios-->

        <!--proyecto-->
        <div id="proyecto" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto shadow">
            <div class="card-header header text-center">
              <h4 class="">Proyecto</h4>
            </div>
            <div class="card-body">
              <div class="col-md-4">
                <label for="periodoTarea">Periodo</label>
                <select class="form-control" name="p" id="selectShowProyecto" required>
                  <option value="">Periodo de evaluacion</option>
                  <?php
                  include('src/conexion_bd.php');
                  $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                  $resultado = mysqli_query($con, $sql);
                  while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                  }
                ?>
                </select>
              </div>
              <br>
              <div id="mostrarProyecto">

              </div>
            </div>
            <!--CARD BODY-->
          </div>
          <!--CARD-->
        </div>
        <!--proyecto-->

        <div id="reportes" class="espacioTop paddingSides none">
          <div class="card w-100 mx-auto shadow">
            <div class="card-header header bg-white text-center">
              <h4 class="text-center">Reportes</h4>
            </div>
            <div class="card-body">
              <form action="src/pluginPDF/formato.php" method="post" class="col-6 mx-auto">
                <label for="periodoReporteAlumno">Selecciona el periodo del reporte</label>
                <select class="form-control" name="periodoReporteAlumno" required>
                  <option value="">Periodo de evaluacion</option>
                  <?php
                  include('src/conexion_bd.php');
                  $sql = "SELECT * FROM p_evaluacion WHERE status = '200'";
                  $resultado = mysqli_query($con, $sql);
                  while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<option value=".$fila['id'].">".$fila['periodo']."</option>";
                  }
                ?>
                </select>
                <br>
                <input type="submit" name="generarRepPadre" class="btn btn-primary" value="Generar reporte">
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
      //control de panel lateral
      $(document).ready(function() {

        $('#sidebarCollapse').on('click', function() {
          $('#sidebar').toggleClass('active');
        });

      });

      //Mostrar la opcion de panel lateral
      var divs = ["tareas", "actividades", "promedio", "proyecto", "reportes", "calendario"];
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
