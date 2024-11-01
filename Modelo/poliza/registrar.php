<?php include ('../../database/conexion.php');


include("../../Vista/Layouts/munuusuario/layout.php");
?>
<div class="container p-4">
    <div class="row">
    <div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
            <h1 class="mt-4 mb-4">REGISTRAR POLIZA</h1>
            <div class="card card-body"><!--formulario de preguntas-->
                <form action="">
                    <div class="form-group"><!---->
                        <p class="h7">Numero de Póliza:</p>
                        <input type="number" min="0" name="NUMERO_POLIZA" class="form-control" placeholder="Ingrese el numero de Póliza" required onkeypress="return valideKey(event);"onblur="limpia()" >
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
                        </div>
                </form>
                <form id="miFormulario" method="POST">
                    <?php
                        if(isset($_GET['NUMERO_POLIZA'])){
                            $NUMERO_POLIZA=$_GET['NUMERO_POLIZA'];
                            $sql = "SELECT * FROM POLIZA WHERE NUMERO_POLIZA='$NUMERO_POLIZA'";
                            $resultado = $mysqli->query($sql);
                            //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
                            if($row = $resultado->fetch_assoc()){
                                echo "<script> alert('La póliza ya se encuentra registrada'); </script>";?>

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
                                </table>
                                <div class="text-center">
                                <a href="poliza.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
                                </div>
        </form>
                    
                        <?php } else { $NUMERO_POLIZA=$_GET['NUMERO_POLIZA'];?>

</form>
<form id="my-form">
                            <div class="form-group"><!---->
                                <p class="h7">Numero de poliza:</p>
                                <input type="number" id="numero" min="0" max="99999999.99" name="numero" value="<?php echo "$NUMERO_POLIZA"; $cedula3 = $NUMERO_POLIZA?>" class="form-control" placeholder="Ingrese el numero de poliza" required>
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Fecha de apertura: </p>
                                <input type="date" id="fechaA" style="width: 150px;" name="fechaA"class="form-control" required  placeholder="Ingrese la fecha de apertura" id="miInput">
                            </div><br>
                            <div class="form-group"><!---->
                                <p class="h7">Fecha de cierre: </p>
                                <input type="date" id="fechaC" style="width: 150px;" name="fechaC" class="form-control" placeholder="Ingrese la fecha de cierre">
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Cuota mensual ($):</p>
                                <input type="number" id="cuotaM" min="0" max="99999999.99" step="0.01" name="cuotaM" class="form-control" required placeholder="Ingrese la cuota mensual" required >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Cuota anual ($):</p>
                                <input type="number" id="cuotaA" min="0" max="99999999.99" step="0.01" name="cuotaA" class="form-control" required placeholder="Ingrese su correo electronico" required >
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Monto de la poliza ($):</p>
                                <input type="number" min="0" id="monto" max="99999999.99" step="0.01" name="monto" class="form-control" required placeholder="Ingrese el monto" required ><br>
                Status de la poliza:
                <select name="STATUS" id="STATUS" required class="form-control" style="width: 180px;">
                    <option value="">Elija una opcion</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>
                            </div><br>
                            <div class="form-group">
                                <p class="h7">Observaciones: </p>
                                <textarea type="text" id="observaciones" cols="30" rows="5" name="observaciones" class="form-control" placeholder="Ingrese las Observaciones" required></textarea>
                             </div><br>
                        <div class="text-center">
                            <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm">
                        </div>
                            </div><br><br>
                            <h1 class="mt-4 mb-4">Listas de Registros</h1>
</form>
    <script>
        var numero = <?php echo isset($NUMERO_POLIZA) ? $NUMERO_POLIZA : "''"; ?>; //cambiar cuando este listo todo
    </script>
        <br>
      <form id="form2" method="POST" disabled>

     <div class="form-group">
        <p style="font-size: 25px;">Lista de Beneficiario </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar5" placeholder="Ingrese la cédula" class="form-control">
    <button id="save-button5" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="searchResults5"></div>
    </div><br>
    <table id="person5" class="table table-striped">
        <thead class="thead-dark">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update5">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>


     <div class="form-group">
        <p style="font-size: 25px;">Responsable Naturales </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar1" placeholder="Ingrese la cédula" class="form-control">
    <button id="save-button1" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="searchResults1"></div>
    </div><br>
    <table id="person1" class="table table-striped">
        <thead class="thead-dark">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update1">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>

     <div class="form-group">
        <p style="font-size: 25px;">Responsable Juridico </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar2" placeholder="Ingrese el Rif" class="form-control">
    <button id="save-button2" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="searchResults2"></div>
    </div><br>
    <table id="person2" class="table table-striped">
        <thead class="thead-dark">
                <th>Nombre</th>
                <th>Rif</th>
                <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update2">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>


     <div class="form-group">
        <p style="font-size: 25px;">Lista de Cementerios </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar" placeholder="Ingrese el Rif" class="form-control">
    <button id="save-button" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="search-results"></div>
    </div><br>
    <table id="person-table" class="table table-striped">
        <thead class="thead-dark">
            <th>Nombre</th>
            <th>Rif</th>
            <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update-button">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>

     <div class="form-group">
        <p style="font-size: 25px;">Lista de Funerarias </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar3" placeholder="Ingrese el Rif" class="form-control">
    <button id="save-button3" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="searchResults3"></div>
    </div><br>
    <table id="person3" class="table table-striped">
        <thead class="thead-dark">
                <th>Nombre</th>
                <th>Rif</th>
                <th>Codigo de servicio</th>
                <th>Tipo</th>
            <th><button type="button" class="btn btn-success container" id="update3">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>

     <div class="form-group">
        <p style="font-size: 25px;">Lista de Servicios </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar4" placeholder="Ingrese el Codigo del servicio" class="form-control">
    <button id="save-button4" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="searchResults4"></div>
    </div><br>
    <table id="person4" class="table table-striped">
        <thead class="thead-dark">
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update4">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>

                                <div class="text-center">
                                <a href="poliza.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
                                </div>
         </form>
                            <?php } }?>
                
            </div>
        </div>
    </div>
</div>
<script src="save.js"></script>
<script src="cementerio/script.js"></script>
<script src="natural/script.js"></script>
<script src="beneficiario/script.js"></script>
<script src="juridica/script.js"></script>
<script src="funeraria/script.js"></script>
<script src="servicio/script.js"></script>
<script src="codigo.js"></script>
<?php include ("../../Vista/Layouts/footer.php");
