<?php

  require('conexion_bd.php');

  $nomina = $con->real_escape_string($_POST['nominaLog']);
  $password = $con->real_escape_string($_POST['passwordLogDocente']);

  if (!empty($nomina) && !empty($password)) {
    $sql = "SELECT * FROM maestro WHERE nomina = '".$nomina."' AND password = '".$password."'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) > 0) {
      $fila = mysqli_fetch_array($resultado);
      session_start();
      $_SESSION['nombreDocente'] = $fila['nombre'];
      $_SESSION['grupoDocente'] = $fila['grupo_fk'];
      $_SESSION['apPatDocente'] = $fila['ap_paterno'];
      $_SESSION['apMatDocente'] = $fila['ap_materno'];
      $_SESSION['nomina'] = $nomina;
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      header('Location: ../panelMaestro.php');
    }
    else {
      echo "El usuario o la contraseña son incorrectos :(";
    }
  }

 ?>
