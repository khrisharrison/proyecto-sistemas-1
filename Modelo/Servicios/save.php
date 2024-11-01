<?php
include ('../../database/conexion.php');
if(isset($_POST['save'])){
    //datos
    $codigo = $_POST['codigo'];
    $descrip = $_POST['descrip'];
    $monto = $_POST['monto'];
    
    // Validar que el RIF no exista en la tabla servicio_funerario
    $query_verificar = "SELECT CODIGO_SERVICIO FROM servicio_funerario WHERE CODIGO_SERVICIO = '$codigo'";
    $result_verificar = mysqli_query($mysqli, $query_verificar);

    $query = "INSERT INTO servicio_funerario (CODIGO_SERVICIO, DESCRIPCION, MONTO) VALUES ('$codigo', '$descrip', '$monto')";
    
        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            $error = mysqli_error($mysqli);
            echo "<script>
            alert('Error: " . $error . "');
            window.location.href = 'servicios.php';
            </script>";
        } else {
            echo "<script>
            alert('Registro guardado satisfactoriamente');
            window.location.href = 'servicios.php';
            </script>";
        }
    }

?>