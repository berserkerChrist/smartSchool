<?php
    include('conexion_bd.php');

    if (!empty($_POST['modificarDocente'])) {
        if (!empty($docente = $con->real_escape_string($_POST['modificarDocente']))) {
            $sql = "SELECT * FROM maestro WHERE nomina LIKE '%".$docente."%' AND status = '200'";
            $resultado = $con->query($sql);
            if (mysqli_num_rows($resultado) > 0) {
              echo '
              <div class="table-responsive">
                     <br />
                     <div id="docente_table">
                          <table class="table table-bordered">
                               <tr>
                                    <th width="15%">Nómina</th>
                                    <th width="15%">Nombre</th>
                                    <th width="15%">Apellido paterno</th>
                                    <th width="15%">Apellido materno</th>
                                    <th width="15%">Grupo</th>
                                    <th width="15%">Accion</th>
                               </tr>';

                               while($row = mysqli_fetch_array($resultado)){
                               echo '<tr>
                                    <td>'.$row["nomina"].'</td>
                                    <td>'.$row["nombre"].'</td>
                                    <td>'.$row["ap_paterno"].'</td>
                                    <td>'.$row["ap_materno"].'</td>
                                    <td>'.$row["grupo_fk"].'</td>
                                    <td><input type="button" name="edit" value="Modificar" id="'.$row["nomina"].'" class="btn btn-info edit_data" /></td>
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
