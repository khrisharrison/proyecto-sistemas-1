<?php
  include ('../../database/conexion.php');

if (isset($_POST['bot_agregar'])) {
  $CODIGO_ESTADO = validar_campo($_POST['ESTADO']);
  $NOMBRE_MUNICIPIO = validar_campo($_POST['MUNICIPIO']);
  
  // Se verifica si el municipio ya existe en la base de datos
  $consulta_existencia = "SELECT * FROM MUNICIPIO WHERE NOMBRE_MUNICIPIO='$NOMBRE_MUNICIPIO' AND CODIGO_ESTADO='$CODIGO_ESTADO'";
  $resultado_existencia = $mysqli->query($consulta_existencia);
  if ($resultado_existencia->num_rows > 0) {
    // Si el municipio ya existe, se muestra un mensaje de error y se redirecciona al usuario a la página "menuinsertar.php"
    echo "<script>alert('Error, el municipio ya se encuentra registrado en ese estado'); window.location.href = 'menuinsertar.php';</script>";
    exit;
  }
  
  $guardar_query = "INSERT INTO MUNICIPIO (NOMBRE_MUNICIPIO,CODIGO_ESTADO) VALUES ('$NOMBRE_MUNICIPIO', '$CODIGO_ESTADO')";
  
  // Se ejecuta la consulta INSERT INTO y se verifica si se ha ejecutado correctamente
  if ($mysqli->query($guardar_query) === TRUE) {
    // Si la consulta se ha ejecutado correctamente, se muestra un mensaje de éxito
    echo "<script>alert('Se ha registrado con éxito el municipio.'); window.location.href = 'index.php';</script>";
  } else {
    // Si la consulta no se ha ejecutado correctamente, se muestra un mensaje de error con la causa del problema
    echo "<script>alert('Error al registrar el municipio. Error: " . $mysqli->error . "'); window.location.href = 'index.php';</script>";
  }
}

function validar_campo($campo) {
  // Eliminar espacios en blanco al inicio y final del campo
  $campo = trim($campo);
  
  // Verificar si el campo está vacío
  if (empty($campo)) {
    // Si el campo está vacío, mostrar un mensaje de error
    echo "<script>alert('Por favor complete todos los campos.'); window.location.href = 'menuinsertar.php';</script>";
    exit;
    return false;
  } else {
    // Si el campo no está vacío, devolver el valor del campo
    return $campo;
  }
}
?>