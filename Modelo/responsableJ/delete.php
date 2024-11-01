<?php
//incluyo la base de datos
include ('../../database/conexion.php');
//si existe el el id
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM RESPONSABLE_JURIDICO WHERE RIF_juridico = $id";
    $result = mysqli_query($mysqli,$query);
    if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar la persona Jurídica: " . $mensaje_error . "'); window.location.href = 'responsablej.php';</script>";
    }
    else{
        echo "<script>alert('Se removió existosamente.'); window.location.href = 'responsablej.php';</script>";
    }
}
?>