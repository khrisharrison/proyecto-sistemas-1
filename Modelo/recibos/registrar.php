<?php include ('../../database/conexion.php');


include("../../Vista/Layouts/munuusuario/layout.php");
?>
<div class="container p-4">
    <div class="row">
    <div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <h1 class="mt-4 mb-4">REGISTRAR RECIBO DE PAGO</h1>
            <div class="card card-body"><!--formulario de preguntas-->
            <form action="">
                    <div class="form-group"><!---->
                        <p class="h7">Numero de Póliza:</p>
                        <input type="number" min="0" name="NUMERO_POLIZA" class="form-control" placeholder="Ingrese el numero de Póliza" required onkeypress="return valideKey(event);"onblur="limpia()" >
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
                        </div>
                </form>
                <form id="miFormulario" action="save.php" method="POST">
                    <?php
                        if(isset($_GET['NUMERO_POLIZA'])){
                            $NUMERO_POLIZA=$_GET['NUMERO_POLIZA'];
                            $sql = "SELECT * FROM POLIZA WHERE NUMERO_POLIZA='$NUMERO_POLIZA'";
                            $resultado = $mysqli->query($sql);
                            //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
                            if($row = $resultado->fetch_assoc()){
                                
                                ?>

                                <div class="form-group"><!---->
                                    <p class="h7">Numero de poliza:</p>
                                    <input type="text" name="NUMERO_POLIZA" value="<?php echo $row['NUMERO_POLIZA']; $cedula2 = $row['NUMERO_POLIZA'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Fecha de apertura: </p>
                                    <input type="date" name="FECHA_APERTURA"  value="<?php echo $row['FECHA_APERTURA']; $var = $row['FECHA_APERTURA'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Fecha de cierre: </p>
                                    <input type="date" name="FECHA_CIERRE" value="<?php echo $row['FECHA_CIERRE']; $var = $row['FECHA_CIERRE'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Cuota mensual ($):</p>
                                    <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_MENSUAL" value="<?php echo $row['CUOTA_MENSUAL']; $var = $row['CUOTA_MENSUAL'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Cuota anual ($):</p>
                                    <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_ANUAL" value="<?php echo $row['CUOTA_ANUAL']; $var = $row['CUOTA_ANUAL'];?>" class="form-control" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                                    <input type="hidden" name="STATUS" value="<?php echo $row['Status']; $var = $row['Status'];?>" readonly>
                                
                                </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Monto de la poliza: ($)</p>
                                    <input type="number" min="0" max="99999999.99" step="0.01" name="CUOTA_MENSUAL" value="<?php echo $row['Monto']; $var = $row['Monto'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly><br>
                     <div class="form-group">
                        <div>Status de la poliza:
                    <select name="STATUS" id="STATUS" disabled>
                        <option value="">Elija una opcion</option>
                        <option value="ACTIVO"<?php if ($row['Status'] === 'ACTIVO') { echo ' selected'; } ?>>ACTIVO</option>
                        <option value="INACTIVO"<?php if ($row['Status'] === 'INACTIVO') { echo ' selected'; } ?>>INACTIVO</option>
                    </select>
                    </div><br>
                                <div class="form-group"><!---->
                                    <p class="h7">Observaciones: </p>
                                    <textarea type="text" cols="30" rows="5" name="OBSERVACIONES" class="form-control" placeholder="" required readonly><?php echo $row['OBSERVACIONES']; ?></textarea>

                                </div>
                                
                     </form>
                     <?php $NUMERO_POLIZA=$_GET['NUMERO_POLIZA'];?>

    

                
    <div class="form-group"><!---->
        <p class="h7">Numero de poliza:</p>
        <input type="number" id="numero" min="0" max="99999999.99" name="numero" class="form-control" placeholder="Ingrese el numero de poliza" required>
    </div><br>
    <div class="form-group">
        <p class="h7">Fecha de Pago: </p>
        <input type="date" id="fecha" style="width: 150px;" name="fecha"class="form-control" required  placeholder="Ingrese la fecha de pago" id="miInput">
    </div><br>
    
    
    <div class="form-group">
        <p class="h7">Monto Pagado ($):</p>
        <input type="number" min="0" id="monto" max="99999999.99" step="0.01" name="monto" class="form-control" required placeholder="Ingrese el monto pagado" required ><br>

    </div><br>
    <div class="text-center">
        <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm" name="save"> 
    </div>            
</form>

                        <?php } else { echo "<script> alert('La póliza no se encuentra registrada'); </script>";?>
                            

                            <div class="text-center">
                                <a href="recibo.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
                                </div>
                
<?php } }?>
                            
                
            </div>
        </div>
    </div>
</div>

<?php include ("../../Vista/Layouts/footer.php");
