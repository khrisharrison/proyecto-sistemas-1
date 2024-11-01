<?php
$numero = $_GET["numero"];
include ('../../../database/conexion.php');
$query = "SELECT p.Nombre, p.RIF, b.NUMERO_POLIZA
          FROM ENTIDAD_JURIDICA p
           JOIN JuridicoXPoliza b ON p.RIF = b.RIF_juridico
          WHERE b.NUMERO_POLIZA = '$numero'";

$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['RIF'] . "</td>";
        echo "<td>" . $row['NUMERO_POLIZA'] . "</td>";
        echo '<td><button class="btn-eliminar btn btn-danger btn-sm" type="button" data-cedula="' . $row['RIF'] . '" data-numero="' . $row['NUMERO_POLIZA'] . '">Eliminar</button></td>';
    echo '</tr>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
}
?>
