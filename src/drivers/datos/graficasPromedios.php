<?php

  include('../../conexion_bd.php');
  session_start();

  if (isset($_POST['periodoGraficasPromedios'])) {

    $queryAux = "SELECT grupo_fk FROM alumno WHERE nickname = '".$_SESSION['hijo']."'";
    $resAux = mysqli_query($con, $queryAux);
    $fila = mysqli_fetch_array($resAux);

    $grupo = $fila['grupo_fk'];
    $periodo = $con->real_escape_string($_POST['periodoGraficasPromedios']);
    $alumno = $_SESSION['hijo'];

    //echo "$grupo $periodo $materia $alumno";

    $sql = "SELECT * FROM promedios INNER JOIN materia ON promedios.materia = materia.id
    WHERE promedios.id_alumno = '".$alumno."' AND promedios.periodo = '".$periodo."' AND promedios.grupo = '".$grupo."'";
    $resultado = mysqli_query($con, $sql);
    //$fila = mysqli_fetch_array($resultado);
    $data = array();
    foreach ($resultado as $fila) {
      $data[] = $fila;
    }
    echo json_encode($data);
  }

?>
