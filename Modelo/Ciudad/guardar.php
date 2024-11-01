<?php
  include ('../../database/conexion.php');

if (isset($_POST['bot_agregar'])) {
  $id_parroquia = validar_campo($_POST['parroquia']);
  $nombre_ciudad = validar_campo($_POST['ciudad']);
  
  // Se verifica si la ciudad ya existe en la base de datos
  $consulta_existencia = "SELECT * FROM ciudad WHERE nombre_ciudad='$nombre_ciudad' AND codigo_parroquia='$id_parroquia'";
  $resultado_existencia = $mysqli->query($consulta_existencia);
  if ($resultado_existencia->num_rows > 0) {
    // Si la ciudad ya existe, se muestra un mensaje de error y se redirecciona al usuario a la página "menuinsertar.php"
    echo "<script>alert('Error, La ciudad ya se encuentra registrada en esa parroquia.'); window.location.href = 'menuinsertar.php';</script>";
    exit;
  }
  
  $guardar_query = "INSERT INTO ciudad (nombre_ciudad, codigo_parroquia) VALUES ('$nombre_ciudad', '$id_parroquia')";

  // Se ejecuta la consulta INSERT INTO y se verifica si se ha ejecutado correctamente
  if ($mysqli->query($guardar_query) === TRUE) {
    // Si la consulta se ha ejecutado correctamente, se muestra un mensaje de éxito
    echo "<script>alert('Se ha registrado con éxito la ciudad.'); window.location.href = 'index.php';</script>";
  } else {
    // Si la consulta no se ha ejecutado correctamente, se muestra un mensaje de error con la causa del problema
    echo "<script>alert('Error al registrar la ciudad. Error: " . $mysqli->error . "'); window.location.href = 'index.php';</script>";
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
