<?php include ('../../database/conexion.php');

include("../../Vista/Layouts/munuusuario/layout.php");
$con1=false;
$con2=false;
?>

<div class="container p-4">
<div class="row">
<div class="col-md-7 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
<?php if (isset($_SESSION['message'])) { ?>
</div>
<?php session_unset(); }?>
<h1 class="mt-4 mb-4">REGISTRAR FUNERARIA</h1>
<div class="card card-body"><!--formulario de preguntas-->
    <form action="registrar.php">
        <div class="form-group"><!---->
            <p class="h7">RIF de la Funeraria</p>
            <input type="number" name="rif" class="form-control" placeholder="Ingrese RIF de la Funeraria" required onkeypress="return valideKey(event);"onblur="limpia()" >
            <div class="text-center">
            <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
            </div>
    </form>
    <form id="my-form">
        <?php
            if(isset($_GET['rif'])){
                $rif=$_GET['rif'];
                $sql = "SELECT * FROM funeraria WHERE RIF_funeraria='$rif'";
                $resultado = $mysqli->query($sql);
                $sqls = "SELECT * FROM entidad_juridica WHERE RIF='$rif'";
                $resultados = $mysqli->query($sqls);
$consulta = "SELECT * FROM estado
JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
JOIN ciudad ON parroquia.CODIGO_PARROQUIA = ciudad.CODIGO_PARROQUIA
JOIN ENTIDAD_JURIDICA ON ciudad.CODIGO_CIUDAD = ENTIDAD_JURIDICA.Cod_ciudad_Ju
WHERE ENTIDAD_JURIDICA.RIF = $rif"; // Agregar la cláusula WHERE
$resultado1 = $mysqli->query($consulta);
$row1 = $resultado1->fetch_assoc();
    //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
    if($row = $resultado->fetch_assoc()){
        echo "<script> alert('La entidad juridica ya se encuentra registrada'); </script>";?>

        <div class="form-group"><!---->
            <p class="h7">RIF de la Funeraria</p>
            <input type="text" name="rif" value="<?php echo $row['RIF_funeraria']; $rif2 = $row['RIF_funeraria'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
        </div><br>
        <div class="form-group"><!---->
            <p class="h7">Nombre </p>
            <input type="text" name="nombre" value="<?php echo $row1['NOMBRE']; $var = $row1['NOMBRE'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
        </div><br>
        <div class="form-group"><!---->
            <p class="h7">Tipo </p>
            <input type="text" name="tipo" value="<?php echo $row['TIPO']; $var = $row['TIPO'];?>" class="form-control" placeholder="" required onblur="limpia()" readonly>
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
        <div class="text-center">
        <a href="funeraria.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
        </div>

<?php }elseif($row = $resultados->fetch_assoc()){
     //----------SEGUNDA VALIDACION PARA SABER SI ES UNA PERSONA------------

    echo "<script> alert('La persona ya se encuentra registrada'); </script>";?>
    <?php $con1=true; ?>
    <div class="form-group"><!---->
        <p class="h7">RIF</p>
        <input type="number" name="rif" value="<?php echo $row['RIF']; $rif2 = $row['RIF'];?>" class="form-control" placeholder="Ingrese RIF" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>

        <input type="hidden" name="rif" id="rif" value="<?php echo $row['RIF'];?>">

    </div><br>
    <div class="form-group"><!---->
        <p class="h7">Nombre</p>
        <input type="text" name="nombre" value="<?php echo $row['NOMBRE']; $nombre2 = $row['NOMBRE'];?>" class="form-control" placeholder="Ingrese Nombre" required onkeypress="return valideKey(event);"onblur="limpia()"  readonly>

        <input type="hidden" name="nombre" id="nombre" value="<?php echo $row['NOMBRE'];?>">

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
<input type="hidden" name="ciudad" id="ciudad" value="<?php echo $row1['CODIGO_CIUDAD'];?>">
        <div class="form-group"><!---->
            <p class="h7">Tipo</p>
            <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Ingrese tipo" required onblur="limpia()">
        </div><br>
      <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm">
        </div>
    <?php } else { $rif=$_GET['rif'];?>
    <?php $con1=true; ?>
        <div class="form-group"><!---->
            <p class="h7">RIF</p>
            <input type="number" name="rif" id="rif" value="<?php echo "$rif";?>" class="form-control" placeholder="Ingrese RIF" required onkeypress="return valideKey(event);" onblur="limpia()" >
        </div><br>
        <div class="form-group">
            <p class="h7">Nombre</p>
            <input type="text" name="nombre" id="nombre" class="form-control" required  placeholder="Ingrese nombre" onkeypress="return soloLetras(event)">
        </div><br>
        <div class="form-group"><!---->
            <p class="h7">Tipo</p>
            <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Ingrese tipo">
        </div><br>
<?php include ("../../includes/barra.php"); ?>
            <div class="text-center">
                <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm">
            </div>
                </div>
                <?php } }?>
    </form>
<?php if ($con2==true || $con1==true ): ?>
    
<?php $num = $_GET['rif']; ?>

    <script>
        var numero = <?php echo isset($num) ? $num : "''"; ?>; //cambiar cuando este listo todo
    </script>
<form id="form2" method="POST" disabled>
         <div class="form-group">
        <p style="font-size: 25px;">Lista de Servicios </p>
        <div class="row">
    <input type="text" style="width: 200px;" id="search-bar3" placeholder="Ingrese el Codigo del servicio" class="form-control">
    <button id="save-button3" class="btn btn-primary btn-sm" style="font-size: 18px; margin-left: 10px;" type="button">Guardar</button>
    </div>
    <div id="searchResults3"></div>
    </div><br>
    <table id="person3" class="table table-striped">
        <thead class="thead-dark">
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update3">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>
    </form>
    <?php endif ?>
</div>
</div>
</div>
</div>
<script src="codigo.js"></script>
<script src="save.js"></script>
<script src="funeraria/script.js"></script>
<?php include ("../../Vista/Layouts/footer.php");
