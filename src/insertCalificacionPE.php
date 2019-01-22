<?php

  include('conexion_bd.php');
  session_start();

  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacionEx = $con->real_escape_string($_POST['calExamen']);
  $calificacionPar = $con->real_escape_string($_POST['calParticipacion']);
  $materia = $con->real_escape_string($_POST['materia']);
  $periodo = $con->real_escape_string($_POST['periodo']);
  $grupo = $_SESSION['grupoDocente'];

  $sql = "INSERT INTO partexam (id_alumno, periodo, materia, participaciones, examen, grupo)
  VALUES ('$alumno', '$periodo', '$materia', '$calificacionPar', '$calificacionEx', '$grupo')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Exito!";
  }

?>
