<?php

  include('../conexion_bd.php');
  session_start();

  $limite = $con -> real_escape_string($_POST['limiteDocTareasArc']);
  $inicio = $con -> real_escape_string($_POST['inicioDocTareasArc']);
  $grupo = $_SESSION['grupoDocente'];
  $rutaInicial = "files/";

  $query = "SELECT archivos.id, archivos.id_tarea, archivos.id_alumno, archivos.archivo, archivos.materia, archivos.periodo, archivos.grupo, archivos.subida,
            tareas.id, tareas.titulo, tareas.descripcion, tareas.fecha_ent, materia.id, materia.nombre, alumno.nickname, alumno.nombre AS al FROM archivos
            INNER JOIN tareas ON archivos.id_tarea = tareas.id
            INNER JOIN materia ON archivos.materia = materia.id
            INNER JOIN alumno ON archivos.id_alumno = alumno.nickname
            WHERE archivos.grupo = '".$grupo."' ORDER BY archivos.id DESC LIMIT ".$inicio.", ".$limite."";

  $resultado = mysqli_query($con, $query);
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
        <div class="row">
          <div class="col-md-6">
            <h6 class="text-primary">Descripción</h6>
            <hr>
            <p class="text-dark">'.$fila['descripcion'].'</p>
          </div>
          <div class="col-md-6">
            <h6 class="text-primary">Fecha de entrega</h6>
            <hr>
            <p>'.$fila['fecha_ent'].'</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h6 class="text-primary">Tarea</h6>
            <hr>
            Tu alumno <strong>'.$fila['al'].'</strong> ha subido esta tarea
            <br>
            <br>
            <strong class="text-primary"><a href="'.$rutaInicial.''.$fila['archivo'].'">'.$fila['archivo'].'</a></strong>
          </div>
          <div class="col-md-6">
            <h6 class="text-primary">Hora de subida</h6>
            <hr>
            La tarea fue subida el: <strong>'.$fila['subida'].'</strong>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    ';
  }

?>
