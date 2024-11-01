<?php
// Conexión a la base de datos
include ('../database/conexion.php');

// Obtener el valor seleccionado del selector de municipios
$municipioId = $_POST['municipioId'];

// Construir la consulta SQL
$query = "SELECT * FROM parroquia WHERE CODIGO_MUNICIPIO = '$municipioId'";

// Ejecutar la consulta SQL
$result = $mysqli->query($query);

// Construir el HTML para las opciones del selector
$options = '<option value="">Elija una opcion</option>';
while($row = $result->fetch_assoc()) {
  $options .= '<option value="'.$row['CODIGO_PARROQUIA'].'">'.$row['NOMBRE_PARROQUIA'].'</option>';
}

// Devolver las opciones del selector
echo $options;
?>