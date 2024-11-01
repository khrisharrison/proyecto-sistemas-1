<?php
include ('../../database/conexion.php');
if(isset($_POST['save'])){
    //persona
    $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre'];//queda igual
    $apellido = $_POST['apellido'];//costo = $_POST['costo']
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

$nombre_usuario = $_POST['login']; // Obtener el nombre de usuario del formulario POST
$query = "SELECT COUNT(*) as count FROM USUARIO WHERE LOG_IN = '$nombre_usuario'";
$resultado = mysqli_query($mysqli, $query); // Ejecutar la consulta SQL

$fila = mysqli_fetch_assoc($resultado);
if ($fila['count'] > 0) {
    echo "<script>alert('El nombre de usuario ya existe. Por favor, elige otro nombre de usuario.');window.location.href = 'usuario.php';</script>";
    exit();

}


if ($password == $confirmpassword) {
    $query = "INSERT INTO persona (CEDULA, NOMBRE, APELLIDO, TELEFONO, CORREO, SEXO, DIRECCION, Cod_ciudad) VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$correo', '$sexo', '$direccion', '$ciudad')";
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        $error = mysqli_error($mysqli);
        echo "<script>
        alert('Error: " . $error . "');
        window.location.href = 'usuario.php';
        </script>";
    } else {
                echo "<script>
                alert('Se registro con Exito. ');
                window.location.href = 'usuario.php';
                </script>";
            }

    $querys = "INSERT INTO usuario (CEDULA_usuario, LOG_IN, CLAVE) VALUES ('$cedula', '$login', '$password')";
            $resultado = mysqli_query($mysqli, $querys);

            if (!$resultado) {
                $error = mysqli_error($mysqli);
                echo "<script>
                alert('Error: " . $error . "');
                window.location.href = 'usuario.php';
                </script>";
            } else {
                echo "<script>
                alert('Se registro con Exito. ');
                window.location.href = 'usuario.php';
                </script>";
            }
        
    
}else {
    echo "<script>
    alert('No coinciden los password');
    window.location.href = 'usuario.php';
    </script>";
}
}
?>