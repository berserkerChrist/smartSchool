<?php

include('../conexion_bd.php');

if(isset($_POST["id"])){
  $id = $_POST['id'];
  $query = "DELETE FROM calendario WHERE id='$id'";
  mysqli_query($con, $query);

}

 ?>
