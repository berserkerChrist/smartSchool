<?php
  include('conexion_bd.php');
  session_start();

  if (isset($_POST['grupo'])) {
    $grupo = $con->real_escape_string($_POST['grupo']);
    $sql = "SELECT * FROM alumno WHERE grupo_fk = '".$grupo."'";
    $resultado = mysqli_query($con, $sql);
    while($fila = mysqli_fetch_array($resultado)){
      echo "<option value=".$fila['nickname'].">".$fila['ap_paterno']." ".$fila['ap_materno']." ".$fila['nombre']."</option>";
    }
  }

  if (isset($_POST['periodoGraficas'])) {
    $sql = "SELECT * FROM materia ORDER BY id ASC";
    $resultado = mysqli_query($con, $sql);
    echo "<option>Selecciona una materia</option>";
    while($fila = mysqli_fetch_array($resultado)){
      echo "
        <option value=".$fila['id'].">".$fila['nombre']."</option>
      ";
    }
  }

  if (isset($_POST['materiaCalActividades'])) {
    $grupo = $_SESSION['grupoDocente'];
    $materia = $_POST['materiaCalActividades'];
    $sql = "SELECT * FROM actividades WHERE status = '200' AND grupo_fk = '".$grupo."' AND materia = '".$materia."' ORDER BY id DESC";
    $resultado = mysqli_query($con, $sql);
    echo "<option>Selecciona una actividad</option>";
    while($fila = mysqli_fetch_array($resultado)){
      echo "<option value=".$fila['id'].">".$fila['titulo']."</option>";
    }
  }

  if (isset($_POST['materiaCalTareas'])) {
    $grupo = $_SESSION['grupoDocente'];
    $materia = $_POST['materiaCalTareas'];
    $sql = "SELECT * FROM tareas WHERE status = '200' AND grupo = '".$grupo."' AND materia = '".$materia."' ORDER BY id DESC";
    $resultado = mysqli_query($con, $sql);
    echo "<option>Selecciona una tarea</option>";
    while($fila = mysqli_fetch_array($resultado)){
      echo "<option value=".$fila['id'].">".$fila['titulo']."</option>";
    }
  }

  if (isset($_POST['periodoCalProy'])) {
    $grupo = $_SESSION['grupoDocente'];
    $periodo = $_POST['periodoCalProy'];
    $sql = "SELECT id, titulo FROM proyecto WHERE grupo_fk = '".$grupo."' AND periodo = '".$periodo."' ORDER BY id DESC";
    $resultado = mysqli_query($con, $sql);
    echo "<option>Selecciona un proyecto</option>";
    while($fila = mysqli_fetch_array($resultado)){
      echo "<option value=".$fila['id'].">".$fila['titulo']."</option>";
    }
  }
 ?>
 ?>
