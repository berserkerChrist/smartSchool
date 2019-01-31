<?php

  include('conexion_bd.php');
  session_start();

  $id = $con->real_escape_string($_POST['id']);
  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacion = $con->real_escape_string($_POST['calificacion'])
  $periodo = $con->real_escape_string($_POST['periodoCalProyecto']);
  $grupo = $_SESSION['grupoDocente'];

  $sql = "INSERT INTO relproyecto (id_alumno, id_proyecto, calificacion, periodo, grupo) VALUES ('$alumno', '$id', '$calificacion', '$periodo', '$grupo')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Calificacion capturada con exito!";
  }

?>
