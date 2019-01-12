<?php

  include('../conexion_bd.php');
  session_start();

  $excelente = $con->real_escape_string($_POST['retroExcelente']);
  $bueno = $con->real_escape_string($_POST['retroBueno']);
  $regular = $con->real_escape_string($_POST['retroRegular']);
  $insuficiente = $con->real_escape_string($_POST['retroInsuficiente']);
  $docente = $_SESSION['nomina'];
  $grupo = $_SESSION['grupoDocente'];

  $sqlRetro = "INSERT INTO retro (docente, grupo, excelente, bueno, regular, insuficiente)
  VALUES ('$docente', '$grupo', '$excelente', '$bueno', '$regular', '$insuficiente')";
  $resultadoRetro = mysqli_query($con, $sqlRetro);

  $titulo = $con->real_escape_string($_POST['tituloProyecto']);
  $materia = $con->real_escape_string($_POST['materiaProyecto']);
  $descrpcion = $con->real_escape_string($_POST['descripcionProyecto']);
  $fecha = $con->real_escape_string($_POST['fecha_entProyecto']);
  $periodo = $con->real_escape_string($_POST['periodoProyecto']);

  $sqlProyecto = "INSERT INTO proyecto (materia, titulo, descripcion, fecha_realizado, grupo_fk, periodo)
  VALUES ('$materia', '$titulo', '$descrpcion', '$fecha', '$grupo', '$periodo')";
  $resultadoProyecto = mysqli_query($con, $sqlProyecto);

  echo "<div class='alert alert-success' role='alert'>
          <strong>¡Datos insertados correctamente!</strong>
        </div>
    ";

?>
