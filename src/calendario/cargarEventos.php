<?php

  include('../conexion_bd.php');

  $data = array();
  $query = "SELECT * FROM calendario ORDER BY id";
  $resultado = mysqli_query($con, $query);

  while($row = mysqli_fetch_array($resultado)){
      $data[] = array(
        'id'   => $row["id"],
        'title'   => $row["titulo"],
        'start'   => $row["fecha_inicio"],
        'end'   => $row["fecha_fin"]
      );
  }

  echo json_encode($data);

 ?>
