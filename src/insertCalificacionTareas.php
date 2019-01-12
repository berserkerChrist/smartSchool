<?php

  include('conexion_bd.php');

  $id = $con->real_escape_string($_POST['id']);
  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacion = $con->real_escape_string($_POST['calificacion']);
  $materia = $con->real_escape_string($_POST['materiaCalTarea']);
  $periodo = $con->real_escape_string($_POST['periodoCalTarea']);

  $sql = "INSERT INTO reltarea (id_alumno, id_tarea, calificacion, materia, periodo) VALUES ('$alumno', '$id', '$calificacion', '$materia', '$periodo')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Calificacion capturada con exito!";
  }

?>
