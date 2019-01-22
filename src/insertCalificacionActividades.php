<?php

  include('conexion_bd.php');
  session_start();

  $actividad = $con->real_escape_string($_POST['actividad']);
  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacion = $con->real_escape_string($_POST['calificacion']);
  $materia = $con->real_escape_string($_POST['materiaCalActividades']);
  $periodo = $con->real_escape_string($_POST['periodoCalActividades']);
  $grupo = $_SESSION['grupoDocente'];

  $sql = "INSERT INTO relactividades (id_alumno, id_actividad, calificacion, materia, periodo, grupo) VALUES ('$alumno', '$actividad', '$calificacion', '$materia', '$periodo', '$grupo')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Calificacion capturada con exito!";
  }

?>
