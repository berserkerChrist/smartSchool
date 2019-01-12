<?php

include('../conexion_bd.php');

if(isset($_POST["titulo"])){

    $titulo  = $_POST['titulo'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];

    $query = "INSERT INTO calendario (titulo, fecha_inicio, fecha_fin) VALUES ('$titulo', '$inicio', '$fin')";
    mysqli_query($con, $query);
}

?>
