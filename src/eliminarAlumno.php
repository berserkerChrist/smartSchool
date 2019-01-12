<?php
    include('conexion_bd.php');

    if (!empty($_POST['buscarAlumno'])) {
        if (!empty($delAl = $con->real_escape_string($_POST['buscarAlumno']))) {
            $sql = "SELECT * FROM alumno WHERE nombre LIKE '%".$delAl."%' AND status = '200'";
            $resultado = $con->query($sql);
            if (mysqli_num_rows($resultado) > 0) {
                echo "
                    <table class='table table-hover table-bordered'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col'>Nombre de usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Apellido paterno</th>
                                <th scope='col'>Apellido materno</th>
                                <th scope='col'>Grupo</th>
                                <th scope='col'>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                ";
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "
                                    <tr data-toggle='modal'>
                                        <td>".$fila['nickname']."</td>
                                        <td>".$fila['nombre']."</td>
                                        <td>".$fila['ap_paterno']."</td>
                                        <td>".$fila['ap_materno']."</td>
                                        <td>".$fila['grupo_fk']."</td>
                                        <td><button type='submit' name='borrarProv' class='btn btn-danger baja-alumno' id='".$fila['nickname']."' >Modificar estatus</button></td>
                                    </tr>
                            ";
                        }
                echo "
                        </tbody>
                    </table>
                ";
            } else {
                echo "No se encontraron coincidencias.";
            }
        } else {
            echo "Por favor introduce algún nombre de una empresa.";
        }
    }

?>
