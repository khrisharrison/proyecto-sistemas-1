<?php
include ('../../database/conexion.php');
if(isset($_POST['save'])){
    //persona
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $partida= $_POST['partida'];
    $fecha_na= $_POST['fecha_na'];
    $fecha_de= $_POST['fecha_de'];
    $causa= $_POST['causa'];
    
    // Validar que la cédula no exista en la tabla persona
    $query_verificar = "SELECT CEDULA FROM persona WHERE CEDULA = '$cedula'";
    $result_verificar = mysqli_query($mysqli, $query_verificar);

        $query = "INSERT INTO persona (CEDULA, NOMBRE, APELLIDO, TELEFONO, CORREO, SEXO, DIRECCION, Cod_ciudad) VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$correo', '$sexo', '$direccion', '$ciudad')";
        $querys = "INSERT INTO beneficiario (CEDULA_beneficiario, FECHA_DECESO, CAUSA_MUERTE, FECHA_NACIMIENTO, PARTIDA_NACIMIENTO) VALUES ('$cedula', '$fecha_de', '$causa','$fecha_na','$partida')";
        $result = mysqli_query($mysqli, $query);
        $resultado = mysqli_query($mysqli, $querys);

        if (!$resultado) {
            $error = mysqli_error($mysqli);
            echo "<script>
            alert('Error: " . $error . "');
            window.location.href = 'beneficiario.php';
            </script>";
        } else {
            echo "<script>
            alert('Registro guardado satisfactoriamente');
            window.location.href = 'beneficiario.php';
            </script>";
        }
    }

?>