<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $querys = "DELETE FROM FunerariaXServicio WHERE RIF_funeraria = $id";
        $resultado = mysqli_query($mysqli,$querys);
        $query = "DELETE FROM funeraria WHERE RIF_funeraria = $id";
        $result = mysqli_query($mysqli,$query);
        if(!$result || !$resultado){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar la funeraria: " . $mensaje_error . "'); window.location.href = 'funeraria.php';</script>";
        }
        else{
        echo "<script>alert('Se removió existosamente.'); window.location.href = 'funeraria.php';</script>";
        }
    }
?>