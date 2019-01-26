<?php

if(!empty($_FILES["excelPlaneacion"])){

  include('../conexion_bd.php');

    $file_array = explode(".", $_FILES["excelPlaneacion"]["name"]);
    if($file_array[1] == "xlsx"){
         include("PHPExcel/IOFactory.php");

         $object = PHPExcel_IOFactory::load($_FILES["excelPlaneacion"]["tmp_name"]);
         foreach($object->getWorksheetIterator() as $worksheet){
              $highestRow = $worksheet->getHighestRow();
              $periodo = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5, 8)->getValue());
              $grupo = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(7, 8)->getValue());

              for($row=14; $row<=$highestRow; $row++){
                  //tareas
                   $materia = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                   $semana = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                   $titulo = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                   $descripcion = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                   $fecha_ent = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                   $upload = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                   if ($upload == 'x') {
                     $upload = true;
                   }else {
                     $upload = false;
                   }
                   $status = '300';
                   $query = "INSERT INTO tareas (materia, semana, titulo, descripcion, fecha_ent, periodo, grupo, status, upload)
                   VALUES ('$materia', '$semana', '$titulo', '$descripcion', '$fecha_ent', '$periodo', '$grupo', '$status', '$upload')";
                   mysqli_query($con, $query);
                   //tareas
              }
              //insert tareas

              //insert actividades
              for($row=14; $row<=$highestRow; $row++){
                   $materiaAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                   $tituloAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                   $descripcionAct = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
                   $statusAct = '300';
                   $queryAct = "INSERT INTO actividades (materia, titulo, descripcion, periodo, grupo_fk, status)
                   VALUES ('$materiaAct', '$tituloAct', '$descripcionAct', '$periodo', '$grupo', '$statusAct')";
                   mysqli_query($con, $queryAct);

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
