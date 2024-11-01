<?php
  include ('../../database/conexion.php');

if (isset($_POST['busqueda'])) {
  $busqueda = $_POST['busqueda'];

  // Construir la consulta SQL para buscar ciudades
  $consulta = "SELECT * FROM estado
        JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
        JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
        JOIN ciudad ON parroquia.CODIGO_PARROQUIA = ciudad.CODIGO_PARROQUIA
        WHERE NOMBRE_CIUDAD LIKE '%$busqueda%'";

  // Ejecutar la consulta y obtener los resultados
  $resultado = $mysqli->query($consulta);

  // Mostrar los resultados en la tabla HTML
  if ($resultado->num_rows > 0) {
    while ($dato = $resultado->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $dato['CODIGO_CIUDAD'] . '</td>';
      echo '<td>' . $dato['NOMBRE_CIUDAD'] . '</td>';
      echo '<td>' . $dato['NOMBRE_PARROQUIA'] . '</td>';
      echo '<td>' . $dato['NOMBRE_MUNICIPIO'] . '</td>';
      echo '<td>' . $dato['NOMBRE_ESTADO'] . '</td>';
      echo '<td>
        <a href="borrarciudad.php?Id=' . $dato['CODIGO_CIUDAD'] . '"
          class="btn btn-danger btn-sm"
          onclick="return confirm(\'¿Está seguro que desea borrar este registro?\')">Borrar</a>
        <a href="modificar.php?Id=' . $dato['CODIGO_CIUDAD'] . '&ciu=' . $dato['NOMBRE_CIUDAD'] .  '&id_parr=' . $dato['CODIGO_PARROQUIA'] .'"
          class="btn btn-primary btn-sm">Modificar</a>
      </td>';
      echo '</tr>';
    }
  } else {
    echo '<tr><td colspan="6">No se encontraron resultados</td></tr>';
  }
}
?>