<?php
include ('../../database/conexion.php');
// Recibe los datos del formulario
    $rif = $_POST['rif'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $ciudad = $_POST['ciudad'];

// Inserta los datos en la tabla "usuarios"
$query = "UPDATE funeraria set TIPO = '$tipo' WHERE RIF_funeraria = $rif";
$querys = "UPDATE entidad_juridica set NOMBRE = '$nombre', Cod_ciudad_Ju = '$ciudad' WHERE RIF=$rif";

if ($mysqli->query($query) === TRUE) {
  echo "Datos actualizados correctamente";
} else {
  echo "Error al actualizados los datos: " . $mysqli->error;
}
if ($mysqli->query($querys) === TRUE) {
  echo "Datos actualizados correctamente";
} else {
  echo "Error al actualizados los datos: " . $mysqli->error;
}
// Cierra la conexión con la base de datos
$mysqli->close();
?>