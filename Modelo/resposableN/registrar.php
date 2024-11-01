<?php include ('../../database/conexion.php');

if(isset($_POST['save'])){
//persona
$cedula = $_POST['cedula'];//$codigo = $_POST['codigo']
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$query = "INSERT INTO persona (CEDULA, NOMBRE, APELLIDO, TELEFONO, CORREO, SEXO, DIRECCION, Cod_ciudad) VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$correo', '$sexo', '$direccion', '$ciudad')";
$querys = "INSERT INTO responsable_natural (CEDULA_natural) VALUES ('$cedula')";
$result=mysqli_query($mysqli,$query);
$resultado = mysqli_query($mysqli,$querys);
//si no nos devuelve un resultado nos cierra el programa
if(!$result){
echo
"<script> alert('Error verifique de nuevo'); </script>";
}
if(!$resultado){
echo
"<script> alert('Error verifique de nuevo'); </script>";
}
header("Location: responsable.php");

//con esto creamos un mensaje que se mostrara en pantalla cuando se guarde de manera exitosa
$_SESSION['message'] = "Tarea guardada satisfactoriamente";
$_SESSION['message_type'] = 'success';//esto es un color
echo
"<script> alert('Exitosa'); </script>";
}
include("../../Vista/Layouts/munuusuario/layout.php");
?>

