<?php
  session_start();
  include('../conexion_bd.php');

  $periodo = $con->real_escape_string($_POST['periodoShowProyecto']);
  $alumno = $_SESSION['hijo'];

  $sql = "SELECT * FROM proyecto INNER JOIN alumno ON alumno.nickname = '".$alumno."'
  WHERE proyecto.grupo_fk = alumno.grupo_fk AND proyecto.periodo = '".$periodo."'";
  //echo $sql;
  $resultado = mysqli_query($con, $sql);
  $fila = mysqli_fetch_array($resultado);

  $grupo = $fila['grupo_fk'];
  $id_proyecto = $fila['id'];

  $sqlCalificacion = "SELECT * FROM relproyecto WHERE id_alumno = '".$alumno."' AND id_proyecto = '".$id_proyecto."'";
  $resultadoCalificacion = mysqli_query($con, $sqlCalificacion);
  $filaCal = mysqli_fetch_array($resultadoCalificacion);

  $sqlRetro = "SELECT * FROM retro WHERE grupo = '".$grupo."'";
  $resRetro = mysqli_query($con, $sqlRetro);
  $filaRetro = mysqli_fetch_array($resRetro);

  if ($filaCal['calificacion'] >= 10) {
    $comentario = $filaRetro['excelente'];
  }
  if ($filaCal['calificacion'] >= 7 && $filaCal['calificacion'] <= 9) {
    $comentario = $filaRetro['bueno'];
  }
  if ($filaCal['calificacion'] >= 5 && $filaCal['calificacion'] < 7) {
    $comentario = $filaRetro['regular'];
  }
  if ($filaCal['calificacion'] < 5) {
    $comentario = $filaRetro['insuficiente'];
  }
  //$resultado2 = mysqli_query($con, $sql2);

    //$fila2 = mysqli_fetch_array($resultado2);
    echo'
    <div class="row">
      <div class="col-sm-6">
        <h6 class="text-primary">Título</h6>
        <hr class="sm">
        <p class="text-dark">'.$fila['titulo'].'</p>
      </div>
      <div class="col-sm-6">
        <h6 class="text-primary">Fecha de entrega</h6>
        <hr class="sm">
        <p>'.$fila['fecha_realizado'].'</p>
      </div>
    </div>
      <h6 class="text-primary">Descripción</h6>
      <hr>
      <p class="text-dark">'.$fila['descripcion'].'
      </p>
      <div class="row">
        <div class="col-sm-6">
          <h6 class="text-primary">Calificación</h6>
          <hr class="sm">
          <p>'.$filaCal['calificacion'].'</p>
        </div>
        <div class="col-sm-6">
          <h6 class="text-primary">Observaciones</h6>
          <hr class="sm">
          <p>'.$comentario.'</p>
        </div>
      </div>
    ';

?>
