<?php
    //incluyo la base de datos
    include ('../../database/conexion.php');
    /// Recibe los datos del formulario
    $id = $_GET['id'];

      $query = "UPDATE recibo_pago SET Estado='Inactivo' WHERE NUMERO_RECIBO = $id";
        
      if ($mysqli->query($query) === TRUE) {
        echo "<script>alert('El recibo se anuló correctamente.'); window.location.href = 'recibo.php';</script>";

      } else {
        echo "<script>alert('Error al anular el recibo. Error: " . $resultado->error . "'); window.location.href = 'recibo.php';</script>";
      }

      // Cierra la conexión con la base de datos
      $mysqli->close();
?>