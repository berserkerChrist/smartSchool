<?php

  include('conexion_bd.php');

  if (isset($_POST['nickAlumno'])) {
    $nickname = $con->real_escape_string($_POST['nickAlumno']);
    $nombre = $con->real_escape_string($_POST['nombreAl']);
    $apPaterno = $con->real_escape_string($_POST['apPaternoAlumno']);
    $apMaterno = $con->real_escape_string($_POST['apMaternoAlumno']);
    $grupo = $con->real_escape_string($_POST['grupofkAl']);

    $sql = "UPDATE alumno
      SET
      nombre = '$nombre',
      ap_paterno = '$apPaterno',
      ap_materno = '$apMaterno',
      grupo_fk = '$grupo'
      WHERE nickname = '".$nickname."'
    ";

    $resultado = mysqli_query($con, $sql).mysqli_error($con);

    if ($resultado) {
      echo "Datos actualizados correctamente";
    }else {
      echo "Ocurrio un error :(";
    }
  }else if (isset($_POST['nickBaja'])) {
    $nickname = $con->real_escape_string($_POST['nickBaja']);

    $sql = "UPDATE alumno SET status = '404' WHERE nickname = '".$nickname."'";
    $resultado = mysqli_query($con, $sql).mysqli_error($con);

    if ($resultado) {
      echo "Datos actualizados correctamente";
    }else {
      echo "Ocurrio un error :(";
    }
  }

?>
