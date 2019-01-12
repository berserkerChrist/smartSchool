<?php
  session_start();
  include('../conexion_bd.php');

  if(isset($_POST['crearTarea'])){
    $titulo = $con->real_escape_string($_POST['titulo']);
    $materia = $con->real_escape_string($_POST['materia']);
    $descipcion = $con->real_escape_string($_POST['descripcion']);
    $semana = $con->real_escape_string($_POST['semana']);
    $fecha = $con->real_escape_string($_POST['fecha_ent']);
    $periodo = $con->real_escape_string($_POST['periodoTarea']);
    $status = 300;
    $grupo = $_SESSION['grupoDocente'];

    $sql = "INSERT INTO tareas (materia, semana, titulo, descripcion, periodo, fecha_ent, grupo, status)
    VALUES ('$materia', '$semana', '$titulo', '$descipcion', '$periodo', '$fecha', '$grupo','$status')";

    $resultado = mysqli_query($con, $sql);
     if($resultado){
       header('Location: ../../panelMaestro.php');
     }
  }else if(isset($_POST['publicarTarea'])){
    $tarea = $con -> real_escape_string($_POST['tarea']);
    $sql = "UPDATE tareas SET status = '200' WHERE id = '".$tarea."'";
    $resultado = mysqli_query($con, $sql);
    if($resultado){
      header('Location: ../../panelMaestro.php');
    }
  }

 ?>
