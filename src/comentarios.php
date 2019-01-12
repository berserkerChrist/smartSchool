<?php
  session_start();
  include('conexion_bd.php');

  if (isset($_POST['enviarComentario'])) {
    $alumno = $con->real_escape_string($_POST['alumnoComentario']);
    $periodo = $con->real_escape_string($_POST['periodoComentario']);
    $comentario = $con->real_escape_string($_POST['comentario']);
    $docente = $_SESSION['nomina'];

    $sql = "INSERT INTO comentarios (id_alumno, id_docente, comentario, periodo)
    VALUES ('$alumno', '$docente', '$comentario', '$periodo')";

    $resultado = mysqli_query($con, $sql);
    if($resultado){
      header('Location: ../panelMaestro.php');
    }
  }

?>
