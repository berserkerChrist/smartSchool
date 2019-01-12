<?php
  include('conexion_bd.php');
  $grupo = $con->real_escape_string($_POST['grupo']);
  $sql = "SELECT * FROM alumno WHERE grupo_fk = '".$grupo."'";
  $resultado = mysqli_query($con, $sql);
  while($fila = mysqli_fetch_array($resultado)){
    echo "<option value=".$fila['nickname'].">".$fila['ap_paterno']." ".$fila['ap_materno']." ".$fila['nombre']."</option>";
  }
 ?>
