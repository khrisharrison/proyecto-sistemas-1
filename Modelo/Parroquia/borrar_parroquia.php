<?php 

  include ('../../database/conexion.php');
  $Id=$_GET["Id"];

  $query="DELETE FROM parroquia WHERE CODIGO_PARROQUIA=$Id";
  $result=mysqli_query($mysqli,$query);
    if (!$result) {
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar la parroquia: " . $mensaje_error . "'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('La parroquia se eliminó con éxito.'); window.location.href = 'index.php';</script>";
    }
 ?>