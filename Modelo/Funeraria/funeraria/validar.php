<?php
 include ('../../../database/conexion.php');
// Obtener la cédula enviada por la solicitud AJAX
$id = $_POST["cedula"]; //barra
$rif = $_POST["numero"]; //rif



// Verificar si la cédula no existe en la base de datos
$sql = "SELECT * FROM SERVICIO_FUNERARIO WHERE CODIGO_SERVICIO = '$id'";
$result = $mysqli->query($sql);
if ($result->num_rows == 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "El Servicio no existe en la base de datos.");
	echo json_encode($response);
	exit();
}
$sql = "SELECT * FROM FunerariaXServicio WHERE RIF_funeraria = '$rif' AND CODIGO_SERVICIO = '$id'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "ya se encuentra registrado en la poliza.");
	echo json_encode($response);
	exit();
}

// Si todas las validaciones tienen éxito, devolver una respuesta de éxito
$response = array("status" => "success", "message" => "");
echo json_encode($response);

// Cerrar la conexión a la base de datos
$mysqli->close();
?>