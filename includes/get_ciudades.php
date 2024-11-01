<?php
include ('../database/conexion.php');
// Obtener el valor seleccionado del selector de parroquias
$parroquiaId = $_POST['parroquiaId'];

// Construir la consulta SQL
$query = "SELECT * FROM ciudad WHERE CODIGO_PARROQUIA = '$parroquiaId'";

// Ejecutar la consulta SQL
$result = $mysqli->query($query);

// Construir el HTML para las opciones del selector
$options = '<option value="">Elija una opcion</option>';
while($row = $result->fetch_assoc()) {
  $options .= '<option value="'.$row['CODIGO_CIUDAD'].'">'.$row['NOMBRE_CIUDAD'].'</option>';
}

// Devolver las opciones del selector
echo $options;
?>