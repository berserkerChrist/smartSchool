<?php

  include('conexion_bd.php');

  if (isset($_POST['nominaDoc'])) {
    $nomina = $con->real_escape_string($_POST['nominaDoc']);
    $nombre = $con->real_escape_string($_POST['nombreDoc']);
    $apPaterno = $con->real_escape_string($_POST['apPaternoDocente']);
    $apMaterno = $con->real_escape_string($_POST['apMaternoDocente']);
    $grupo = $con->real_escape_string($_POST['grupofk']);


    $sql = "UPDATE maestro
      SET
      nombre = '$nombre',
      ap_paterno = '$apPaterno',
      ap_materno = '$apMaterno',
      grupo_fk = '$grupo'
      WHERE nomina = '".$nomina."'
    ";

    $resultado = mysqli_query($con, $sql).mysqli_error($con);

    if ($resultado) {
      echo "Datos actualizados correctamente";
    }else {
      echo "Ocurrio un error :(";
    }
  }else if(isset($_POST['nominaBaja'])){
    $nomina = $con->real_escape_string($_POST['nominaBaja']);

    $sql = "UPDATE maestro SET status = '404' WHERE nomina = '".$nomina."'";
    $resultado = mysqli_query($con, $sql);
    if ($resultado) {
      echo "Datos actualizados correctamente";
    }else {
      echo "Ocurrio un error :(";
    }

  }

?>
