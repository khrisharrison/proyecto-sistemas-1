<?php
include ('../../database/conexion.php');//incluir base de datos
$cedula='';
$nombre='';
$apellido='';
$telefono='';
$correo='';
$sexo='';
$direccion='';
$ciudad='';
$partida='';
$fecha_na='';
$fecha_de='';
$causa='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM beneficiario WHERE CEDULA_beneficiario=$id";
        $querys = "SELECT * FROM persona WHERE CEDULA=$id";
        $result = mysqli_query($mysqli, $query);
        $resultado = mysqli_query($mysqli, $querys);
        if (mysqli_num_rows($result) == 1) { //Muestra lo que tiene el beneficiario
            $row = mysqli_fetch_array($result);
            $cedula = $row['CEDULA_beneficiario'];
            $partida= $row['PARTIDA_NACIMIENTO'];
            $fecha_na= $row['FECHA_NACIMIENTO'];
            $fecha_de= $row['FECHA_DECESO'];
            $causa= $row['CAUSA_MUERTE'];
        }
        if (mysqli_num_rows($resultado) == 1) {//este la persona asi que son diferentes las 2
            $cedula = $row['CEDULA_beneficiario'];
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['NOMBRE'];
            $apellido = $row['APELLIDO'];
            $telefono= $row['TELEFONO'];
            $correo= $row['CORREO'];
            $sexo= $row['SEXO'];
            $direccion= $row['DIRECCION'];
            $ciudad = $row['Cod_ciudad'];
        }
    }
    if (isset($_POST['update'])){
        $cedula= $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $partida = $_POST['partida'];
        $fecha_na = $_POST['fecha_na'];
        $fecha_de = $_POST['fecha_de'];
        $causa = $_POST['causa'];

            $query = "UPDATE beneficiario SET CEDULA_beneficiario = '$cedula', PARTIDA_NACIMIENTO = '$partida', FECHA_NACIMIENTO = '$fecha_na', FECHA_DECESO = '$fecha_de', CAUSA_MUERTE = '$causa' WHERE CEDULA_beneficiario = $cedula";
            $querys = "UPDATE persona set NOMBRE = '$nombre', APELLIDO = '$apellido', TELEFONO = '$telefono', DIRECCION = '$direccion', CORREO = '$correo', SEXO = '$sexo' , Cod_ciudad = '$ciudad' WHERE CEDULA=$cedula";
            mysqli_query($mysqli, $query);
            mysqli_query($mysqli, $querys);
            if(!$result){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'beneficiario.php';
                    </script>";
            }
            if(!$resultado){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'beneficiario.php';
                    </script>";
            }
              echo
                "<script>
                  alert('Se modifico con Exito. ');
                  window.location.href = 'beneficiario.php';
               </script>";

    }
?>

<?php include("../../Vista/Layouts/munuusuario/layout.php");?>
<div class="container p-4">
    <div class="row">
    <div class="col-md-8 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 80px;">  
            <div class="card card-body">
                <h1 class="mt-4 mb-4">Modificar</h1>
                <form id="formulario1" action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                        <p class="h7">Cédula del beneficiario:</p>
                        <input name="cedula" type="text" class="form-control" class="display-1"  value="<?php echo $cedula; ?>" placeholder="remplace cédula" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                            <p class="h7">Nombre:</p>
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="remplace nombre" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Apellido:</p>
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="remplace apellido" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Telefono:</p>
                        <input name="telefono" type="number" min="0" class="form-control" value="<?php echo $telefono; ?>" placeholder="remplace telefono" required  onkeypress="return valideKey(event);" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Correo:</p>
                        <input name="correo" type="email" class="form-control" value="<?php echo $correo; ?>" placeholder="remplace correo" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Direccion:</p>
                        <textarea name="direccion" cols="30" rows="5" type="text" class="form-control" placeholder="remplace direccion" required  onkeypress= onblur="limpia()" id="miInput"><?php echo $direccion; ?></textarea>
                        </div><br>
                     <div class="form-group">
                        <div>Sexo :
                    <select name="sexo" id="sexo" required class="form-control" style="width: 180px;">
                        <option value="">Seleccione sexo</option>
                        <option value="M"<?php if ($row['SEXO'] === 'M') { echo ' selected'; } ?>>Masculino</option>
                        <option value="F"<?php if ($row['SEXO'] === 'F') { echo ' selected'; } ?>>Femenino</option>
                    </select>
                     <br><br>
                    <?php include("../../includes/barrallena.php"); ?>
                  </div><br>
                    <div class="form-group">
                        <p class="h7">Partida de Nacimiento:</p>
                        <input name="partida" type="number" min="0" class="form-control" value="<?php echo $partida; ?>" placeholder="remplace partida de nacimiento" required onkeypress="return valideKey(event);" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                      <p class="h7">Fecha nacimiento:</p>
                      <input type="date" class="form-control" id="miInput" name="fecha_na" style="width: 150px;"  value="<?php echo $fecha_na; ?>" required>
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="miInput" name="ciudad" value="<?php echo $ciudad; ?>">
                    </div>
                    <div class="form-group">
                      <p class="h7">Fecha deceso:</p>
                      <input type="date" class="form-control" id="miInput" name="fecha_de" style="width: 150px;" value="<?php echo $fecha_de; ?>">
                    <div class="form-group">
                        <br><p class="h7">Causa de Muerte:</p>
                        <textarea name="causa" cols="30" rows="5" type="text" class="form-control" placeholder="Causa de muerte (Opcional)" onblur="limpia()" id="miInput"><?php echo $causa; ?></textarea>
                    </div><br>
                </div>
                    <div class="text-center">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px" type="button"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function confirmReload(checkbox) {
  const originalValue = checkbox.checked;
  if (confirm('Al presionar este botón se recargará la página. Asegúrese de guardar los cambios antes de continuar.')) {
    checkbox.form.submit();
  } else {
    checkbox.checked = !originalValue;
  }
}
</script>
<?php include ("../../Vista/Layouts/footer.php");