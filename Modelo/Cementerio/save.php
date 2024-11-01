<?php
include ('../../database/conexion.php');
if(isset($_POST['save'])){
    //
    $Rif = $_POST['RIF'];
    $Nombre = $_POST['NOMBRE'];
    $Tipo = $_POST['TIPO'];
    $Ciudad = $_POST['ciudad'];
    
    // Validar que el rif no exista en la tabla entidad juridica
    $query_verificar = "SELECT RIF FROM ENTIDAD_JURIDICA WHERE RIF = '$Rif'";
    $result_verificar = mysqli_query($mysqli, $query_verificar);
    
    $query = "INSERT INTO ENTIDAD_JURIDICA (RIF, NOMBRE, Cod_ciudad_Ju) VALUES ('$Rif', '$Nombre', '$Ciudad')";
    $querys = "INSERT INTO CEMENTERIO (RIF_CEMENTERIO, TIPO) VALUES ('$Rif', '$Tipo')";
    $result = mysqli_query($mysqli, $query);
    $resultado = mysqli_query($mysqli, $querys);
    
    if (!$resultado) {
        $error = mysqli_error($mysqli);
        echo "<script>
        alert('Error: " . $error . "');
        window.location.href = 'cementerio.php';
        </script>";
    } else {
        echo "<script>
        alert('Registro guardado satisfactoriamente');
        window.location.href = 'cementerio.php';
        </script>";
    }
}

?>