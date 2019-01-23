<?php

  include('../../conexion_bd.php');
  session_start();

  $grupo = $_SESSION['grupoDocente'];
  $sqlAlumnos = "SELECT * FROM alumno WHERE grupo_fk = '".$grupo."'";
  $resAlumnos = mysqli_query($con, $sqlAlumnos);
  $periodo = $con->real_escape_string($_POST['periodoProm']);
  $español = '200';
  $matematicas = '300';
  $cienciasNat = '400';
  $historia = '500';
  $geografia = '600';
  $civEtica = '700';

    while ($filaAlumnos = mysqli_fetch_array($resAlumnos)) {

      $alumno = $filaAlumnos['nickname'];
      //promedios de español
      $calificacionActEsp = getPromedioActividades($alumno, $español, $periodo);
      $calificacionTarEsp = getPromedioTareas($alumno, $español, $periodo);
      $examenEsp = getParticipacion($alumno, $español, $periodo);
      $participacionesEsp = getExamen($alumno, $español, $periodo);
      generarPromedioGeneral($alumno, $español, $calificacionTarEsp, $calificacionActEsp, $examenEsp, $participacionesEsp, $periodo, $grupo);
      //promedios de español

      //promedios de matematicas
      $calificacionesActMat = getPromedioActividades($alumno, $matematicas, $periodo);
      $calificacionesTarMat = getPromedioTareas($alumno, $matematicas, $periodo);
      $examenMat = getParticipacion($alumno, $matematicas, $periodo);
      $participacionesMat = getExamen($alumno, $matematicas, $periodo);
      generarPromedioGeneral($alumno, $matematicas, $calificacionTarMat, $calificacionActMat, $examenMat, $participacionesMat, $periodo, $grupo);
      //promedios de matematicas

      //promedios de Ciencias Naturales
      $calificacionesActCN = getPromedioActividades($alumno, $cienciasNat, $periodo);
      $calificacionesTarCN = getPromedioTareas($alumno, $cienciasNat, $periodo);
      $examenCN = getParticipacion($alumno, $cienciasNat, $periodo);
      $participacionesCN = getExamen($alumno, $cienciasNat, $periodo);
      generarPromedioGeneral($alumno, $cienciasNat, $calificacionTarCN, $calificacionActCN, $examenCN, $participacionesCN, $periodo, $grupo);
      //promedios de Ciencias Naturales

      //promedios de historia
      $calificacionesActHist = getPromedioActividades($alumno, $historia, $periodo);
      $calificacionesTarHist = getPromedioTareas($alumno, $historia, $periodo);
      $examenHist = getParticipacion($alumno, $historia, $periodo);
      $participacionesHist = getExamen($alumno, $historia, $periodo);
      generarPromedioGeneral($alumno, $historia, $calificacionTarHist, $calificacionActHist, $examenHist, $participacionesHist, $periodo, $grupo);
      //promedios de historia

      //promedios de geografia
      $calificacionesActGeo = getPromedioActividades($alumno, $geografia, $periodo);
      $calificacionesTarGeo = getPromedioTareas($alumno, $geografia, $periodo);
      $examenGeo = getParticipacion($alumno, $geografia, $periodo);
      $participacionesGeo = getExamen($alumno, $geografia, $periodo);
      generarPromedioGeneral($alumno, $geografia, $calificacionTarGeo, $calificacionActGeo, $examenGeo, $participacionesGeo, $periodo, $grupo);
      //promedios de geografia

      //promedios de civica y etica
      $calificacionesActCE = getPromedioActividades($alumno, $civEtica, $periodo);
      $calificacionesTarCE = getPromedioTareas($alumno, $civEtica, $periodo);
      $examenCE = getParticipacion($alumno, $civEtica, $periodo);
      $participacionesCE = getExamen($alumno, $civEtica, $periodo);
      generarPromedioGeneral($alumno, $civEtica, $calificacionTarCE, $calificacionActCE, $examenCE, $participacionesCE, $periodo, $grupo);
      //promedios de civica y etica


    }


    function getPromedioActividades($alumnoAct, $materiaAct, $periodoAct){
      include('../../conexion_bd.php');

      $sqlPromedioAct = "SELECT AVG(calificacion) AS calificacion FROM relactividades WHERE id_alumno = '".$alumnoAct."' AND materia = '".$materiaAct."' AND periodo ='".$periodoAct."'";
      $resultadoAct = mysqli_query($con, $sqlPromedioAct);
      $filaAct = mysqli_fetch_array($resultadoAct);
      return $filaAct['calificacion'];
    }

    function getPromedioTareas($alumnoTar, $materiaTar, $periodoTar){
      include('../../conexion_bd.php');

      $sqlPromedioTar = "SELECT AVG(calificacion) AS calificacion FROM reltarea WHERE id_alumno = '".$alumnoTar."' AND materia = '".$materiaTar."' AND periodo ='".$periodoTar."'";
      $resultadoTar = mysqli_query($con, $sqlPromedioTar);
      $filaTar = mysqli_fetch_array($resultadoTar);
      return $filaTar['calificacion'];
    }

    function getParticipacion($alumno, $materia, $periodo){
      include('../../conexion_bd.php');

      $query = "SELECT participaciones FROM partexam WHERE id_alumno = '".$alumno."' AND  materia = '".$materia."' AND periodo = '".$periodo."'";
      $resultadoPart = mysqli_query($con, $query);
      $fila = mysqli_fetch_array($resultadoPart);
      return $fila['participaciones'];
    }

    function getExamen($alumno, $materia, $periodo){
      include('../../conexion_bd.php');

      $query = "SELECT examen FROM partexam WHERE id_alumno = '".$alumno."' AND  materia = '".$materia."' AND periodo = '".$periodo."'";
      $resultadoEx = mysqli_query($con, $query);
      $fila = mysqli_fetch_array($resultadoEx);
      return $fila['examen'];
    }

    function generarPromedioGeneral($alumno, $materia, $tareas, $actividades, $examen, $particiapciones, $periodo, $grupo){
      include('../../conexion_bd.php');

        $pondActividades = ($con->real_escape_string($_POST['pondAct']))/100;
        $pondTareas = ($con->real_escape_string($_POST['pondTar']))/100;
        $pondExamen = ($con->real_escape_string($_POST['pondEx']))/100;
        $pondParticipacion = ($con->real_escape_string($_POST['pondPar']))/100;

        $calTareas = $tareas * $pondTareas;
        $calAct = $actividades * $pondActividades;
        $calExam = $examen * $pondExamen;
        $calPart = $particiapciones * $pondParticipacion;

        $calificacionFinal = $calTareas + $calAct + $calExam + $calPart;
        $sql = "INSERT INTO promedios (id_alumno, materia, periodo, calificacion, grupo)
        VALUES ('$alumno', '$materia', '$periodo', '$calificacionFinal', '$grupo')";
        $result = mysqli_query($con, $sql);
    }

    echo "OK";

?>
