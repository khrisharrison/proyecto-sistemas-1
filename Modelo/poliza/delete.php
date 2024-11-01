<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM NaturalXPoliza WHERE NUMERO_POLIZA = $id";
        $result = mysqli_query($mysqli,$query);
        $query = "DELETE FROM PolizaXServicio WHERE NUMERO_POLIZA = $id";
        $result = mysqli_query($mysqli,$query);
        $query = "DELETE FROM CEMENTERIOXPOLIZA WHERE Nro_poliza = $id";
        $result = mysqli_query($mysqli,$query);
        $query = "DELETE FROM JuridicoXPoliza WHERE NUMERO_POLIZA = $id";
        $result = mysqli_query($mysqli,$query);
        $query = "DELETE FROM PolizaXFuneraria WHERE NUMERO_POLIZA = $id";
        $result = mysqli_query($mysqli,$query);
        $query = "DELETE FROM BeneficiarioXPoliza WHERE NUMERO = $id";
        $result = mysqli_query($mysqli,$query);
        $query = "DELETE FROM POLIZA WHERE NUMERO_POLIZA = $id";
        $result = mysqli_query($mysqli,$query);



        if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar la poliza: " . $mensaje_error . "'); window.location.href = 'poliza.php';</script>";
        }
        else{
        echo "<script>alert('Se removió existosamente la poliza.'); window.location.href = 'poliza.php';</script>";
        }
    }
?>