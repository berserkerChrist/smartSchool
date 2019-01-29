<?php
  session_start();
  include('../conexion_bd.php');

  $limite = $con -> real_escape_string($_POST['limite']);
  $inicio = $con -> real_escape_string($_POST['inicio']);
  $grupo = $_SESSION['grupofkAlumno'];
  $alumno = $_SESSION['nickname'];

  $sql = "SELECT tareas.titulo, tareas.descripcion, tareas.materia, tareas.fecha_ent, tareas.upload, tareas.periodo,
  materia.id, materia.nombre, tareas.id AS tid FROM tareas
  INNER JOIN materia ON tareas.materia = materia.id
  WHERE tareas.grupo = '".$grupo."' AND tareas.status = '200' ORDER BY tareas.id DESC LIMIT ".$inicio.", ".$limite."";
  $resultado = mysqli_query($con, $sql);
  //$resultado2 = mysqli_query($con, $sql2);


  while ($fila = mysqli_fetch_array($resultado)) {
    if ($fila['upload'] == true) {
      echo '
      <div class="card w-100 mx-auto shadow">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-primary">Título</h6>
              <hr>
              <p class="text-dark">'.$fila['titulo'].'</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-primary">Materia</h6>
              <hr>
              <p class="text-dark">'.$fila['nombre'].'</p>
            </div>
          </div>
          <h6 class="text-primary">Descripción</h6>
          <hr>
          <p class="text-dark">'.$fila['descripcion'].'</p>
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-primary">Fecha de entrega</h6>
              <hr>
              <p>'.$fila['fecha_ent'].'</p>
            </div>
            <div class="col-md-6">
              <h6 class="text-primary">Sube aqui tu tarea</h6>
              <hr>';

              $valAux = "SELECT archivos.id_tarea, archivos.id_alumno, archivos.archivo FROM archivos
              WHERE archivos.id_tarea = '".$fila['tid']."' AND archivos.id_alumno = '".$alumno."'";
              $resAux = mysqli_query($con, $valAux);
              $filaAux = mysqli_fetch_array($resAux);

              if (isset($filaAux['id_tarea'])) {
                echo '
                        <p class="text-dark">Ya has subido este archivo: <strong>'.$filaAux['archivo'].'</strong></p>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                ';
              }else {
                echo '
                        <form action="src/drivers/driverUploads.php" method="post" enctype="multipart/form-data">
                          <span class="btn btn-primary btn-file">
                            Buscar Archivo <input type="file" onchange="prueba()" name="archivoTarea">
                          </span>
                          <input type="submit" name="submitTarea" class="btn btn-primary" value="Subir tarea">
                          <input type="hidden" name="idTarea" value="'.$fila['tid'].'">
                          <input type="hidden" name="materiaArc" value="'.$fila['materia'].'">
                          <input type="hidden" name="periodoArc" value="'.$fila['periodo'].'">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                ';
              }
    }
    else {
      echo'
          <div class="card w-100 mx-auto shadow">
            <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-primary">Título</h6>
                <hr>
                <p class="text-dark">'.$fila['titulo'].'</p>
              </div>
              <div class="col-md-6">
                <h6 class="text-primary">Materia</h6>
                <hr>
                <p class="text-dark">'.$fila['nombre'].'</p>
              </div>
            </div>

                  <h6 class="text-primary">Descripción</h6>
                  <hr>
                  <p class="text-dark">'.$fila['descripcion'].'</p>
                  <h6 class="text-primary">Fecha de entrega</h6>
                  <hr>
                  <p>'.$fila['fecha_ent'].'</p>

            </div>
          </div>
          <br>
          <br>
      ';
    }
  }

?>
