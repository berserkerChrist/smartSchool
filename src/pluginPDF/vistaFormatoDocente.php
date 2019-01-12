<!DOCTYPE html>
<?php
  session_start();
  include('../conexion_bd.php');
  $periodo = $con->real_escape_string($_POST['periodoReporteDocente']);
?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      }
      .mx-auto {
        margin-left: auto !important;
        margin-right: auto !important;
      }
    </style>
  </head>
  <?php
    //variables
    $grupo = $_SESSION['grupoDocente'];
    $nombre = $_SESSION['nombreDocente'];
    $apellidoPat = $_SESSION['apPatDocente'];
    $apellidoMat = $_SESSION['apMatDocente'];

  ?>
  <body>
    <h2 style="text-align: center;">Reporte de actividades y tareas del trimestre</h2>
    <br>
    <br>

    <h4>Docente: <?php echo "$nombre $apellidoPat $apellidoMat"; ?></h4>
    <h4>Grupo: <?php echo $grupo ?></h4>

    <h4 style="text-align:center;">Actividades</h4>
    <table style="margin:auto;">
      <tr>
        <th>Actividad</th>
        <th>Materia</th>
        <th>Descripcion</th>
        <th>Fecha realizada</th>
      </tr>
    <?php

      $sql = "SELECT * FROM actividades WHERE periodo = '".$periodo."' AND grupo_fk = '".$grupo."' AND status = '200'";
      $resultado = mysqli_query($con, $sql);
      while ($fila = mysqli_fetch_array($resultado)) {
        echo '

        <tr>
          <td>'.$fila['titulo'].'</td>
          <td>'.$fila['materia'].'</td>
          <td>'.$fila['descripcion'].'</td>
          <td>'.$fila['fecha_realizada'].'</td>
        </tr>

        ';
      }
    ?>
    </table>

    <h4 style="text-align:center;">Tareas</h4>
    <table style="margin:auto;">
      <tr>
        <th>Tarea</th>
        <th>Materia</th>
        <th>Descripcion</th>
        <th>Fecha de entrega</th>
      </tr>
    <?php

      $sql = "SELECT * FROM tareas WHERE periodo = '1' AND grupo = '".$grupo."' AND status = '200'";
      $resultado = mysqli_query($con, $sql);
      while ($fila = mysqli_fetch_array($resultado)){
        echo '

        <tr>
          <td>'.$fila['titulo'].'</td>
          <td>'.$fila['materia'].'</td>
          <td>'.$fila['descripcion'].'</td>
          <td>'.$fila['fecha_ent'].'</td>
        </tr>

        ';
      }
    ?>
    </table>
  </body>
</html>

<?php



?>
