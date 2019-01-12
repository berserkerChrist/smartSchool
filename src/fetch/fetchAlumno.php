<?php
 include('../conexion_bd.php');

 if (!empty($_POST['nickname'])) {
   $alumno = $con->real_escape_string($_POST['nickname']);
   $query = "SELECT * FROM alumno WHERE nickname = '".$alumno."' AND status = '200'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result);

   echo json_encode($row);

 }else {
   echo "error";
 }
?>
