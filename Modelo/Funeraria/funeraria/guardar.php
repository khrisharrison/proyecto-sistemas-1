<?php
 include ('../../../database/conexion.php');
// Obtener la cédula enviada por la solicitud AJAX
$id = $_POST["cedula"];
$rif = $_POST["numero"];

// Verificar si la cédula ya existe en la tabla
$sql = "SELECT * FROM FunerariaXServicio WHERE CODIGO_SERVICIO = '$id' AND RIF_funeraria = '$rif'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la tabla, devolver un mensaje de error
	alert("ya esta registrado en la poliza");
} else {
	// La cédula no existe en la tabla, insertar la nueva cédula
	$sql = "INSERT INTO FunerariaXServicio (CODIGO_SERVICIO, RIF_funeraria) VALUES ('$id', '$rif')";
	if ($mysqli->query($sql) === TRUE) {
		echo "Servicio guardada en la base de datos";
	} else {
		echo "Error al guardar el Servicio: " . $mysqli->error;
	}
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>