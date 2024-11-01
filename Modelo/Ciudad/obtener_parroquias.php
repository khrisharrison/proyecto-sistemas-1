<?php
  include ('../../database/conexion.php');

if (isset($_GET['codigo_municipio'])) {
  $codigo_municipio = $_GET['codigo_municipio'];
  $parroquias_query = "SELECT * FROM parroquia WHERE CODIGO_MUNICIPIO = $codigo_municipio";
  $parroquias_result = $mysqli->query($parroquias_query);
  $parroquias_html = "";
  while ($parroquia = $parroquias_result->fetch_assoc()) {
    $parroquias_html .= "<option value=\"" . $parroquia['CODIGO_PARROQUIA'] . "\">" . $parroquia['NOMBRE_PARROQUIA'] . "</option>";
  }
  echo $parroquias_html;
}
?>
