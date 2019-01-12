<?php

  include('conexion_bd.php');

  $id = $con->real_escape_string($_POST['id']);
  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacion = $con->real_escape_string($_POST['calificacion']);
  $materia = $con->real_escape_string($_POST['materiaCalActividades']);
  $periodo = $con->real_escape_string($_POST['periodoCalActividades']);

  $sql = "INSERT INTO relactividades (id_alumno, id_actividad, calificacion, materia, periodo) VALUES ('$alumno', '$id', '$calificacion', '$materia', '$periodo')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Calificacion capturada con exito!";
  }

?>
