<?php include ('../../database/conexion.php');

if(isset($_POST['save'])){
//persona
$codigo = $_POST['codigo'];//$codigo = $_POST['codigo']
$descrip = $_POST['descrip'];
$monto = $_POST['monto'];

$query = "INSERT INTO servicio_funerario (CODIGO_SERVICIO, DESCRIPCION, MONTO) VALUES ('$codigo', '$descrip', '$monto')";

$result=mysqli_query($mysqli,$query);

//si no nos devuelve un resultado nos cierra el programa
if(!$result){
echo
"<script> alert('Error verifique de nuevo'); </script>";
}
header("Location: servicios.php");
echo
"<script> alert('Exitosa'); </script>";
}
include("../../Vista/Layouts/munuusuario/layout.php");
?>

<div class="container p-4">
<div class="row">
<div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
<?php if (isset($_SESSION['message'])) { ?>
</div>
<?php session_unset(); }?>
<h1 class="mt-4 mb-4">REGISTRAR SERVICIO FUNERARIO</h1>
<div class="card card-body"><!--formulario de preguntas-->
    <form action="registrar.php">
        <div class="form-group"><!---->
            <p class="h7">Codigo del Servicio</p>
            <input type="number" name="codigo" class="form-control" placeholder="Ingrese Codigo del Servicio" required onkeypress="return valideKey(event);"onblur="limpia()" >
            <div class="text-center">
            <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
            </div>
    </form>
    <form id="miFormulario" action="save.php" method="POST">
        <?php
            if(isset($_GET['codigo'])){
                $codigo=$_GET['codigo'];
                $sql = "SELECT * FROM servicio_funerario WHERE CODIGO_SERVICIO='$codigo'";
                $resultado = $mysqli->query($sql);
    
    //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
    if($row = $resultado->fetch_assoc()){
        echo "<script> alert('Ya existe un servicio con el codigo ingresado'); </script>";?>

        <div class="form-group"><!---->
            <p class="h7">Codigo</p>
            <input type="text" name="codigo" value="<?php echo $row['CODIGO_SERVICIO']; $codigo2 = $row['CODIGO_SERVICIO'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
        </div><br>
        <div class="form-group"><!---->
            <p class="h7">Tipo </p>
            <input type="text" name="descrip" value="<?php echo $row['DESCRIPCION']; $var = $row['DESCRIPCION'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
        </div><br>
        <div class="form-group"><!---->
            <p class="h7">Monto </p>
            <input type="text" name="monto" value="<?php echo $row['MONTO']; $var = $row['MONTO'];?>" class="form-control" placeholder="" required onblur="limpia()" readonly>
        </div><br>

        <div class="text-center">
        <a href="servicios.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
        </div>

    <?php } else { $codigo=$_GET['codigo'];?>
        <div class="form-group"><!---->
            <p class="h7">Codigo</p>
            <input type="number" name="codigo" value="<?php echo "$codigo"; $codigo3 = $codigo?>" class="form-control" placeholder="Ingrese Codigo" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
        </div><br>
        <div class="form-group">
            <p class="h7">Tipo</p>
            <input type="text" name="descrip"class="form-control" required  placeholder="Ingrese descripcion" onkeypress="return soloLetras(event)"  id="miInput">
        </div><br>
        <script>
            function soloNumeros(evt){
               var code = (evt.which) ? evt.which : evt.keyCode;
	            if(code==8 || code==46) { // retroceso y ,
		            return true;
		       } else if(code>=48 && code<=57) { // es un numero
		            return true;
	            } else{ // otras teclas
	                return false;
	            }
            }
         </script>
        <div class="form-group"><!---->
            <p class="h7">Monto ($)</p>
            <input type="text" name="monto" class="form-control" placeholder="Ingrese monto" required  onkeypress="return soloNumeros(event);" onblur="limpia()" id="miInput"/>
        </div><br>
<?php //include ("../../includes/barra.php"); ?>
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
