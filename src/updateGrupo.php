<?php

  include('conexion_bd.php');

  $status = $con->real_escape_string($_POST['statusGrupo']);
  $id = $con->real_escape_string($_POST['idAntiguoGrupo']);

  $sql = "UPDATE grupo SET status = '".$status."' WHERE id_grupo = '".$id."'";
  $resultado = mysqli_query($con, $sql);

  if ($resultado) {
    echo "Datos actualizados correctamente";
  }else {
    echo "Ocurrio un error :(";
  }

?>
