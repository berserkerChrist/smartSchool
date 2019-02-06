<?php
  session_start();
  include('../conexion_bd.php');

  $limite = $con -> real_escape_string($_POST['limiteAct']);
  $inicio = $con -> real_escape_string($_POST['inicioAct']);
  $alumno = $_SESSION['hijo'];

  $sql = "SELECT * FROM actividades INNER JOIN alumno ON alumno.nickname = '".$alumno."'
          WHERE actividades.grupo_fk = alumno.grupo_fk AND actividades.status = '200'
          ORDER BY actividades.id DESC LIMIT ".$inicio.", ".$limite."";

  /*$sql2 = "SELECT materia.nombre, tareas.materia, alumno.nickname FROM materia, tareas, alumno
           WHERE materia.id = tareas.materia AND status = '200' AND alumno.nickname = '".$alumno."'
           ORDER BY tareas.id DESC";*/

  $resultado = mysqli_query($con, $sql);
  //$resultado2 = mysqli_query($con, $sql2);


  while ($fila = mysqli_fetch_array($resultado)) {
    //$fila2 = mysqli_fetch_array($resultado2);
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
            <h6 class="text-primary">Fecha en que se realizó</h6>
            <hr>
            <p class="text-dark">'.$fila['fecha_realizada'].'</p>
          </div>
        </div>
        <h6 class="text-primary">Descripción</h6>
        <hr>
        <p class="text-dark">'.$fila['descripcion'].'</p>
      </div>
    </div>
    <br>
    <br>
    ';
  }

?>
