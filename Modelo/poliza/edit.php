<?php
include ('../../database/conexion.php');//incluir base de datos


$numero= $_GET['id'];
$query = "SELECT * FROM POLIZA WHERE NUMERO_POLIZA=$numero";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);

?>

<?php include("../../Vista/Layouts/munuusuario/layout.php");?>
<div class="container p-4">
    <div class="row">
    <div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;">  
            <div class="card card-body">
                <h1 class="mt-4 mb-4">Modificar</h1>
  <form id="formulario1">
                <div class="form-group">
                        <p class="h7">Número de Póliza:</p>
                        <input name="numero" id="numero" type="number" class="form-control" class="display-1"  value="<?php echo $row['NUMERO_POLIZA']; ?>" placeholder="remplace cédula" aria-label="Disabled input example" disabled>
                        <input name="numero" id="numero" type="hidden" value="<?php echo $row['NUMERO_POLIZA']; ?>">
                    </div><br> 
                    <div class="form-group">
                            <p class="h7">Fecha de apertura: </p>
                            <input name="fechaA" id="fechaA" style="width: 150px;" type="date" class="form-control" value="<?php echo $row['FECHA_APERTURA']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Fecha de cierre: </p>
                        <input name="fechaC" id="fechaC" style="width: 150px;" type="date" class="form-control" value="<?php echo $row['FECHA_CIERRE'];?>" required>
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Cuota mensual ($):</p>
                        <input name="cuotaM" id="cuotaM" type="number" min="0" class="form-control" value="<?php echo $row['CUOTA_MENSUAL']; ?>" placeholder="remplace la cuota mensual" required  onkeypress="return valideKey(event);" onblur="limpia()">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Cuota anual ($):</p>
                        <input name="cuotaA" type="number" class="form-control" value="<?php echo $row['CUOTA_ANUAL']; ?>" placeholder="remplace la cuota anual" required onkeypress="return valideKey(event);" onblur="limpia()" id="cuotaA">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Monto de la poliza ($):</p>
                        <input name="monto" type="number" class="form-control" value="<?php echo $row['Monto']; ?>" placeholder="remplace el monto de la poliza" required  onkeypress="return valideKey(event);" id="monto">
                        <br><br>
                Status de la poliza:
                <select name="STATUS" id="STATUS" required class="form-control" style="width: 180px;">
                    <option value="">Elija una opcion</option>
                    <option value="ACTIVO"<?php if ($row['Status'] === 'ACTIVO') { echo ' selected'; } ?>>ACTIVO</option>
                    <option value="INACTIVO"<?php if ($row['Status'] === 'INACTIVO') { echo ' selected'; } ?>>INACTIVO</option>
                </select>
                            </div><br>
                    <div class="form-group">
                      <p class="h7">Observaciones: </p>
                      <textarea type="text" cols="30" rows="5" name="observaciones" id="observaciones" class="form-control" placeholder="Ingrese las Observaciones" required><?php echo $row['OBSERVACIONES']; ?></textarea>
                        <br><br>
                    <div class="text-center">
                        <input type="submit" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px">
                    </div><br><br>
                            <h1 class="mt-4 mb-4">Listas de Registros</h1>
                </form>
</form>
    <script>
        var numero = <?php echo isset($row['NUMERO_POLIZA']) ? $row['NUMERO_POLIZA'] : "''"; ?>; //cambiar cuando este listo todo
    </script>
        <br>
      <form id="form2" method="POST">

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
            </div>
        </div>
    </div>
</div>
<script src="update.js"></script>
<script src="cementerio/script.js"></script>
<script src="beneficiario/script.js"></script>
<script src="natural/script.js"></script>
<script src="juridica/script.js"></script>
<script src="funeraria/script.js"></script>
<script src="servicio/script.js"></script>
<script src="codigo.js"></script>
<?php include ("../../Vista/Layouts/footer.php");