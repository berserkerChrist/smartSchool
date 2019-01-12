<?php

  require('conexion_bd.php');

  $nickname = $con->real_escape_string($_POST['nickname']);
  $password = $con->real_escape_string($_POST['passwordLogAlumno']);

  if (!empty($nickname) && !empty($password)) {
    $sql = "SELECT * FROM alumno WHERE nickname = '".$nickname."' AND password = '".$password."'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) > 0) {
      $fila = mysqli_fetch_array($resultado);
      session_start();
      $_SESSION['nombreAlumno'] = $fila['nombre'];
      $_SESSION['apPatAlumno'] = $fila['ap_paterno'];
      $_SESSION['apMatAlumno'] = $fila['ap_materno'];
      $_SESSION['nickname'] = $fila['nickname'];
      $_SESSION['grupofkAlumno'] = $fila['grupo_fk'];
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      header('Location: ../panelAlumno.php');
    }
    else {
      echo "El usuario o la contraseña son incorrectos :(";
    }
  }

 ?>
