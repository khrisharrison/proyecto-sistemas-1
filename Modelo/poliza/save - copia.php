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

    header("Location: save.php"); //aqui se cambiara por la zona de la segunda lista

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
            <h1 class="mt-4 mb-4">REGISTRAR POLIZA</h1>
            <div class="card card-body"><!--formulario de preguntas-->
                <form action="registrar.php">
                    <div class="form-group"><!---->
                        <p class="h7">Numero de Póliza</p>
                        <input type="number" min="0" name="NUMERO_POLIZA" class="form-control" placeholder="Ingrese el numero de Póliza" required onkeypress="return valideKey(event);"onblur="limpia()" >
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
                        </div>
                </form>
                <form id="miFormulario" action="registrar.php" method="POST">
                    <?php
                        if(isset($_GET['NUMERO_POLIZA'])){
                            $NUMERO_POLIZA=$_GET['NUMERO_POLIZA'];
                            $sql = "SELECT * FROM POLIZA WHERE NUMERO_POLIZA='$NUMERO_POLIZA'";
                            $resultado = $mysqli->query($sql);
                            //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
                            if($row = $resultado->fetch_assoc()){
                                echo "<script> alert('La póliza ya se encuentra registrada'); </script>";?>

                                <div class="form-group"><!---->
                                    <p class="h7">Numero de poliza</p>
                                    <input type="text" name="NUMERO_POLIZA" value="<?php echo $row['NUMERO_POLIZA']; $cedula2 = $row['NUMERO_POLIZA'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Fecha de apertura </p>
                                    <input type="date" name="FECHA_APERTURA"  value="<?php echo $row['FECHA_APERTURA']; $var = $row['FECHA_APERTURA'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Fecha de cierre </p>
                                    <input type="date" name="FECHA_CIERRE" value="<?php echo $row['FECHA_CIERRE']; $var = $row['FECHA_CIERRE'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Cuota mensual </p>
                                    <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_MENSUAL" value="<?php echo $row['CUOTA_MENSUAL']; $var = $row['CUOTA_MENSUAL'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Cuota anual </p>
                                    <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_ANUAL" value="<?php echo $row['CUOTA_ANUAL']; $var = $row['CUOTA_ANUAL'];?>" class="form-control" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Observaciones </p>
                                    <textarea type="text" cols="30" rows="5" name="OBSERVACIONES" class="form-control" placeholder="" required readonly><?php echo $row['OBSERVACIONES']; ?></textarea>

                                </div>
                                </table>
                                <div class="text-center">
                                <a href="poliza.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
                                </div>

                    
                        <?php } else { $NUMERO_POLIZA=$_GET['NUMERO_POLIZA'];?>
                            <div class="form-group"><!---->
                                <p class="h7">Numero de poliza</p>
                                <input type="number" min="0" max="99999999.99" name="NUMERO_POLIZA" value="<?php echo "$NUMERO_POLIZA"; $cedula3 = $NUMERO_POLIZA?>" class="form-control" placeholder="Ingrese el numero de poliza" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
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
                            <?php } }?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("../../Vista/Layouts/footer.php");
