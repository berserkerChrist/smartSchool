<?php
include('../conexion_bd.php');
session_start();
$grupo = $_SESSION['grupofkAlumno'];
$alumno = $_SESSION['nickname'];

if (isset($_POST['submitTarea'])) {
  if(is_uploaded_file($_FILES['archivoTarea']['tmp_name'])) {
    $rutaInicial = "../../files/";
    $nombreArchivo = trim($_FILES['archivoTarea']['name']);
    $rutaSubida = $rutaInicial . $nombreArchivo;
    $idTarea = $_POST['idTarea'];
    $materia = $_POST['materiaArc'];
    $periodo = $_POST['periodoArc'];


    if (move_uploaded_file($_FILES['archivoTarea']['tmp_name'], $rutaSubida)) {
      echo "El archivo ha sido subido con exito";
      $query = "INSERT INTO archivos (id_alumno, id_tarea, archivo, materia, periodo, grupo)
      VALUES ('$alumno', '$idTarea', '$nombreArchivo', '$materia', '$periodo', '$grupo')";
      $resultado = mysqli_query($con, $query);
      if ($resultado) {
        header('Location: ../../panelAlumno.php');
      }
    }

  }
}
?>
