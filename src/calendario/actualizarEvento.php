<?php

include('../conexion_bd.php');

if(isset($_POST["id"])){
  $titulo  = $_POST['titulo'];
  $inicio = $_POST['inicio'];
  $fin = $_POST['fin'];
  $id = $_POST['id'];

  $query = "UPDATE calendario SET titulo='$titulo', fecha_inicio='$inicio', fecha_fin='$fin' WHERE id='$id'";
  mysqli_query($con, $query);
}

 ?>
