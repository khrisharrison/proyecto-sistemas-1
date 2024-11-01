<?php
include ('../../database/conexion.php');//incluir base de datos
$Nombre='';
$Tipo='';
$Estado='';
$Municipio='';
$Parroquia='';
$Ciudad='';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM CEMENTERIO WHERE RIF_CEMENTERIO=$id";
    $querys = "SELECT * FROM ENTIDAD_JURIDICA WHERE RIF=$id";
    $result = mysqli_query($mysqli, $query);
    $resultado = mysqli_query($mysqli, $querys);
    if (mysqli_num_rows($result) == 1) { //Muestra lo que tiene la cementerio
        $row = mysqli_fetch_array($result);
        $Rif= $row['RIF_cementerio'];
        $Tipo= $row['TIPO']; 
    }
    if (mysqli_num_rows($resultado) == 1) {//muestra todo de entidad juridica
        $row = mysqli_fetch_array($resultado);
        $Rif = $row['RIF'];
        $Nombre= $row['NOMBRE'];
        $Ciudad= $row['Cod_ciudad_Ju'];
    }
}
if (isset($_POST['update'])){
    $Rif= $_GET['id'];
    $Nombre = $_POST['NOMBRE'];
    $Tipo = $_POST['TIPO'];
    $Ciudad = $_POST['ciudad'];
    
    $query = "UPDATE CEMENTERIO SET RIF_CEMENTERIO = '$Rif', TIPO = '$Tipo' WHERE RIF_CEMENTERIO = $Rif";
    $querys = "UPDATE ENTIDAD_JURIDICA set NOMBRE = '$Nombre', Cod_ciudad_Ju = '$Ciudad', WHERE RIF=$Rif";
    mysqli_query($mysqli, $query);
    mysqli_query($mysqli, $querys);
    if(!$result){
        echo
        "<script>
        alert('Error. Verifique de nuevo');
        window.location.href = 'cementerio.php';
        </script>";
    }
    if(!$resultado){
        echo
        "<script>
        alert('Error. Verifique de nuevo');
        window.location.href = 'cementerio.php';
        </script>";
    }
    echo
    "<script>
    alert('Se modifico con Exito. ');
    window.location.href = 'cementerio.php';
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
<p class="h7">Rif:</p>
<input name="RIF" type="number" class="form-control" class="display-1"  value="<?php echo $Rif; ?>" placeholder="remplace RIF" aria-label="Disabled input example" disabled>
</div><br>
<div class="form-group">
<p class="h7">Nombre:</p>
<input name="NOMBRE" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="remplace NOMBRE" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
</div><br>
<div class="form-group">
<p class="h7">Tipo:</p>
<input name="TIPO" type="text" class="form-control" value="<?php echo $Tipo; ?>" placeholder="remplace TIPO" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                  

                </div>
                <?php $cedula = $Rif; ?>
                <?php include("../../includes/barrallenaj.php"); ?>
                    <div class="text-center">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px" type="button"></button>
                    </div>

</form>
            </div>
        </div>
    </div>
</div>

<?php include ("../../Vista/Layouts/footer.php");