<div class="container p-4">
<div class="row">
<div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php session_unset(); }?>
<h1 class="mt-4 mb-4">Responsable Natural</h1>
<div class="card card-body"><!--formulario de preguntas-->
    <form action="registrar.php">
        <div class="form-group"><!---->
            <p class="h7">Cédula:</p>
            <input type="number" min="0" name="cedula" class="form-control" placeholder="Ingrese cédula de usuario" required onkeypress="return valideKey(event);"onblur="limpia()" >
            <div class="text-center">
            <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
            </div>
    </form>
    <form id="miFormulario" action="save.php" method="POST">
        <?php
            if(isset($_GET['cedula'])){
                $cedula=$_GET['cedula'];
                $sql = "SELECT * FROM responsable_natural WHERE CEDULA_natural='$cedula'";
                $resultado = $mysqli->query($sql);
                $sqls = "SELECT * FROM persona WHERE CEDULA='$cedula'";
                $resultados = $mysqli->query($sqls);

$consulta = "SELECT * FROM estado
JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
JOIN ciudad ON parroquia.CODIGO_PARROQUIA = ciudad.CODIGO_PARROQUIA
JOIN persona ON ciudad.CODIGO_CIUDAD = persona.Cod_ciudad
WHERE persona.CEDULA = $cedula"; // Agregar la cláusula WHERE
$resultado1 = $mysqli->query($consulta);
$row1 = $resultado1->fetch_assoc();
                //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
                if($row = $resultado->fetch_assoc()){
                    echo "<script> alert('El usuario ya se encuentra registrado'); </script>";?>

                    <div class="form-group"><!---->
                        <p class="h7">Cedula </p>
                        <input type="text" name="cedula" value="<?php echo $row['CEDULA_natural']; $cedula2 = $row['CEDULA_natural'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group"><!---->
                        <p class="h7">Nombre </p>
                        <input type="text" name="nombre" value="<?php echo $row1['NOMBRE']; $var = $row1['NOMBRE'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group"><!---->
                        <p class="h7">Apellido </p>
                        <input type="text" name="apellido" value="<?php echo $row1['APELLIDO']; $var = $row1['APELLIDO'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group"><!---->
                        <p class="h7">Telefono </p>
                        <input type="text" name="telefono" value="<?php echo $row1['TELEFONO']; $var = $row1['TELEFONO'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group"><!---->
                        <p class="h7">Correo </p>
                        <input type="text" name="correo" value="<?php echo $row1['CORREO']; $var = $row1['CORREO'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group"><!---->
                        <p class="h7">Sexo </p>
                        <input type="text" name="sexo" value="<?php echo $row1['SEXO'] == "M" ? "Masculino" : "Femenino"; $var = $row1['SEXO'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <div class="form-group"><!---->
                        <p class="h7">Direccion </p>
                        <input type="text" name="direccion" value="<?php echo $row1['DIRECCION']; $var = $row1['DIRECCION'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                    </div><br>
                    <table class="table table-bordered table-striped" width="25%" border="0" align="center">
                    <tr>
                      <td>
            <table class="table table-bordered table-striped" width="25%" border="0" align="center">
                  <tr>
                    <td>
                 <label for="estado">Estado:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_ESTADO']; ?></option>
          </select>
          <br>
        </td>
        <td>
                 <label for="municipio">Municipio:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_MUNICIPIO']; ?></option>
          </select>
          <br>
        </td>
        <td>
                 <label for="parroquia">Parroquia:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_PARROQUIA']; ?></option>
          </select>
          <br>
        </td>
        <td>
                 <label for="ciudad">Ciudad:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_CIUDAD']; ?></option>
          </select>
          <br>
        </td>
        </tr>
            </table>
                    <br>
                   </tr>
                    </table>
                    <div class="text-center">
                    <a href="responsable.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
                    </div>

            <?php }elseif($row = $resultados->fetch_assoc()){
                 //----------SEGUNDA VALIDACION PARA SABER SI ES UNA PERSONA------------
                echo "<script> alert('La persona ya se encuentra registrada'); </script>";?>
                <div class="form-group"><!---->
                    <p class="h7">Cedula: </p>
                    <input type="number" min="0" name="cedula" value="<?php echo $row['CEDULA']; $cedula2 = $row['CEDULA'];?>" class="form-control" placeholder="Ingrese cedula" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                </div><br>
                <div class="form-group"><!---->
                    <p class="h7">Nombre</p>
                    <input type="text" name="nombre" value="<?php echo $row['NOMBRE']; $nombre2 = $row['NOMBRE'];?>" class="form-control" placeholder="Ingrese Nombre" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>
                </div><br>
                <div class="form-group"><!---->
                    <p class="h7">Apellido</p>
                    <input type="text" name="apellido" value="<?php echo $row['APELLIDO']; $apellido2 = $row['APELLIDO'];?>" class="form-control" placeholder="Ingrese apellido" required onkeypress=" return valideKey(event);"onblur="limpia()"  readonly>
                </div><br>
                <div class="form-group">
                    <p class="h7">Telefono</p>
                    <input type="number" min="0" name="telefono" value="<?php echo $row['TELEFONO']; $telf = $row['TELEFONO'];?>" class="form-control" required onkeypress="return valideKey(event);"onblur="limpia()" placeholder="Ingrese su numero de Telefono" readonly>
                </div><br>
                <div class="form-group">
                    <p class="h7">Correo</p>
                    <input type="email" name="correo" value="<?php echo $row['CORREO']; $corr = $row['CORREO'];?>" class="form-control" required  placeholder="Ingrese su correo electronico" readonly>
                </div><br>
                <div class="form-group">
                    <p class="h7">Dirección</p>
                    <input type="text" name="direccion" value="<?php echo $row['DIRECCION']; $dir = $row['DIRECCION'];?>" class="form-control" required placeholder="Ingrese su numero de Telefono" readonly>
                </div><br>
                    <p class="h7">Sexo</p>
            <select name="sexo" id="sexo" disabled class="form-control" style="width: 180px;">
                <option value="">Seleccione sexo</option>
                <option value="M"<?php if ($row['SEXO'] === 'M') { echo ' selected'; } ?>>Masculino</option>
                <option value="F"<?php if ($row['SEXO'] === 'F') { echo ' selected'; } ?>>Femenino</option>
            </select>
                <input type="hidden" name="sexo" value="<?php echo $row['SEXO']; $dir = $row['SEXO'];?>" class="form-control" required placeholder="Ingrese su numero de Telefono" readonly>
                <div class="form-group">
                </div><br>
            <table class="table table-bordered table-striped" width="25%" border="0" align="center">
                  <tr>
                    <td>
                 <label for="estado">Estado:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_ESTADO']; ?></option>
          </select>
          <br>
        </td>
        <td>
                 <label for="municipio">Municipio:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_MUNICIPIO']; ?></option>
          </select>
          <br>
        </td>
        <td>
                 <label for="parroquia">Parroquia:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_PARROQUIA']; ?></option>
          </select>
          <br>
        </td>
        <td>
                 <label for="ciudad">Ciudad:</label>
              <select name="estado" id="estado" class="form-control" disabled>
            <option value=""><?php echo $row1['NOMBRE_CIUDAD']; ?></option>
          </select>
          <br>
        </td>
        </tr>
            </table>
        <br>
            <div class="text-center">
                <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm" name="save">
                </div>
            <?php } else { $cedula=$_GET['cedula'];?>
                <div class="form-group"><!---->
                    <p class="h7">Cédula: </p>
                    <input type="number" min="0" name="cedula" value="<?php echo "$cedula"; $cedula3 = $cedula?>" class="form-control" placeholder="Ingrese cédula" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                </div><br>
                <div class="form-group">
                    <p class="h7">Nombre</p>
                    <input type="text" name="nombre"class="form-control" required  placeholder="Ingrese su primer nombre" onkeypress="return soloLetras(event)"  id="miInput">
                </div><br>
                <div class="form-group"><!---->
                    <p class="h7">Apellido</p>
                    <input type="text" name="apellido" class="form-control" placeholder="Ingrese su Apellido">
                </div><br>
                <div class="form-group">
                    <p class="h7">Telefono</p>
                    <input type="number" min="0" name="telefono" class="form-control" required placeholder="Ingrese su numero de Telefono" required onkeypress="return valideKey(event);"onblur="limpia()" >
                </div><br>
                <div class="form-group">
                    <p class="h7">Correo</p>
                    <input type="email" name="correo" class="form-control" required placeholder="Ingrese su correo electronico">
                </div><br>
                <div class="form-group">
                    <p class="h7">Dirección</p>
                    <input type="text" name="direccion" class="form-control" required placeholder="Ingrese su Dirección">
                </div><br>
                <div class="form-group" >
                    <div>Seleccione  :
                    <select name="sexo" id="sexo" required class="form-control" style="width: 180px;">
                        <option value="">Seleccione sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select></div>
                </div><br>
<?php include ("../../includes/barra.php"); ?>
            <div class="text-center">
                <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm" name="save">
            </div>
                </div>
                <?php } }?>
    </form>
</div>
</div>
</div>
</div>
<?php include ("../../Vista/Layouts/footer.php");