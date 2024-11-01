<?php 

  include ('../../database/conexion.php');
  $Id=$_GET["Id"];

  $query="DELETE FROM municipio WHERE CODIGO_MUNICIPIO=$Id";
  $result=mysqli_query($mysqli,$query);
    if (!$result) {
        $mensaje_error = mysqli_error($mysqli);
        echo "<script>alert('Error al eliminar el municipio: " . $mensaje_error . "'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('El municipio se eliminó con éxito.'); window.location.href = 'index.php';</script>";
    }
 ?>