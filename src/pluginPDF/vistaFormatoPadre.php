<!DOCTYPE html>
<?php
  session_start();
  include('../conexion_bd.php');
  $periodo = $con->real_escape_string($_POST['periodoReporteAlumno']);
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

    $son = $_SESSION['hijo'];
    $sql = "SELECT alumno.nickname, alumno.nombre,alumno.ap_paterno, alumno.ap_materno, alumno.grupo_fk, grupo.id_grupo, grupo.grupo, grupo.ciclo_escolar FROM alumno
    INNER JOIN grupo ON alumno.grupo_fk = grupo.id_grupo WHERE alumno.nickname = '".$son."'";
    $resultado = mysqli_query($con, $sql);
    $fila = mysqli_fetch_array($resultado);
    $nombre = $fila['nombre'];
    $apellidoPat = $fila['ap_paterno'];
    $apellidoMat = $fila['ap_materno'];
    $grupo = $fila['grupo'];
    $CE =  $fila['ciclo_escolar'];

  ?>
  <body>
    <h2 style="text-align: center;">Reporte de actividades y tareas del trimestre</h2>
    <br>
    <br>

    <h4>Alumno: <?php echo "$nombre $apellidoPat $apellidoMat"; ?></h4>
    <h4>Grupo: <?php echo $grupo ?></h4>
    <h4>Ciclo escolar: <?php echo $CE ?></h4>

    <h4 style="text-align:center;">Actividades</h4>
    <table style="margin:auto;">
      <tr>
        <th>Actividad</th>
        <th>Materia</th>
        <th>Descripcion</th>
        <th>Fecha realizada</th>
        <th>Calificación</th>
      </tr>
    <?php

      $sql = "SELECT relactividades.id_actividad, relactividades.id_alumno, relactividades.calificacion, relactividades.materia, relactividades.periodo,
      actividades.id, actividades.titulo, actividades.descripcion, actividades.fecha_realizada, materia.id, materia.nombre FROM relactividades
      INNER JOIN actividades ON relactividades.id_actividad = actividades.id
      INNER JOIN materia ON relactividades.materia = materia.id
      WHERE relactividades.id_alumno = '".$son."' AND relactividades.periodo = '".$periodo."'";
      $resultado = mysqli_query($con, $sql);
      while ($fila = mysqli_fetch_array($resultado)) {
        echo '

        <tr>
          <td>'.$fila['titulo'].'</td>
          <td>'.$fila['nombre'].'</td>
          <td>'.$fila['descripcion'].'</td>
          <td>'.$fila['fecha_realizada'].'</td>
          <td>'.$fila['calificacion'].'</td>
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
        <th>Calificación</th>
      </tr>
    <?php

      $sql = "SELECT reltarea.id_tarea, reltarea.id_alumno, reltarea.calificacion, reltarea.materia, reltarea.periodo,
      tareas.id, tareas.materia, tareas.titulo, tareas.descripcion, tareas.fecha_ent, materia.id, materia.nombre FROM reltarea
      INNER JOIN tareas ON reltarea.id_tarea = tareas.id
      INNER JOIN materia ON reltarea.materia = materia.id
      WHERE reltarea.id_alumno = '".$son."' AND reltarea.periodo = '".$periodo."'";
      $resultado = mysqli_query($con, $sql);
      while ($fila = mysqli_fetch_array($resultado)){
        echo '

        <tr>
          <td>'.$fila['titulo'].'</td>
          <td>'.$fila['nombre'].'</td>
          <td>'.$fila['descripcion'].'</td>
          <td>'.$fila['fecha_ent'].'</td>
          <td>'.$fila['calificacion'].'</td>
        </tr>

        ';
      }
    ?>
    </table>

    <?php

      $sql = "SELECT comentario FROM comentarios WHERE id_alumno = '".$son."' AND periodo = '".$periodo."'";
      $resultado = mysqli_query($con, $sql);
      $filaCom = mysqli_fetch_array($resultado);
    ?>

    <br>
    <br>
    <h4>Comentario u observacion del maestro:</h4>
    <br>
    <p><?php echo $filaCom['comentario'] ?></p>

  </body>
</html>

<?php



?>
