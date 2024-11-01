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
$sql = "UPDATE POLIZA SET FECHA_APERTURA = '$fechaA', FECHA_CIERRE = '$fechaC', CUOTA_ANUAL = '$cuotaA', CUOTA_MENSUAL = '$cuotaM', OBSERVACIONES = '$observaciones', Monto = '$monto', Status = '$status' WHERE NUMERO_POLIZA = $numero";

if ($mysqli->query($sql) === TRUE) {
  echo "Datos actualizados correctamente";
} else {
  echo "Error al actualizados los datos: " . $mysqli->error;
}

// Cierra la conexión con la base de datos
$mysqli->close();
?>