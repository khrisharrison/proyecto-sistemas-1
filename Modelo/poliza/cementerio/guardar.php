<?php
 include ('../../../database/conexion.php');
// Obtener la cédula enviada por la solicitud AJAX
$cedula = $_POST["cedula"];
$numero = $_POST["numero"];

// Verificar si la cédula ya existe en la tabla
$sql = "SELECT * FROM CEMENTERIOXPOLIZA WHERE Rif_Cem = '$cedula' AND Nro_poliza = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la tabla, devolver un mensaje de error
	alert("el cementerio ya esta registrado en la poliza");
} else {
	// La cédula no existe en la tabla, insertar la nueva cédula
	$sql = "INSERT INTO CEMENTERIOXPOLIZA (Rif_Cem, Nro_poliza) VALUES ('$cedula', '$numero')";
	if ($mysqli->query($sql) === TRUE) {
		echo "Rif del cementerio guardada en la base de datos";
	} else {
		echo "Error al guardar el Rif del cementerio: " . $mysqli->error;
	}
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>