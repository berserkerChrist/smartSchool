<?php

    include('conexion_bd.php');

    $emailPadre = $con->real_escape_string($_POST['emailRegistroPadre']);
    $nombrePadre = $con->real_escape_string($_POST['nombrePadre']);
    $rol = $con->real_escape_string($_POST['rol']);
    $apPaterno = $con->real_escape_string($_POST['apellidoPatPadre']);
    $apMaterno = $con->real_escape_string($_POST['apellidoMatPadre']);
    $password = $con->real_escape_string($_POST['passwordRegistro']);
    $hijo = $con->real_escape_string($_POST['alumnoPadre']);

    if(!empty($emailPadre) && !empty($nombrePadre)){
      $sql = "INSERT INTO padre (correo, password, rol, nombre, ap_paterno, ap_materno, alumno_fk) VALUES ('$emailPadre', '$password', '$rol', '$nombrePadre', '$apPaterno', '$apMaterno', '$hijo')";
      $resultado = mysqli_query($con, $sql).mysqli_error($con);

      if ($resultado) {
        header('Location: ../index.php');
      }
    }
?>
