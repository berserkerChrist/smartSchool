<?php

include('conexion_bd.php');

$nomina = $con->real_escape_string($_POST['nominaReg']);
$password = $con->real_escape_string($_POST['passwordReg']);

$sql = "UPDATE maestro
  SET
  password = '".$password."',
  status = '200'
  WHERE nomina = '".$nomina."'
";

$resultado = mysqli_query($con, $sql).mysqli_error($con);

if ($resultado) {
  header('Location: ../index.php');
}else {
  echo "Ocurrio un error :(";
}

?>
