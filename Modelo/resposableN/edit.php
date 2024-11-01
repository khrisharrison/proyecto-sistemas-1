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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM responsable_natural WHERE CEDULA_natural=$id";
        $querys = "SELECT * FROM persona WHERE CEDULA=$id";
        $result = mysqli_query($mysqli, $query);
        $resultado = mysqli_query($mysqli, $querys);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $cedula = $row['CEDULA_natural'];
        }
        if (mysqli_num_rows($resultado) == 1) {
            $cedula = $row['CEDULA_natural'];
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
            $query = "UPDATE responsable_natural set CEDULA_natural = '$cedula' WHERE CEDULA_natural=$cedula";
            $querys = "UPDATE persona set NOMBRE = '$nombre', APELLIDO = '$apellido', TELEFONO = '$telefono', DIRECCION = '$direccion', CORREO = '$correo', SEXO = '$sexo', Cod_ciudad = '$ciudad' WHERE CEDULA=$cedula";
            mysqli_query($mysqli, $query);
            mysqli_query($mysqli, $querys);
            if(!$result){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'responsable.php';
                    </script>";
            }
            if(!$resultado){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'responsable.php';
                    </script>";
            }
              echo
                "<script>
                  alert('Se modifico con Exito. ');
                  window.location.href = 'responsable.php';
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
                        <p class="h7">Cédula: </p>
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
                        <input name="telefono" type="number" min="0" class="form-control" value="<?php echo $telefono; ?>" placeholder="remplace telefono" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Correo:</p>
                        <input name="correo" type="email" class="form-control" value="<?php echo $correo; ?>" placeholder="remplace correo" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Direccion:</p>
                        <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="remplace direccion" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="miInput" name="ciudad" value="<?php echo $ciudad; ?>">
                    </div>
                     <div class="form-group">
                        <div>Seleccione  :
                    <select name="sexo" id="sexo" required class="form-control" style="width: 180px;">
                        <option value="">Seleccione sexo</option>
                        <option value="M"<?php if ($row['SEXO'] === 'M') { echo ' selected'; } ?>>Masculino</option>
                        <option value="F"<?php if ($row['SEXO'] === 'F') { echo ' selected'; } ?>>Femenino</option>
                    </select></div>
                    </div>
                    <br>
                    <?php include("../../includes/barrallena.php"); ?>
                    <br>
                    <div class="text-center">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px" type="button"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("../../Vista/Layouts/footer.php");