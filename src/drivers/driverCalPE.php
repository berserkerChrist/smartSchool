<?php
  session_start();
  include('../conexion_bd.php');

  $grupo = $_SESSION['grupoDocente'];
  $sql = "SELECT * FROM alumno WHERE grupo_fk = '".$grupo."'";
  $resultado = mysqli_query($con, $sql);

  while($fila = mysqli_fetch_array($resultado)){
    echo '
    <br>
      <label for="'.$fila['nickname'].'"><strong>'.$fila['nombre'].' '.$fila['ap_paterno'].' '.$fila['ap_materno'].':</strong></label>
        <div class="row">
          <div class="col-md-5">
            <label for="">Examen:</label>
            <input type="number" class="form-control" min="0" max="10" id="'.$fila['nickname'].'calEx">
          </div>
          <div class="col-md-5">
            <label for="">Participaciones:</label>
            <input type="number" class="form-control" min="0" max="10" id="'.$fila['nickname'].'calPar">
          </div>
          <div class="col-md-2 my-1">
            <br>
            <button type="button" class="btn btn-primary" onclick="insertarCalificacionPE(';
    echo "'".$fila['nickname']."')".'">Calificar</button></div></div>';

  }

 ?>
