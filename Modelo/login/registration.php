<?php
include ('../../database/conexion.php');
include("../../Vista/Layouts/menuinicio/layout.php");
$cedula = '';
if(isset($_POST['save'])){
    //persona
    $cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
    $nombre = $_POST['nombre'];//queda igual
    $apellido = $_POST['apellido'];//costo = $_POST['costo']
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];


$query = "SELECT COUNT(*) as count FROM USUARIO WHERE LOG_IN = '$login'";
$resultado = mysqli_query($mysqli, $query); // Ejecutar la consulta SQL

$fila = mysqli_fetch_assoc($resultado);
if ($fila['count'] > 0) {
    echo "<script>alert('El nombre de usuario ya existe. Por favor, elige otro nombre de usuario.');window.location.href = 'login.php';</script>";

    exit();
}
if($password == $confirmpassword) {
        $query = "INSERT INTO persona (CEDULA, NOMBRE, APELLIDO, TELEFONO, CORREO, SEXO, DIRECCION, Cod_ciudad) VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$correo', '$sexo', '$direccion', '$ciudad')";
        $querys = "INSERT INTO usuario (CEDULA_usuario, LOG_IN, CLAVE) VALUES ('$cedula', '$login', '$password')";
        $result=mysqli_query($mysqli,$query);
        $resultado = mysqli_query($mysqli,$querys);
    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
         echo
        "<script>
          alert('error verifique de nuevo');
          window.location.href = 'login.php';
        </script>";
    }
    if(!$resultado){
         echo
        "<script>
          alert('error verifique de nuevo');
          window.location.href = 'login.php';
        </script>";
    }

    //con esto creamos un mensaje que se mostrara en pantalla cuando se guarde de manera exitosa
    $_SESSION['message'] = "Tarea guardada satisfactoriamente";
    $_SESSION['message_type'] = 'success';//esto es un color
         echo
        "<script>
          alert('Se a registrado satisfactoriamente');
          window.location.href = 'login.php';
        </script>";
         echo
        "<script>
          alert('error verifique de nuevo');
          window.location.href = 'login.php';
        </script>";
    }else{
        echo
        "<script>
          alert('No coinciden los password');
          window.location.href = 'login.php';
        </script>";
    }
}
?>

<!--Funcionamiento-->
<div class="col-md-8 mx-auto" style="width: 700px; margin-top: 110px !important; margin-bottom: 100px !important;"> 
    <h1 class="mt-2 mb-4">Registro</h1>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php session_unset(); } //el session_unset limpia los datos que tenemos?>
 <div class="card card-body">
    <!--formulario de preguntas-->
    <form action="registration.php" method="POST">
        <div class="form-group">
            <input type="number" min="0" name="cedula" class="form-control" required placeholder="Cédula">
        </div>
        <br>
        <div class="row">
            <div class="col">
                <input type="text" name="nombre" class="form-control" required placeholder="Nombre">
            </div>
            <div class="col">
                <input type="text" name="apellido" class="form-control" required placeholder="Apellido">
            </div>
        </div>
        <br>
        <div class="form-group">
            <input type="number" min="0" name="telefono" class="form-control" required placeholder="Teléfono">
        </div>
        <br>
        <div class="form-group">
            <input type="email" name="correo" class="form-control" required placeholder="Correo electrónico">
        </div>
                Seleccione:
                <select name="sexo" id="sexo" required class="form-control" style="width: 180px;">
                    <option value="">Seleccione el Sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
        <br>
        <div class="form-group">
        </div>
        <div class="form-group">
            <input type="text" name="direccion" class="form-control" required placeholder="Dirección">
        </div>
        <?php include("../../includes/barra.php"); ?>
        <br>
        <div class="form-group">
            <input type="text" name="login" class="form-control" required placeholder="Nombre de usuario">
        </div>
        <br>
        <div class="form-group">
            <input type="password" name="password" class="form-control" required placeholder="Contraseña">
        </div>
        <br>
        <div class="form-group">
            <input type="password" name="confirmpassword" class="form-control" required placeholder="Confirmar contraseña">
        </div>
        <br>
        <div class="form-group">
        </div>
        <br>
        <div class="form-group">
            <div class="d-grid gap-2 col-4 mx-auto">
                <input type="submit" value="Registrarse" name="save" class="btn btn-primary">
                <br><br>
                <a href="login.php" class="btn btn-primary">Ingresar</a>
            </div>
        </div>
    </form>
</div>
</div>
<?php include ("../../Vista/Layouts/footer.php");?>