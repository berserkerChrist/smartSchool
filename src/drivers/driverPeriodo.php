<?php

  include('../conexion_bd.php');


  if (isset($_POST['crearPeriodo'])) {
    $periodo = $con->real_escape_string($_POST['periodo']);

    $sql = "INSERT INTO p_evaluacion (id, periodo, status) VALUES ('', '$periodo', '200')";
    $resultado = mysqli_query($con, $sql);
    if ($resultado) {
      header('Location: ../../panelAdmin.php');
    }
  }elseif (isset($_POST['concluir'])) {
    $periodo = $con->real_escape_string($_POST['concluirPeriodo']);
    $sql = "UPDATE p_evaluacion SET status = '400' WHERE id = '$periodo'";
    $resultado = mysqli_query($con, $sql);
    if ($resultado) {
      header('Location: ../../panelAdmin.php');
    }
  }

?>
