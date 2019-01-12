<?php
    include('conexion_bd.php');

    if (!empty($_POST['buscarDocente'])) {
        if (!empty($delDoc = $con->real_escape_string($_POST['buscarDocente']))) {
            $sql = "SELECT * FROM maestro WHERE nomina LIKE '%".$delDoc."%' AND status = '200'";
            $resultado = $con->query($sql);
            if (mysqli_num_rows($resultado) > 0) {
                echo "
                    <table class='table table-hover table-bordered'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col'>Nómina</th>
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
                                        <td>".$fila['nomina']."</td>
                                        <td>".$fila['nombre']."</td>
                                        <td>".$fila['ap_paterno']."</td>
                                        <td>".$fila['ap_materno']."</td>
                                        <td>".$fila['grupo_fk']."</td>
                                        <td><button type='button' name='borrarProv' class='btn btn-danger baja-docente' id='".$fila['nomina']."'>Modificar estatus</button></td>
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

    if (!empty($_POST['btnDel'])) {
        if (!empty($btnDel = $_POST['btnDel'])) {
            $sql = "DELETE FROM maestro WHERE nomina = '$btnDel'";
            $sentencia = $con->prepare($sql);
            $sentencia->execute();
            $sentencia->close();
            if ($sql) {
                echo "Usuario eliminado.";
            } else {
                echo "No se pudo eliminar el usuario.";
            }
        }
    }
?>
