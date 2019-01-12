<?php

if(!empty($_FILES["excelPlaneacion"])){

  include('../conexion_bd.php');

    $file_array = explode(".", $_FILES["excelPlaneacion"]["name"]);
    if($file_array[1] == "xlsx"){
         include("PHPExcel/IOFactory.php");

         $object = PHPExcel_IOFactory::load($_FILES["excelPlaneacion"]["tmp_name"]);
         foreach($object->getWorksheetIterator() as $worksheet){
              $highestRow = $worksheet->getHighestRow();

              for($row=14; $row<=$highestRow; $row++){
                  //tareas
                   $materia = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                   $semana = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                   $titulo = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                   $descripcion = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                   $fecha_ent = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                   $periodo = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                   $grupo = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                   $status = '300';
                   $query = "INSERT INTO tareas (materia, semana, titulo, descripcion, fecha_ent, periodo, grupo, status)
                   VALUES ('$materia', '$semana', '$titulo', '$descripcion', '$fecha_ent', '$periodo', '$grupo', '$status')";
                   mysqli_query($con, $query);

                   //echo $query;
                   //tareas

              }
              //insert tareas

              //insert actividades
              for($row=19; $row<=$highestRow; $row++){
                   $materiaAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                   $tituloAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                   $descripcionAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                   $periodoAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                   $grupoAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                   $statusAct = '300';
                   $queryAct = "INSERT INTO actividades (materia, titulo, descripcion, periodo, grupo_fk, status)
                   VALUES ('$materiaAct', '$tituloAct', '$descripcionAct', '$periodoAct', '$grupoAct', '$statusAct')";
                   mysqli_query($con, $queryAct);

                   echo $queryAct;

              }
              //insert actividades

         }
         //echo ''.$materiaAct.',  '.$tituloAct.', '.$descripcionAct.', '.$periodoAct.', '.$grupoAct.', '.$statusAct.',';
         //echo ''.$materia.', '.$semana.', '.$titulo.', '.$descripcion.', '.$fecha_ent.', '.$periodo.', '.$grupo.', '.$status.'';
         echo "
                <div class='alert alert-success' role='alert'>
                  <strong>¡Datos insertados correctamente!</strong>
                </div>
              ";
    }
    else
    {
         echo '<label class="text-danger">Archivo invalido</label>';
    }
}

?>
