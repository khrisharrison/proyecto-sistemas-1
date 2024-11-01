<?php
  include ('../../database/conexion.php');

if (isset($_GET['codigo_estado'])) {
  $codigo_estado = $_GET['codigo_estado'];
  $municipios_query = "SELECT * FROM municipio WHERE CODIGO_ESTADO = $codigo_estado";
  $municipios_result = $mysqli->query($municipios_query);
  $municipios_html = "";
  while ($municipio = $municipios_result->fetch_assoc()) {
    $municipios_html .= "<option value=\"" . $municipio['CODIGO_MUNICIPIO'] . "\">" . $municipio['NOMBRE_MUNICIPIO'] . "</option>";
  }
  echo $municipios_html;
}
?>
