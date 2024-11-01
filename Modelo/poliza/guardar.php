<?php
include ('../../database/conexion.php');
// Recibe los datos del formulario
$numero = $_POST["numero"];
$fechaA = $_POST["fechaA"];
$fechaC = $_POST["fechaC"];
$cuotaM = $_POST["cuotaM"];
$cuotaA = $_POST["cuotaA"];
$monto = $_POST["monto"];
$status = $_POST["STATUS"];
$observaciones = $_POST["observaciones"];
// Inserta los datos en la tabla "usuarios"
$sql = "INSERT INTO POLIZA (NUMERO_POLIZA, FECHA_APERTURA, FECHA_CIERRE, CUOTA_ANUAL, CUOTA_MENSUAL, OBSERVACIONES, Monto, Status) VALUES ('$numero', '$fechaA', '$fechaC', '$cuotaA', '$cuotaM', '$observaciones', '$monto', '$status')";
if ($mysqli->query($sql) === TRUE) {
  echo "Datos guardados correctamente";
} else {
  echo "Error al guardar los datos: " . $mysqli->error;
}

// Cierra la conexión con la base de datos
$mysqli->close();
?>