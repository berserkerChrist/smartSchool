<?php

  include('../conexion_bd.php');

  if (!empty($_POST['idGr'])) {
    $grupo = $con->real_escape_string($_POST['idGr']);

    $query = "SELECT * FROM grupo WHERE id_grupo = '".$grupo."' AND status = '200'";
    $row = mysqli_query($con, $query);
    $resultado = mysqli_fetch_array($row);
    echo json_encode($resultado);
  };

?>
