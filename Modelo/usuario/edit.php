<?php
include ('../../database/conexion.php');//incluir base de datos
$cedula='';
$nombre='';
$apellido='';
$telefono='';
$correo='';
$sexo='';
$ciudad='sss';
$direccion='';
$login='';
$password='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM usuario WHERE CEDULA_usuario=$id";
        $querys = "SELECT * FROM persona WHERE CEDULA=$id";
        $result = mysqli_query($mysqli, $query);
        $resultado = mysqli_query($mysqli, $querys);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $cedula = $row['CEDULA_usuario'];
            $login = $row['LOG_IN'];
            $password = $row['CLAVE'];
        }
        if (mysqli_num_rows($resultado) == 1) {
            $cedula = $row['CEDULA_usuario'];
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['NOMBRE'];
            $apellido = $row['APELLIDO'];
            $telefono= $row['TELEFONO'];
            $correo= $row['CORREO'];
            $sexo= $row['SEXO'];
            $direccion= $row['DIRECCION'];
        }
    }
    if (isset($_POST['update'])){
        $cedula= $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if($password == $confirmpassword){
            $query = "UPDATE usuario set LOG_IN = '$login', CLAVE = '$password' WHERE CEDULA_usuario=$cedula";
            $querys = "UPDATE persona set NOMBRE = '$nombre', APELLIDO = '$apellido', TELEFONO = '$telefono', DIRECCION = '$direccion', CORREO = '$correo', Cod_ciudad = '$ciudad', SEXO = '$sexo' WHERE CEDULA=$cedula";
            mysqli_query($mysqli, $query);
            mysqli_query($mysqli, $querys);
            if(!$result){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'usuario.php';
                    </script>";
            }
            if(!$resultado){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'usuario.php';
                    </script>";
            }
            $_SESSION['message'] = "Tarea guardada satisfactoriamente";
            $_SESSION['message_type'] = 'success';//esto es un color
              echo
                "<script>
                  alert('Se modifico con Exito. ');
                  window.location.href = 'usuario.php';
                </script>";
        }else{
                    echo
                    "<script>
                      alert('No coinciden los password');
                      window.location.href = 'usuario.php';
                    </script>";
            }

    }
?>

<?php include("../../Vista/Layouts/munuusuario/layout.php");?>

<div class="container p-4">
    <div class="row">
    <div class="d-grid gap-2 col-8 mx-auto" style="width: 500px; margin-top: 20px !important; margin-bottom: 20px;">  
            <div class="card card-body">
                <h1 class="mt-4 mb-4">Modificar</h1>
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                        <p class="h7">Cédula del usuario:</p>
                        <input name="cedula" type="text" class="form-control" class="display-1"  value="<?php echo $cedula; ?>" placeholder="remplace cédula" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                            <p class="h7">Nombre:</p>
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="remplace nombre" required  onkeypress="return soloLetras(event);" onblur="limpia();" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Apellido:</p>
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="remplace apellido" required onkeypress="return soloLetras(event)" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Telefono:</p>
                        <input name="telefono" type="number" min="0" class="form-control" value="<?php echo $telefono; ?>" placeholder="remplace telefono" required onkeypress="return valideKey(event)" onblur="limpia()" id="miInput"> 
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Correo:</p>
                        <input name="correo" type="email" class="form-control" value="<?php echo $correo; ?>" placeholder="remplace correo" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Direccion:</p>
                        <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="remplace direccion" required  onkeypress=onblur="limpia()" id="miInput">
                    </div><br>
                     <div class="form-group">
                        <div>Seleccione  :
                        <select name="sexo" id="sexo" required class="form-control" style="width: 180px;">
                            <option value="">Seleccione sexo</option>
                            <option value="M"<?php if ($row['SEXO'] === 'M') { echo ' selected'; } ?>>Masculino</option>
                            <option value="F"<?php if ($row['SEXO'] === 'F') { echo ' selected'; } ?>>Femenino</option>
                        </select><br>
                    </div><br>
        <?php include ("../../includes/barrallena.php"); ?>
                    <div class="form-group">
                        <br><p class="h7">Usuario:</p>
                        <input name="login" type="text" class="form-control" value="<?php echo $login; ?>" placeholder="remplace el nombre de usuario" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Contraseña:</p>
                        <input name="password" type="password" class="form-control" value="<?php echo $password; ?>" placeholder="remplace contraseña" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Confirmar contraseña:</p>
                        <input name="confirmpassword" type="password" class="form-control" placeholder="confirme contraseña" required  onkeypress= onblur="limpia()" id="miInput">
                    </div><br>
                    <div class="text-center">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm" style="font-size: 18px" type="button"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("../../Vista/Layouts/footer.php");