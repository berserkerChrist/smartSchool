<?php
  session_start();
  include('../conexion_bd.php');

  $grupo = $_SESSION['grupoDocente'];
  $sql = "SELECT * FROM alumno WHERE grupo_fk = '".$grupo."'";
  $resultado = mysqli_query($con, $sql);

  while($fila = mysqli_fetch_array($resultado)){

    echo '
      <label for="'.$fila['nickname'].'">'.$fila['nombre'].' '.$fila['ap_paterno'].' '.$fila['ap_materno'].':</label>
      <input type="text" class="form-control" nickname="'.$fila['nickname'].'" id="'.$fila['nickname'].'cal" onblur="insertarCalificacionTareas(';
    echo "'".$fila['nickname']."')".'">';

  }

 ?>
