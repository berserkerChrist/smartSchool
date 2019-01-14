<?php

  include('../conexion_bd.php');

  if (isset($_POST['correoNewPadre'])) {
    $correo = $con->real_escape_string($_POST['correoNewPadre']);
    $pass1 = $con->real_escape_string($_POST['passNewPadre1']);
    $pass2 = $con->real_escape_string($_POST['passNewPadre2']);
    if ($pass1 == $pass2) {
      $sql = "UPDATE padre SET password = '".$pass2."' WHERE correo  = '".$correo."'";
      $resultado = mysqli_query($con, $sql);
      if ($resultado) {
        echo "
        <div class='alert alert-success' role='alert'>
          <strong>¡Exito, en unos momentos podras iniciar sesion con tu nueva contraseña!</strong>
        </div>";
      }
    }
    else {
      echo "las contraseñas no coinciden, vuelve a intentarlo";
    }
  }

  if (isset($_POST['nominaNewDoc'])) {
    $nomina= $con->real_escape_string($_POST['nominaNewDoc']);
    $pass1 = $con->real_escape_string($_POST['passNewDoc1']);
    $pass2 = $con->real_escape_string($_POST['passNewDoc2']);
    if ($pass1 == $pass2) {
      $sql = "UPDATE maestro SET password = '".$pass2."' WHERE nomina = '".$nomina."'";
      $resultado = mysqli_query($con, $sql);
      if ($resultado) {
        echo "
        <div class='alert alert-success' role='alert'>
          <strong>¡Exito, en unos momentos podras iniciar sesion con tu nueva contraseña!</strong>
        </div>";
      }
    }
    else {
      echo "las contraseñas no coinciden, vuelve a intentarlo";
    }
  }

  if (isset($_POST['nickNewAlumno'])) {
    $nickname = $con->real_escape_string($_POST['nickNewAlumno']);
    $pass1 = $con->real_escape_string($_POST['passNewAlumno1']);
    $pass2 = $con->real_escape_string($_POST['passNewAlumno2']);
    if ($pass1 == $pass2) {
      $sql = "UPDATE alumno SET password = '".$pass2."' WHERE nickname = '".$nickname."'";
      $resultado = mysqli_query($con, $sql);
      if ($resultado) {
        echo "
        <div class='alert alert-success' role='alert'>
          <strong>¡Exito, en unos momentos podras iniciar sesion con tu nueva contraseña!</strong>
        </div>";
      }
    }
    else {
      echo "las contraseñas no coinciden, vuelve a intentarlo";
    }
  }

?>
