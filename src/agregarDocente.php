<?php

  include('conexion_bd.php');

  $nombreDocente = $con->real_escape_string($_POST['nombreDocente']);
  $apPaterno = $con ->real_escape_string($_POST['apPaterno']);
  $apMaterno = $con ->real_escape_string($_POST['apMaterno']);
  $nomina = $con ->real_escape_string($_POST['nomina']);
  $grupo = $con ->real_escape_string($_POST['grupoDocente']);


  $sql = "INSERT INTO maestro (nomina, nombre, ap_paterno, ap_materno, grupo_fk) VALUES ('$nomina', '$nombreDocente', '$apPaterno', '$apMaterno', '$grupo')";
  $resultado = mysqli_query($con, $sql).mysqli_error($con);

  if ($resultado) {
    header('Location: ../panelAdmin.php');
  }


 ?>
