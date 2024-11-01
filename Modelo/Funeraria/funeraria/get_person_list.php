<?php
include ('../../../database/conexion.php');

$rif = $_GET['numero'];

$query = "SELECT *
          FROM FUNERARIA b
          JOIN FunerariaXServicio f ON b.RIF_funeraria = f.RIF_funeraria
           JOIN SERVICIO_FUNERARIO p ON f.CODIGO_SERVICIO = p.CODIGO_SERVICIO
          WHERE b.RIF_funeraria = '$rif'";

$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['CODIGO_SERVICIO'] . "</td>";
        echo "<td>" . $row['DESCRIPCION'] . "</td>";
        echo "<td>" . $row['MONTO'] . "</td>";
        echo '<td><button class="btn-eliminar btn btn-danger btn-sm" type="button" data-cedula="' . $row['CODIGO_SERVICIO'] . '" data-numero="' . $row['RIF_funeraria'] . '">Eliminar</button></td>';
        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
}
?>
