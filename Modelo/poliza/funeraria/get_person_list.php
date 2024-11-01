<?php
$numero = $_GET["numero"];
include ('../../../database/conexion.php');
$query = "SELECT p.Nombre, p.RIF, b.NUMERO_POLIZA, s.DESCRIPCION, f.CODIGO_SERVICIO
          FROM ENTIDAD_JURIDICA p
           JOIN PolizaXFuneraria b ON p.RIF = b.RIF_funeraria
           JOIN FunerariaXServicio f ON b.RIF_funeraria = f.RIF_funeraria
           JOIN SERVICIO_FUNERARIO s ON f.CODIGO_SERVICIO = s.CODIGO_SERVICIO
          WHERE b.NUMERO_POLIZA = '$numero'";

$result = mysqli_query($mysqli, $query);
$num=0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['RIF'] . "</td>";
        echo "<td>" . $row['CODIGO_SERVICIO'] . "</td>";
        echo "<td>" . $row['DESCRIPCION'] . "</td>";
        if ($num == 0) {
            $num=1;
        echo '<td><button class="btn-eliminar btn btn-danger btn-sm" type="button" data-cedula="' . $row['RIF'] . '" data-numero="' . $row['NUMERO_POLIZA'] . '">Eliminar</button></td>';
    }
    echo '</tr>';
        echo "</tr>";

    }

} else {
    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
}
?>
