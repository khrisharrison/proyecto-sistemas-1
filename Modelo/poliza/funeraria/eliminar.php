<?php
include ('../../../database/conexion.php');
// Verificar la conexión

// Obtener los datos POST
$cedula = $_POST['cedula'];
$numero = $_POST['numero'];

// Eliminar la persona de la base de datos
$sql = "DELETE FROM PolizaXFuneraria WHERE RIF_funeraria = '$cedula' AND NUMERO_POLIZA = '$numero'";
if (mysqli_query($mysqli, $sql)) {
    // Si la eliminación fue exitosa, retornar un objeto JSON con el resultado
    echo json_encode(array('resultado' => 'ok'));
} else {
    // Si hubo un error en la eliminación, retornar un objeto JSON con el error
    echo json_encode(array('resultado' => 'error', 'mensaje' => mysqli_error($mysqli)));
}

// Cerrar la conexión
mysqli_close($mysqli);
?>