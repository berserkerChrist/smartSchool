<?php

  include('conexion_bd.php');

  $id = $con->real_escape_string($_POST['id']);
  $alumno = $con->real_escape_string($_POST['alumno']);
  $calificacion = $con->real_escape_string($_POST['calificacion']);

  $sql = "INSERT INTO relproyecto (id_alumno, id_proyecto, calificacion) VALUES ('$alumno', '$id', '$calificacion')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "¡Calificacion capturada con exito!";
  }

?>
