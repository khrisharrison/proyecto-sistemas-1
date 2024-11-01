<?php
 include ('../../../database/conexion.php');
// Obtener la cédula enviada por la solicitud AJAX
$cedula = $_POST["cedula"];
$numero = $_POST["numero"];

// Verificar si la cédula ya existe en la tabla
$sql = "SELECT * FROM NaturalXPoliza WHERE CEDULA_natural = '$cedula' AND NUMERO_POLIZA = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la tabla, devolver un mensaje de error
	alert("ya esta registrado en la poliza");
} else {
	// La cédula no existe en la tabla, insertar la nueva cédula
	$sql = "INSERT INTO NaturalXPoliza (CEDULA_natural, NUMERO_POLIZA) VALUES ('$cedula', '$numero')";
	if ($mysqli->query($sql) === TRUE) {
		echo "Cédula guardada en la base de datos";
	} else {
		echo "Error al guardar la cédula: " . $mysqli->error;
	}
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>