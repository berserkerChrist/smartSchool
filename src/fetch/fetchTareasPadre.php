<?php
  session_start();
  include('../conexion_bd.php');

  $limite = $con -> real_escape_string($_POST['limite']);
  $inicio = $con -> real_escape_string($_POST['inicio']);
  $alumno = $_SESSION['hijo'];

  $sql = "SELECT tareas.id, tareas.titulo, tareas.materia, tareas.descripcion, tareas.fecha_ent, tareas.grupo, tareas.status, tareas.upload,
          alumno.nickname, alumno.grupo_fk, materia.id, materia.nombre  FROM tareas
          INNER JOIN alumno ON alumno.nickname = '".$alumno."'
          INNER JOIN materia ON tareas.materia = materia.id
          WHERE tareas.grupo = alumno.grupo_fk AND tareas.status = '200'
          ORDER BY tareas.id DESC LIMIT ".$inicio.", ".$limite."";

  /*$sql2 = "SELECT * FROM tareas INNER JOIN alumno ON alumno.nickname = '".$alumno."'
          WHERE tareas.grupo = alumno.grupo_fk AND tareas.status = '200'
          ORDER BY id DESC LIMIT ".$inicio.", ".$limite."";*/


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
                  <h6 class="text-primary">Materia</h6>
                  <hr>
                  <p class="text-dark">'.$fila['materia'].'</p>
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
