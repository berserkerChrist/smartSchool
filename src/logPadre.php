<?php

  require('conexion_bd.php');

  $correo = $con->real_escape_string($_POST['correoLogPadre']);
  $password = $con->real_escape_string($_POST['passwordLogPadre']);

  if (!empty($correo) && !empty($password)) {
    $sql = "SELECT * FROM padre WHERE correo = '".$correo."' AND password = '".$password."'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) > 0) {
      $fila = mysqli_fetch_array($resultado);
      session_start();
      $_SESSION['nombrePadre'] = $fila['nombre'];
      $_SESSION['rol'] = $fila['rol'];
      $_SESSION['hijo'] = $fila['alumno_fk'];
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      header('Location: ../panelPadre.php');
    }
    else {
      echo "El usuario o la contraseña son incorrectos :(";
    }
  }

 ?>
