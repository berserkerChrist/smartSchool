<?php
  session_start();
  include('../conexion_bd.php');

  $periodo = $con->real_escape_string($_POST['periodoProyectoshi']);
  $grupo = $_SESSION['grupoDocente'];

  $sql = "SELECT * FROM alumno, proyecto WHERE alumno.grupo_fk = '".$grupo."' AND proyecto.grupo_fk = '".$grupo."' AND proyecto.periodo = '".$periodo."'";
  $resultado = mysqli_query($con, $sql);

  while($fila = mysqli_fetch_array($resultado)){

    echo '
      <label for="">'.$fila['titulo'].':</label>
      <h6>'.$fila['nombre'].' '.$fila['ap_paterno'].' '.$fila['ap_materno'].'</h6><input type="text" class="form-control"  id="'.$fila['id'].'calProyecto" onblur="insertarCalificacionProyecto('.$fila['id'].')" pattern="[0-9]+" required>
      <input type="hidden" id="'.$fila['id'].'Nombre" value="'.$fila['nickname'].'">
    ';

  }

 ?>
