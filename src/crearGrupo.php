<?php

  include('conexion_bd.php');

  $nombreGrupo = $con->real_escape_string($_POST['nombreGrupo']);
  $cicloEscolar = $con->real_escape_string($_POST['cicloEscolar']);

  $sql = "INSERT INTO grupo (grupo, ciclo_escolar, status) VALUES ('$nombreGrupo', '$cicloEscolar', '200')";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    header('Location: ../PanelAdmin.php');
  }

 ?>
