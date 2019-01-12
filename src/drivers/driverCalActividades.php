<?php
  session_start();
  include('../conexion_bd.php');

  $grupo = $_SESSION['grupoDocente'];
  $periodo = $con->real_escape_string($_POST['periodo']);
  $materia = $con->real_escape_string($_POST['materia']);


  $sql = "SELECT * FROM actividades WHERE grupo_fk = '".$grupo."' AND periodo = '".$periodo."'
  AND status = '200' AND materia = '".$materia."'";
  $resultado = mysqli_query($con, $sql);

  while($fila = mysqli_fetch_array($resultado)){

    echo '
      <label for="'.$fila['id'].'">'.$fila['titulo'].':</label>
      <input type="text" class="form-control" name="'.$fila['titulo'].'" id="'.$fila['id'].'cal" onblur="insertarCalificacion('.$fila['id'].')" pattern="[0-9]+" required>
      <input type="hidden" id="'.$fila['id'].'materia" value="'.$materia.'">
      <input type="hidden" id="'.$fila['id'].'periodo" value="'.$periodo.'">
    ';

  }

 ?>
