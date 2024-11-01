<?php
  include ('../../database/conexion.php');

if (isset($_POST['busqueda'])) {
  $busqueda = $_POST['busqueda'];

  // Construir la consulta SQL para buscar ciudades
  $consulta = "SELECT * FROM estado
        JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
        JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
        WHERE NOMBRE_PARROQUIA LIKE '%$busqueda%'";

  // Ejecutar la consulta y obtener los resultados
  $resultado = $mysqli->query($consulta);

  // Mostrar los resultados en la tabla HTML
  if ($resultado->num_rows > 0) {
    while ($dato = $resultado->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $dato['CODIGO_PARROQUIA'] . '</td>';
      echo '<td>' . $dato['NOMBRE_PARROQUIA'] . '</td>';
      echo '<td>' . $dato['NOMBRE_MUNICIPIO'] . '</td>';
      echo '<td>' . $dato['NOMBRE_ESTADO'] . '</td>';
      echo '<td>
        <a href="borrar_parroquia.php?Id=' . $dato['CODIGO_PARROQUIA'] . '"
          class="btn btn-danger btn-sm"
          onclick="return confirm(\'¿Está seguro que desea borrar este registro?\')">Borrar</a>
        <a href="modificar.php?Id=' . $dato['CODIGO_PARROQUIA'] . '&parr=' . $dato['NOMBRE_PARROQUIA'] .  '&id_mun=' . $dato['CODIGO_MUNICIPIO'] .'"
          class="btn btn-primary btn-sm">Modificar</a>
      </td>';
      echo '</tr>';
    }
  } else {
    echo '<tr><td colspan="6">No se encontraron resultados</td></tr>';
  }
}
?>