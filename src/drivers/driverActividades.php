<?php
  session_start();
  include('../conexion_bd.php');
  $fecha = date("Y/m/d");

  if(isset($_POST['crearActividad'])){
    $titulo = $con->real_escape_string($_POST['tituloAct']);
    $periodo = $con->real_escape_string($_POST['periodoAct']);
    $materia = $con->real_escape_string($_POST['materiaAct']);
    $descipcion = $con->real_escape_string($_POST['descripcionAct']);
    $status = 300;
    $grupo = $_SESSION['grupoDocente'];

    $sql = "INSERT INTO actividades (materia, titulo, descripcion, fecha_realizada, periodo, grupo_fk, status)
    VALUES ('$materia', '$titulo', '$descipcion', '$fecha', '$periodo', '$grupo','$status')";

    $resultado = mysqli_query($con, $sql);
     if($resultado){
       header('Location: ../../panelMaestro.php');
     }
  }else if(isset($_POST['publicarActividad'])){
    $actividad = $con -> real_escape_string($_POST['actividad']);
    $sql = "UPDATE actividades SET status = '200', fecha_realizada = '".$fecha."' WHERE id = '".$actividad."'";
    $resultado = mysqli_query($con, $sql);
    if($resultado){
      header('Location: ../../panelMaestro.php');
    }
  }

 ?>
