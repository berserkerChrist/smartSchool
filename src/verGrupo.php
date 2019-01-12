<?php
    include('conexion_bd.php');
    $output = '';

    if (!empty($_POST['buscarGrupo'])) {
        if ($buscar = $con->real_escape_string($_POST['buscarGrupo'])) {
            $sql = "SELECT * FROM grupo WHERE grupo LIKE '%".$buscar."%' AND status = '200'";
            $resultado = $con->query($sql);
            if (mysqli_num_rows($resultado) > 0) {
              echo "
                  <table class='table table-hover table-bordered'>
                      <thead class='thead-light'>
                          <tr>
                              <th scope='col'>ID de grupo</th>
                              <th scope='col'>Grupo</th>
                              <th scope='col'>Ciclo escolar</th>
                              <th scope='col'>Accion</th>
                          </tr>
                      </thead>
                      <tbody>
              ";
                      while ($fila = $resultado->fetch_assoc()) {
                          echo "
                                  <tr data-toggle='modal'>
                                      <td>".$fila['id_grupo']."</td>
                                      <td>".$fila['grupo']."</td>
                                      <td>".$fila['ciclo_escolar']."</td>
                                      <td><input type='button' name='edit' value='Modificar' id=".$fila['id_grupo']." class='btn btn-info edit_data_grupo' /></td>
                                </tr>
                          ";
                      }
              echo "
                      </tbody>
                  </table>
              ";
            }
            $output .= '</table>
                      </div>';
            echo $output;
        } else {
            echo "Por favor, introduce un ID de un producto.";
        }
    }
?>
