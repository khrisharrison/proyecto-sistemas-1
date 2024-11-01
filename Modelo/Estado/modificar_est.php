<?php include("../../Vista/Layouts/munuusuario/layout.php");?>

<body>

<h1>MODIFICAR</h1>

<?php
  include ('../../database/conexion.php');

  if(!isset($_POST["bot_actualizar"])){
    $id=$_GET["CODIGO_ESTADO"];
    $nom=$_GET["nom"];
    
  }else{
    $id=validar_campo($_POST["id"]);
    $nom=validar_campo($_POST["nom"]);
    
    // Verificar si ya existe un estado con el mismo nombre
    $sql = "SELECT * FROM estado WHERE NOMBRE_ESTADO=?";
    $resultado=$mysqli->prepare($sql);

    $resultado->bind_param("s", $nom);

    $resultado->execute();

    $resultado->store_result();

    if ($resultado->num_rows > 0) {
      // Si ya existe un estado con el mismo nombre, mostrar un mensaje de error
      echo "<script>alert('Error, ya existe un estado con el mismo nombre.'); window.location.href = 'estado.php';</script>";
    } else {
      // Si no existe un estado con el mismo nombre, actualizar el estado en la base de datos
      $sql = "UPDATE estado SET NOMBRE_ESTADO=? WHERE CODIGO_ESTADO=?";
      $resultado=$mysqli->prepare($sql);

      $resultado->bind_param("si", $nom, $id);

      // Ejecutar la consulta
      if ($resultado->execute()) {
          echo "<script>alert('El estado se actualizó correctamente.'); window.location.href = 'estado.php';</script>";
      } else {
          echo "<script>alert('Error al actualizar el estado. Error: " . $resultado->error . "'); window.location.href = 'estado.php';</script>";
      }
    }
  }

  function validar_campo($campo) {
  // Eliminar espacios en blanco al inicio y final del campo
  $campo = trim($campo);

  // Verificar si el campo está vacío
  if (empty($campo)) {
    // Si el campo está vacío, mostrar un mensaje de error
    echo "<script>alert('Por favor complete todos los campos.'); window.location.href = 'estado.php';</script>";
    exit;
    return false;
  } else {
    // Si el campo no está vacío, devolver el valor del campo
    return $campo;
  }
}
?>

<p>&nbsp;</p>

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td class="col-md-2 control-label text-white bg-dark font-weight-bold">ID Estado:</td>
      <td class="col-md-10">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>" class="form-control-static">
        <p class="form-control-static"><?php echo $id?></p>
      </td>
    </tr>
    <tr>
      <td class="col-md-2 control-label text-white bg-dark font-weight-bold">Nombre:</td>
      <td class="col-md-10">
        <input type="text" name="nom" id="nom" value="<?php echo $nom?>" class="form-control">
      </td>
    </tr>
    <tr>
      <td class="col-md-2 control-label"></td>
      <td class="col-md-10">
        <input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar" class="btn btn-primary">

      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
      <div class="text-center text-right">
        <a href="estado.php" class="btn btn-primary">Volver</a>
      </div>
<p>&nbsp;</p>

<?php include ("../../Vista/Layouts/footer.php");?>

</body>
</html>