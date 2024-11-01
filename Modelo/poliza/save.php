<?php include ('../../database/conexion.php');

if(isset($_POST['save'])){
    //persona
    $NUMERO_POLIZA = $_POST['NUMERO_POLIZA'];//$codigo = $_POST['codigo'] number
    $FECHA_APERTURA = $_POST['FECHA_APERTURA'];
    $FECHA_CIERRE = $_POST['FECHA_CIERRE'];
    $CUOTA_ANUAL = $_POST['CUOTA_ANUAL'];
    $CUOTA_MENSUAL = $_POST['CUOTA_MENSUAL'];
    $OBSERVACIONES = $_POST['OBSERVACIONES'];

        $query = "INSERT INTO POLIZA (NUMERO_POLIZA, FECHA_APERTURA, FECHA_CIERRE, CUOTA_ANUAL, CUOTA_MENSUAL, OBSERVACIONES) VALUES ('$NUMERO_POLIZA', '$FECHA_APERTURA', '$FECHA_CIERRE', '$CUOTA_ANUAL', '$CUOTA_MENSUAL', '$OBSERVACIONES')";

        $result=mysqli_query($mysqli,$query);

    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
        echo
        "<script> alert('Error verifique de nuevo'); </script>";
    }

header("Location: save.php?NP=" . urlencode($NUMERO_POLIZA));
exit;
    exit; //aqui se cambiara por la zona de la segunda lista

    echo
    "<script> alert('Exitosa'); </script>";
}
include("../../Vista/Layouts/munuusuario/layout.php");


$NUMERO_POLIZA = $_GET['NP'];

?>

<div class="container p-4">
    <div class="row">
    <div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
 
            <h1 class="mt-4 mb-4">REGISTRAR POLIZA</h1>

                <form id="miFormulario" action="registrar.php" method="POST">
                    <div class="card card-body"><!--formulario de preguntas-->
                        <div class="form-group"><!---->

                            <div class="form-group"><!---->
                                <p class="h7">Numero de poliza</p>
                                <input type="number" min="0" max="99999999.99" name="NUMERO_POLIZA" value="<?php echo "$NUMERO_POLIZA"; $cedula3 = $NUMERO_POLIZA?>" class="form-control" placeholder="Ingrese el numero de poliza" requiredonkeypress="return soloLetras(event)"readonly >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Fecha de apertura </p>
                                <input type="date" style="width: 150px;" name="FECHA_APERTURA"class="form-control" required  placeholder="Ingrese la fecha de apertura" id="miInput">
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Fecha de cierre </p>
                                <input type="date" style="width: 150px;" name="FECHA_CIERRE" class="form-control" placeholder="Ingrese la fecha de cierre">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Cuota mensual </p>
                                <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_MENSUAL" class="form-control" required placeholder="Ingrese la cuota mensual" required onkeypress=onblur="limpia()" >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Cuota anual </p>
                                <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_ANUAL" class="form-control" required placeholder="Ingrese su correo electronico" required onkeypress=onblur="limpia()">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Observaciones </p>
                                <textarea type="text" cols="30" rows="5" name="OBSERVACIONES" class="form-control" placeholder="Ingrese las Observaciones" required></textarea>
                             </div><br>
                        <div class="text-center">
                            <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm" name="save">
                        </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("../../Vista/Layouts/footer.php");
