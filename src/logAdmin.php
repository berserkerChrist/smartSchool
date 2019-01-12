<?php

  require('conexion_bd.php');

  $correo = $con->real_escape_string($_POST['emailAdmin']);
  $password = $con->real_escape_string($_POST['passAdmin']);

  if (!empty($correo) && !empty($password)) {
    $sql = "SELECT * FROM admin WHERE correo = '".$correo."' AND password = '".$password."'";
    $resultado = mysqli_query($con, $sql);
    if ($resultado) {

      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      header('Location: ../panelAdmin.php');
    }
    else {
      echo "El usuario o la contraseña son incorrectos :(";
    }
  }

 ?>
