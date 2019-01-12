<?php

  include('conexion_bd.php');

  $nombreAlumno = $con -> real_escape_string($_POST['nombreAlumno']);
  $apPaterno = $con -> real_escape_string($_POST['apPaterno']);
  $apMaterno = $con -> real_escape_string($_POST['apMaterno']);
  $grupo = $con -> real_escape_string($_POST['grupoAlumno']);
  $nickname = $con->real_escape_string($_POST['nickname']);
  $password = $con->real_escape_string($_POST['password']);

  echo $nombreAlumno;
  echo $apPaterno;
  echo $apMaterno;
  echo $grupo;
  echo $nickname;
  echo $password;

  $sql = "INSERT INTO alumno (nickname, password, nombre, ap_paterno, ap_materno, grupo_fk, status)
  VALUES ('$nickname', '$password', '$nombreAlumno', '$apPaterno', '$apMaterno', '$grupo', '200')";
  $resultado = mysqli_query($con, $sql).mysqli_error($con);

  $updateRel = "INSERT INTO relgrupo (id_grupo, id_alumno) VALUES ('$grupo', '$nickname')";
  mysqli_query($con, $updateRel).mysqli_error($con);

  if ($resultado) {
    header('Location: ../index.php');
  }

 ?>
