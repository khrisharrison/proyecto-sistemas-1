<?php
// Conexión a la base de datos
include ('../database/conexion.php');

if(isset($_POST['estadoId'])) {
  // Obtener el valor seleccionado del selector de estados
  $estadoId = $_POST['estadoId'];

  // Construir la consulta SQL
  $query = "SELECT * FROM municipio WHERE CODIGO_ESTADO = '$estadoId'";

  // Ejecutar la consulta SQL
  $result = $mysqli->query($query);

  // Construir el HTML para las opciones del selector
  $options = '<option value="">Elija una opcion</option>';
  while($row = $result->fetch_assoc()) {
    $options .= '<option value="'.$row['CODIGO_MUNICIPIO'].'">'.$row['NOMBRE_MUNICIPIO'].'</option>';
  }

  // Devolver las opciones del selector
  echo $options;
} else {
  // Si el valor no está definido, devolver un mensaje de error o una opción vacía
  echo '<option value="">Error: no se recibió el valor de estadoId</option>';
  echo $estadoId;
}
?>