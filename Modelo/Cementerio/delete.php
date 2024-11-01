<?php
//incluyo la base de datos
include ('../../database/conexion.php');
//si existe el el id
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM CEMENTERIO WHERE RIF_CEMENTERIO = $id";
    $result = mysqli_query($mysqli,$query);
    if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el cementerio: " . $mensaje_error . "'); window.location.href = 'cementerio.php';</script>";
    }
    else{
        echo "<script>alert('Se removió exitosamente.'); window.location.href = 'cementerio.php';</script>";
    }
}
?>