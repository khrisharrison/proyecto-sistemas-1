<?php
  include ('../../database/conexion.php');

if (isset($_GET['codigo_parroquia'])) {
  $codigo_parroquia = $_GET['codigo_parroquia'];
  $ciudad_query = "SELECT * FROM ciudad WHERE CODIGO_PARROQUIA = $codigo_parroquia";
  $ciudad_result = $mysqli->query($ciudad_query);
  $ciudad = $ciudad_result->fetch_assoc();
  echo $ciudad['CODIGO_CIUDAD'];
}
?>
