<?php
$numero = $_GET["numero"];
include ('../../../database/conexion.php');
$query = "SELECT p.DESCRIPCION, p.CODIGO_SERVICIO, b.NUMERO_POLIZA
          FROM SERVICIO_FUNERARIO p
           JOIN PolizaXServicio b ON p.CODIGO_SERVICIO = b.CODIGO_SERVICIO
          WHERE b.NUMERO_POLIZA = '$numero'";

$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['CODIGO_SERVICIO'] . "</td>";
        echo "<td>" . $row['DESCRIPCION'] . "</td>";
        echo "<td>" . $row['NUMERO_POLIZA'] . "</td>";
        echo '<td><button class="btn-eliminar btn btn-danger btn-sm" type="button" data-cedula="' . $row['CODIGO_SERVICIO'] . '" data-numero="' . $row['NUMERO_POLIZA'] . '">Eliminar</button></td>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
}
?>
