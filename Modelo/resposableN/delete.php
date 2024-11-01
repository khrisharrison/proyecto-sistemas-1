<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM responsable_natural WHERE CEDULA_natural = $id";
        $result = mysqli_query($mysqli,$query);
        if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el responsable natural: " . $mensaje_error . "'); window.location.href = 'responsable.php';</script>";
        }
        else{
        echo "<script>alert('Se removió existosamente.'); window.location.href = 'responsable.php';</script>";
        }
    }
?>