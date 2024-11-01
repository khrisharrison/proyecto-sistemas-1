<?php
  include ('../../database/conexion.php');

if (isset($_POST['bot_agregar'])) {
  $CODIGO_MUNICIPIO = validar_campo($_POST['municipio']);
  $NOMBRE_PARROQUIA = validar_campo($_POST['parroquia']);
  
  // Se verifica si la parroquia ya existe en la base de datos
  $consulta_existencia = "SELECT * FROM parroquia WHERE NOMBRE_PARROQUIA='$NOMBRE_PARROQUIA' AND CODIGO_MUNICIPIO='$CODIGO_MUNICIPIO'";
  $resultado_existencia = $mysqli->query($consulta_existencia);
  if ($resultado_existencia->num_rows > 0) {
    // Si la parroquia ya existe, se muestra un mensaje de error y se redirecciona al usuario a la página "menuinsertar.php"
    echo "<script>alert('Error, La parroquia ya se encuentra registrada en ese municipio'); window.location.href = 'menuinsertar.php';</script>";
    exit;
  }
  
  $guardar_query = "INSERT INTO parroquia (NOMBRE_PARROQUIA,CODIGO_MUNICIPIO) VALUES ('$NOMBRE_PARROQUIA', '$CODIGO_MUNICIPIO')";
  
  // Se ejecuta la consulta INSERT INTO y se verifica si se ha ejecutado correctamente
  if ($mysqli->query($guardar_query) === TRUE) {
    // Si la consulta se ha ejecutado correctamente, se muestra un mensaje de éxito
    echo "<script>alert('Se ha registrado con éxito la Parroquia.'); window.location.href = 'index.php';</script>";
  } else {
    // Si la consulta no se ha ejecutado correctamente, se muestra un mensaje de error con la causa del problema
    echo "<script>alert('Error al registrar la Parroquia. Error: " . $mysqli->error . "'); window.location.href = 'index.php';</script>";
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