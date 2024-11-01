<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM beneficiario WHERE CEDULA_beneficiario = $id";
        $result = mysqli_query($mysqli,$query);
        if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el beneficiario: " . $mensaje_error . "'); window.location.href = 'beneficiario.php';</script>";
        }
        else{
        echo "<script>alert('Se removió existosamente.'); window.location.href = 'beneficiario.php';</script>";
        }
    }
?>