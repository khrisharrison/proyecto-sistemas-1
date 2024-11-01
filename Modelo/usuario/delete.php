<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    //si existe el el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM usuario WHERE CEDULA_usuario = $id";
        $result = mysqli_query($mysqli,$query);
        if(!$result){
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el usuario: " . $mensaje_error . "'); window.location.href = 'usuario.php';</script>";
        }
        else{
        echo "<script>alert('El usuario se eliminó con éxito.'); window.location.href = 'usuario.php';</script>";
        }
    }
?>