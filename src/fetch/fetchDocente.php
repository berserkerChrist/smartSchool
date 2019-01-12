<?php
 include('../conexion_bd.php');

 if (!empty($_POST['nomina'])) {
   $docente = $con->real_escape_string($_POST['nomina']);
   $query = "SELECT * FROM maestro WHERE nomina = '".$docente."' AND status = '200'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result);

   echo json_encode($row);

 }else {
   echo "error";
 }
?>
