<?php

  include('conexion_bd.php');

  $status = $con->real_escape_string($_POST['statusGrupo']);
  $id = $con->real_escape_string($_POST['idAntiguoGrupo']);
  $nomNuevoGrupo = $con->real_escape_string($_POST['nombreNuevoG']);
  $nuevoCE = $con->real_escape_string($_POST['nuevoCE']);

  $nuevoGrupo = crearGrupo($nomNuevoGrupo, $nuevoCE);
  moverAlumnos($nuevoGrupo, $id);
  bajaGrupo($id, $status);

  function crearGrupo($nombre, $cicloEsc){
    include('conexion_bd.php');
    $query = "INSERT INTO grupo (grupo, ciclo_escolar, status) VALUES ('$nombre', '$cicloEsc', '200')";
    mysqli_query($con, $query);

    $sql = "SELECT * FROM grupo WHERE grupo = '".$nombre."' AND ciclo_escolar = '".$cicloEsc."'";
    echo $sql;
    $resultado = mysqli_query($con, $sql);
    $fila = mysqli_fetch_array($resultado);

    return $fila['id_grupo'];
  }

  function moverAlumnos($grupo, $antiguoGrupo){
    include('conexion_bd.php');
    $query = "UPDATE alumno SET grupo_fk = '".$grupo."' WHERE grupo_fk = '".$antiguoGrupo."'";
    mysqli_query($con, $query);
  }

  function bajaGrupo($id, $status){
    include('conexion_bd.php');
    $sql = "UPDATE grupo SET status = '".$status."' WHERE id_grupo = '".$id."'";
    $resultado = mysqli_query($con, $sql);
  }

?>
