<?php
  session_start();
  include('../conexion_bd.php');

  $limite = $con -> real_escape_string($_POST['limiteDocTareas']);
  $inicio = $con -> real_escape_string($_POST['inicioDocTareas']);
  $grupo = $_SESSION['grupoDocente'];

  $sql = "SELECT * FROM tareas INNER JOIN materia ON tareas.materia = materia.id
  WHERE tareas.grupo = '".$grupo."' AND tareas.status = '200' ORDER BY tareas.id DESC LIMIT ".$inicio.", ".$limite."";

  //$sql2 = "SELECT materia.nombre, tareas.materia FROM materia, tareas WHERE materia.id = tareas.materia AND status = '200'";

  $resultado = mysqli_query($con, $sql);
  //$resultado2 = mysqli_query($con, $sql2);


  while ($fila = mysqli_fetch_array($resultado)) {
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

?>
