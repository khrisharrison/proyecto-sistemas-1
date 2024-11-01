<?php
  include ('../../database/conexion.php');

if (isset($_POST['busqueda'])) {
  $busqueda = $_POST['busqueda'];

  // Construir la consulta SQL para buscar ciudades
  $consulta = "SELECT * FROM estado
        WHERE NOMBRE_ESTADO LIKE '%$busqueda%'";

  // Ejecutar la consulta y obtener los resultados
  $resultado = $mysqli->query($consulta);

  // Mostrar los resultados en la tabla HTML
  if ($resultado->num_rows > 0) {
    while ($dato = $resultado->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $dato['CODIGO_ESTADO'] . '</td>';
      echo '<td>' . $dato['NOMBRE_ESTADO'] . '</td>';
      echo '<td>
        <a href="borrar_est.php?Id=' . $dato['CODIGO_ESTADO'] . '"
          class="btn btn-danger btn-sm"
          onclick="return confirm(\'¿Está seguro que desea borrar este registro?\')">Borrar</a>
        <a href="modificar_est.php?CODIGO_ESTADO=' . $dato['CODIGO_ESTADO'] . '&nom=' . $dato['NOMBRE_ESTADO'] . '"
          class="btn btn-primary btn-sm">Modificar</a>
      </td>';
      echo '</tr>';
    }
  } else {
    echo '<tr><td colspan="6">No se encontraron resultados</td></tr>';
  }
}
?>