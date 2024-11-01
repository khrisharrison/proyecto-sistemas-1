<?php 

  include ('../../database/conexion.php');
  $Id=$_GET["Id"];

  $query="DELETE FROM estado WHERE CODIGO_ESTADO=$Id";
  $result=mysqli_query($mysqli,$query);
    if (!$result) {
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el estado: " . $mensaje_error . "'); window.location.href = 'estado.php';</script>";
    } else {
        echo "<script>alert('El estado se eliminó con éxito.'); window.location.href = 'estado.php';</script>";
    }
 ?>