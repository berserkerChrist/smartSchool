<?php

  include('../../conexion_bd.php');
  session_start();

  if (isset($_POST['periodoGraficas'])) {

    $queryAux = "SELECT grupo_fk FROM alumno WHERE nickname = '".$_SESSION['hijo']."'";
    $resAux = mysqli_query($con, $queryAux);
    $fila = mysqli_fetch_array($resAux);

    $grupo = $fila['grupo_fk'];
    $periodo = $con->real_escape_string($_POST['periodoGraficas']);
    $materia = $con->real_escape_string($_POST['materiaGraficas']);
    $alumno = $_SESSION['hijo'];

    //echo "$grupo $periodo $materia $alumno";

    $sql = "SELECT * FROM relactividades INNER JOIN actividades ON relactividades.id_actividad = actividades.id
    WHERE relactividades.periodo = '".$periodo."' AND relactividades.grupo = '".$grupo."' AND relactividades.id_alumno = '".$alumno."'
    AND relactividades.materia = '".$materia."'";

    $resultado = mysqli_query($con, $sql);
    //$fila = mysqli_fetch_array($resultado);
    $data = array();
    foreach ($resultado as $fila) {
      $data[] = $fila;
    }

    echo json_encode($data);
  }

?>
