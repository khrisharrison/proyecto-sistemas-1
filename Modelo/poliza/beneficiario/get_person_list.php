<?php
$numero = $_GET["numero"];
include ('../../../database/conexion.php');
$query = "SELECT p.Nombre, p.Apellido, p.Cedula, b.NUMERO
          FROM persona p
           JOIN BeneficiarioXPoliza b ON p.Cedula = b.CEDULA_beneficiario
          WHERE b.NUMERO = '$numero'";

$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['Apellido'] . "</td>";
        echo "<td>" . $row['Cedula'] . "</td>";
        echo "<td>" . $row['NUMERO'] . "</td>";
        echo '<td><button class="btn-eliminar btn btn-danger btn-sm" type="button" data-cedula="' . $row['Cedula'] . '" data-numero="' . $row['NUMERO'] . '">Eliminar</button></td>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
}
?>
