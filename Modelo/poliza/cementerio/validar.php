<?php
 include ('../../../database/conexion.php');
// Obtener la cédula enviada por la solicitud AJAX
$cedula = $_POST["cedula"];
$numero = $_POST["numero"];



// Verificar si la cédula no existe en la base de datos
$sql = "SELECT * FROM CEMENTERIO WHERE RIF_cementerio = '$cedula'";
$result = $mysqli->query($sql);
if ($result->num_rows == 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "El Rif del cementerio no existe en la base de datos");
	echo json_encode($response);
	exit();
}
$sql = "SELECT * FROM CEMENTERIOXPOLIZA WHERE Rif_Cem = '$cedula' AND Nro_poliza = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "ya se encuentra registrado en la poliza");
	echo json_encode($response);
	exit();
}
$sql = "SELECT * FROM CEMENTERIOXPOLIZA WHERE Nro_poliza = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "la poliza solo puede tener un cementerio");
	echo json_encode($response);
	exit();
}

// Si todas las validaciones tienen éxito, devolver una respuesta de éxito
$response = array("status" => "success", "message" => "");
echo json_encode($response);

// Cerrar la conexión a la base de datos
$mysqli->close();
?>