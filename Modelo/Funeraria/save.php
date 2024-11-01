<?php
include ('../../database/conexion.php');
    //datos
    $rif = $_POST['rif'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $ciudad = $_POST['ciudad'];
    
    // Validar que el RIF no exista en la tabla entidad_juridica
    $query_verificar = "SELECT RIF FROM entidad_juridica WHERE RIF = '$rif'";
    $result_verificar = mysqli_query($mysqli, $query_verificar);

    $query = "INSERT INTO entidad_juridica (RIF, NOMBRE, Cod_ciudad_Ju) VALUES ('$rif', '$nombre', '$ciudad')";
    $querys = "INSERT INTO funeraria (RIF_funeraria, TIPO) VALUES ('$rif', '$tipo')";
        $result = mysqli_query($mysqli, $query);
        $resultado = mysqli_query($mysqli, $querys);

        if (!$resultado) {
            $error = mysqli_error($mysqli);
            echo "<script>
            alert('Error: " . $error . "');
            window.location.href = 'funeraria.php';
            </script>";
        } else {
            echo "<script>
            alert('Registro guardado satisfactoriamente');
            window.location.href = 'funeraria.php';
            </script>";
        }


?>