<?php include ('../../database/conexion.php');

if(isset($_POST['save'])){
    //persona
    $NUMERO_POLIZA = $_POST['numero'];//$codigo = $_POST['codigo'] number
    $FECHA = $_POST['fecha'];
    $MONTO = $_POST['monto'];
    //$OBSERVACIONES = $_POST['OBSERVACIONES'];
    $STATUS = 'ACTIVO';

        $guardar_query = "INSERT INTO recibo_pago (NUMERO_POLIZA, FECHA_PAGO, MONTO, Estado) VALUES ('$NUMERO_POLIZA', '$FECHA', '$MONTO', '$STATUS')";

        //$result=mysqli_query($mysqli,$query);

    //si no nos devuelve un resultado nos cierra el programa
    // Se ejecuta la consulta INSERT INTO y se verifica si se ha ejecutado correctamente
  if ($mysqli->query($guardar_query) === TRUE) {
    // Si la consulta se ha ejecutado correctamente, se muestra un mensaje de éxito
    echo "<script>alert('Se ha registrado con éxito el recibo.'); window.location.href = 'recibo.php';</script>";
  } else {
    // Si la consulta no se ha ejecutado correctamente, se muestra un mensaje de error con la causa del problema
    echo "<script>alert('Error al registrar el recibo. Error: " . $mysqli->error . "'); window.location.href = 'recibo.php';</script>";
  }
}

?> 
