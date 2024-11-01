<?php
  include ('../../database/conexion.php');

if (isset($_POST['bot_agregar'])) {
  $nombre_estado = validar_campo($_POST['estado']);
  echo $nombre_estado;
  
  $consulta_existencia = "SELECT * FROM estado WHERE NOMBRE_ESTADO='$nombre_estado'";
  $resultado_existencia = $mysqli->query($consulta_existencia);
  if ($resultado_existencia->num_rows > 0) {
    // Si el estado ya existe, se muestra un mensaje de error y se redirecciona al usuario a la página "menuinsertar.php"
    echo "<script>alert('Error, El estado ya se encuentra registrado.'); window.location.href = 'menuinsertar.php';</script>";
    exit;
  }
  
  $guardar_query = "INSERT INTO estado (NOMBRE_ESTADO) VALUES ('$nombre_estado')";

  // Se ejecuta la consulta INSERT INTO y se verifica si se ha ejecutado correctamente
  if ($mysqli->query($guardar_query) === TRUE) {
    // Si la consulta se ha ejecutado correctamente, se muestra un mensaje de éxito
    echo "<script>alert('Se ha registrado con éxito el Estado.'); window.location.href = 'estado.php';</script>";
    exit;
  } else {
    // Si la consulta no se ha ejecutado correctamente, se muestra un mensaje de error con la causa del problema
    echo "<script>alert('Error al registrar el estado. Error: " . $mysqli->error . "'); window.location.href = 'estado.php';</script>";
    exit;
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
  } else {
    // Si el campo no está vacío, devolver el valor del campo
    return $campo;
  }
}
?>