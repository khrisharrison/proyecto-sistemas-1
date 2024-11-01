<?php
include ('../../database/conexion.php');//incluir base de datos
$Nombre='';
$Razon_Social='';
$Ciudad='';
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM RESPONSABLE_JURIDICO WHERE RIF_juridico=$id";
  $querys = "SELECT * FROM ENTIDAD_JURIDICA WHERE RIF=$id";
  $result = mysqli_query($mysqli, $query);
  $resultado = mysqli_query($mysqli, $querys);
  if (mysqli_num_rows($result) == 1) { //Muestra lo que tiene la persona
    $row = mysqli_fetch_array($result);
    $Rif= $row['RIF_juridico'];
    $Direccion= $row['DIRECCION'];
    $Correo= $row['CORREO'];
    $Razon_Social = $row['RAZON_SOCIAL'];
  }
  if (mysqli_num_rows($resultado) == 1) {//este la persona asi que son diferentes las 2
    $row = mysqli_fetch_array($resultado);
    $Rif = $row['RIF'];
    $Nombre= $row['NOMBRE'];
    $Ciudad= $row['Cod_ciudad_Ju'];
  }
}
if (isset($_POST['update'])){
  $Rif= $_GET['id'];
  $Nombre = $_POST['NOMBRE'];
  $Razon_Social = $_POST['RAZON_S'];
  $Correo = $_POST['CORREO'];
  $Direccion = $_POST['DIRECCION'];
  $Ciudad = $_POST['ciudad'];
  
  $query = "UPDATE RESPONSABLE_JURIDICO SET RAZON_SOCIAL = '$Razon_Social', CORREO = '$Correo', DIRECCION = '$Direccion' WHERE RIF_juridico = $Rif";
  $querys = "UPDATE ENTIDAD_JURIDICA set NOMBRE = '$Nombre', Cod_ciudad_Ju = '$Ciudad', WHERE RIF=$Rif";
  mysqli_query($mysqli, $query);
  mysqli_query($mysqli, $querys);
  if(!$result){
    echo
    "<script>
    alert('Error. Verifique de nuevo');
    window.location.href = 'responsablej.php';
    </script>";
  }
  if(!$resultado){
    echo
    "<script>
    alert('Error. Verifique de nuevo');
    window.location.href = 'responsablej.php';
    </script>";
  }
  echo
  "<script>
  alert('Se modifico con Exito. ');
  window.location.href = 'responsablej.php';
  </script>";
  
}
?>

<?php include("../../Vista/Layouts/munuusuario/layout.php");?>

<div class="container p-4">
<div class="row">
<div class="col-md-10 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
<div class="card card-body">
<h1 class="mt-4 mb-4">Modificar</h1>
<form id="formulario1" action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
<div class="form-group">
<p class="h7">Rif:</p>
<input name="RIF" type="number" min="0" class="form-control" class="display-1"  value="<?php echo $Rif; ?>" placeholder="remplace RIF" aria-label="Disabled input example" disabled>
</div><br>
<div class="form-group">
<p class="h7">Nombre:</p>
<input name="NOMBRE" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="remplace NOMBRE" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
</div><br>
<div class="form-group">
<p class="h7">Razon Social:</p>
<input name="RAZON_S" type="text" class="form-control" value="<?php echo $Razon_Social; ?>" placeholder="remplace RAZON_S" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
</div><br>
<div class="form-group">
<p class="h7">Correo:</p>
<input name="CORREO" type="email" class="form-control" value="<?php echo $Correo; ?>" placeholder="remplace CORREO" required  onkeypress= onblur="limpia()" id="miInput">
</div><br>
<div class="form-group">
<p class="h7">Direccion:</p>
<input name="DIRECCION" type="text" class="form-control" value="<?php echo $Direccion; ?>" placeholder="remplace DIRECCION" required  onkeypress= onblur="limpia()" id="miInput">

</div><br>

<?php include("../../includes/barrallenaj.php"); ?>
<div class="text-center">
<input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px" type="button"></button>
</form>

<br>
</div>
</div>
</div>
</div>
</div>
