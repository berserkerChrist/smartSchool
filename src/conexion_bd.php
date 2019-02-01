<?php
	$servidor = "localhost";
	$usuario = "u788024793_brskr";
	$contraseña = "Admin1234#";
	$basedatos = "u788024793_smart";

	$con = mysqli_connect ($servidor, $usuario, $contraseña)
	or die
	("No se puede conectar con el servidor");

	mysqli_select_db ($con, $basedatos)
	or die
	("No se puede conectar con la base de datos");

	mysqli_query($con, "SET NAMES 'utf8'") or die ("Error de consulta");
?>
