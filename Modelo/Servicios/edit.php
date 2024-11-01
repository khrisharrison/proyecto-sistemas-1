<?php
include ('../../database/conexion.php');//incluir base de datos
$codigo='';
$descrip='';
$monto='';
//$ciudad='';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM servicio_funerario WHERE CODIGO_SERVICIO=$id";
        $result = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($result) == 1) { //Muestra lo que tiene servicios
            $row = mysqli_fetch_array($result);
            $codigo = $row['CODIGO_SERVICIO'];
            $descrip = $row['DESCRIPCION'];
            $monto = $row['MONTO'];
        }
    }
    if (isset($_POST['update'])){
        $codigo= $_GET['id'];
        $descrip = $_POST['descrip'];
        $monto = $_POST['monto'];

            $query = "UPDATE servicio_funerario set DESCRIPCION = '$descrip', MONTO = '$monto' WHERE CODIGO_SERVICIO = $codigo";
            mysqli_query($mysqli, $query);
            if(!$result){
                    echo
                    "<script>
                      alert('Error verifique de nuevo');
                      window.location.href = 'servicios.php';
                    </script>";
            }
              echo
                "<script>
                  alert('Se modifico con Exito. ');
                  window.location.href = 'servicios.php';
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
                        <p class="h7">Codigo:</p>
                        <input name="codigo" type="text" class="form-control" class="display-1"  value="<?php echo $codigo; ?>" placeholder="reemplace codigo" aria-label="Disabled input example" disabled>
                    </div><br>
                    <div class="form-group">
                            <p class="h7">Tipo:</p>
                            <input name="descrip" type="text" class="form-control" value="<?php echo $descrip; ?>" placeholder="reemplace descripcion" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput">
                    </div><br>
                    <script>
                    function soloNumeros(evt){
                        var code = (evt.which) ? evt.which : evt.keyCode;
		                if(code==8) { // retroceso
			                return true;
			            } else if(code>=48 && code<=57) { // es un numero
			                return true;
			            } else{ // otras teclas
			                return false;
			            }
                    }
                     </script>
                    <div class="form-group">
                        <p class="h7">Monto:</p>
                        <input name="monto" type="text" class="form-control" value="<?php echo $monto; ?>" placeholder="reemplace monto" required  onkeypress="return soloNumeros(event);" onblur="limpia()" id="miInput"/>
                    </div><br>
                    
                    <br>
                    <?php //include("../../includes/barrallenaj.php"); ?>
                    <div class="text-center">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px" type="button"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("../../Vista/Layouts/footer.php");