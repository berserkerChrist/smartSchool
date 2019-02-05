<?php
    include('conexion_bd.php');

    if (!empty($_POST['modificarAlumno'])) {
        if (!empty($alumno = $con->real_escape_string($_POST['modificarAlumno']))) {
            //$sql = "SELECT * FROM alumno WHERE nombre LIKE '%".$alumno."%' AND status = '200'";
            $sql = "SELECT alumno.nombre, alumno.nickname, alumno.ap_paterno, alumno.ap_materno, alumno.grupo_fk, alumno.status,
            grupo.id_grupo, grupo.grupo, grupo.ciclo_escolar FROM alumno INNER JOIN grupo ON alumno.grupo_fk = grupo.id_grupo
            WHERE alumno.nombre LIKE '%".$alumno."%' AND alumno.status = '200'";
            $resultado = $con->query($sql);
            if (mysqli_num_rows($resultado) > 0) {
              echo '
              <div class="table-responsive">
                     <br />
                     <div id="docente_table">
                          <table class="table table-bordered">
                               <tr>
                                    <th width="15%">Nombre de usuario</th>
                                    <th width="15%">Nombre</th>
                                    <th width="15%">Apellido paterno</th>
                                    <th width="15%">Apellido materno</th>
                                    <th width="15%">Grupo</th>
                                    <th width="15%">Accion</th>
                               </tr>';

                               while($row = mysqli_fetch_array($resultado)){
                               echo '<tr>
                                    <td>'.$row["nickname"].'</td>
                                    <td>'.$row["nombre"].'</td>
                                    <td>'.$row["ap_paterno"].'</td>
                                    <td>'.$row["ap_materno"].'</td>
                                    <td>'.$row["grupo_fk"].'</td>
                                    <td><input type="button" name="edit" value="Modificar" id="'.$row["nickname"].'" class="btn btn-info edit_data_alumno" /></td>
                               </tr>';
                               }
                          echo'
                          </table>
                     </div>
                </div>';
            } else {
                echo "No se encontraron coincidencias.";
            }
        } else {
            echo "Por favor introduce algún nombre de una empresa.";
        }
    }

?>
