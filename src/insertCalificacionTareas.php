<?php

  include('conexion_bd.php');
  session_start();

  $tarea = $con->real_escape_string($_POST['tarea']);
  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacion = $con->real_escape_string($_POST['calificacion']);
  $materia = $con->real_escape_string($_POST['materiaCalTarea']);
  $periodo = $con->real_escape_string($_POST['periodoCalTarea']);
  $grupo = $_SESSION['grupoDocente'];

  $sql = "INSERT INTO reltarea (id_alumno, id_tarea, calificacion, materia, periodo, grupo) VALUES ('$alumno', '$tarea', '$calificacion', '$materia', '$periodo', '$grupo')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Calificacion capturada con exito!";
  }

?>
