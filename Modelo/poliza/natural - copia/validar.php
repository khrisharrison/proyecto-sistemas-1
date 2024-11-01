<?php
 include ('../../../database/conexion.php');
// Obtener la cédula enviada por la solicitud AJAX
$cedula = $_POST["cedula"];
$numero = $_POST["numero"];



// Verificar si la cédula no existe en la base de datos
$sql = "SELECT * FROM RESPONSABLE_NATURAL WHERE CEDULA_natural = '$cedula'";
$result = $mysqli->query($sql);
if ($result->num_rows == 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "La cédula no existe en la base de datos");
	echo json_encode($response);
	exit();

}
$sql = "SELECT * FROM NaturalXPoliza WHERE CEDULA_natural = '$cedula' AND NUMERO_POLIZA = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "ya se encuentra registrado en la poliza2");
	echo json_encode($response);
	exit();
}
$sql = "SELECT * FROM NaturalXPoliza WHERE NUMERO_POLIZA = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "la poliza solo puede tener un responsable");
	echo json_encode($response);
	exit();

}

$sql = "SELECT * FROM JuridicoXPoliza WHERE NUMERO_POLIZA = '$numero'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	// La cédula ya existe en la base de datos
	$response = array("status" => "error", "message" => "el responsable de esta poliza ya esta registrado como persona juridico1");
	echo json_encode($response);
	exit();
}

// Si todas las validaciones tienen éxito, devolver una respuesta de éxito
$response = array("status" => "success", "message" => "");
echo json_encode($response);

// Cerrar la conexión a la base de datos
$mysqli->close();
?>