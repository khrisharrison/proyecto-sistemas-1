<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM servicio_funerario WHERE CODIGO_SERVICIO = $id";
        $result = mysqli_query($mysqli,$query);
        if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el servicio: " . $mensaje_error . "'); window.location.href = 'servicios.php';</script>";
        }
        else{
        echo "<script>alert('Se removio existosamente.'); window.location.href = 'servicios.php';</script>";
        }
    }
?>