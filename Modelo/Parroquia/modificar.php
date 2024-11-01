<?php include("../../Vista/Layouts/munuusuario/layout.php");?>

<body>
<p>&nbsp;</p>
<h1>MODIFICAR</h1>

<?php
  include ('../../database/conexion.php');

if(!isset($_POST["bot_actualizar"])){
  $id=$_GET["Id"];
  $nom=$_GET["parr"];
  $par=$_GET["id_mun"]; // nuevo campo agregado
  
}else{
  $id=$_POST["id"];
  $nom=validar_campo($_POST["nom"]);
  $par=validar_campo($_POST["par"]); // nuevo campo agregado
  
  // Verifica si ya existe una parroquia con el mismo nombre y nombre de municipio
  $sql = "SELECT * FROM parroquia WHERE NOMBRE_PARROQUIA=? AND CODIGO_MUNICIPIO=?";
  $resultado=$mysqli->prepare($sql);
  
  $resultado->bind_param("si", $nom, $par);
  
  $resultado->execute();
  
  $resultado->store_result();
  
  if ($resultado->num_rows > 0) {
    // Si ya existe una parroquia con el mismo nombre de municipio, mostrar un mensaje de error
    echo "<script>alert('Error, ya existe una parroquia con el mismo nombre de municipio.'); window.location.href = 'index.php';</script>";
  } else {
    // Si no existe una parroquia con el mismo nombre de municipio, actualizar la parroquia en la base de datos
    $sql = "UPDATE PARROQUIA SET NOMBRE_PARROQUIA=?,CODIGO_MUNICIPIO=? WHERE CODIGO_PARROQUIA=?";
    $resultado=$mysqli->prepare($sql);
    
    $resultado->bind_param("sii", $nom, $par, $id);
    
    // Ejecutar la consulta
    if ($resultado->execute()) {
      echo "<script>alert('La Parroquia se modificó con exito.'); window.location.href = 'index.php';</script>";
    } else {
      echo "<script>alert('Error al modificar la Parroquia. Error: " . $resultado->error . "'); window.location.href = 'index.php';</script>";
    }
  }
}

function validar_campo($campo) {
  // Eliminar espacios en blanco al inicio y final del campo
  $campo = trim($campo);
  
  // Verificar si el campo está vacío
  if (empty($campo)) {
    // Si el campo está vacío, mostrar un mensaje de error
    echo "<script>alert('Por favor complete todos los campos.'); window.location.href = 'index.php';</script>";
    exit;
    return false;
  } else {
    // Si el campo no está vacío, devolver el valor del campo
    return $campo;
  }
}
?>

<p>

</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
<tr>
<tr>
  <td class="col-md-2 control-label text-white bg-dark font-weight-bold">ID Parroquia:</td>
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
  <td class="col-md-2 control-label"></td>
  <td class="col-md-10">
    <input type="hidden" name="par" id="par" value="<?php echo $par?>">
    <input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar" class="btn btn-primary">
  </td>
  </table>
</form>
<p>&nbsp;</p>
      <div class="text-center text-right">
        <a href="index.php" class="btn btn-primary">Volver</a>
      </div>
<p>&nbsp;</p>
</body>
<?php include ("../../Vista/Layouts/footer.php");?>
</html>