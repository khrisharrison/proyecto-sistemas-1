<?php
include ('../../database/conexion.php');//incluir base de datos
$rif='';
$nombre='';
$tipo='';


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM funeraria WHERE RIF_funeraria=$id";
        $querys = "SELECT * FROM entidad_juridica WHERE RIF=$id";
        $result = mysqli_query($mysqli, $query);
        $resultado = mysqli_query($mysqli, $querys);
        if (mysqli_num_rows($result) == 1) { //Muestra lo que tiene el funeraria
            $row = mysqli_fetch_array($result);
            $rif = $row['RIF_funeraria'];
            $tipo = $row['TIPO'];
        }
        if (mysqli_num_rows($resultado) == 1) {//juridica
            $row = mysqli_fetch_array($resultado);
            $Rif = $row['RIF'];
            $nombre = $row['NOMBRE'];
            $ciudad = $row['Cod_ciudad_Ju'];
        }
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
                        <p class="h7">RIF:</p>
                        <input name="rif" type="text" class="form-control" class="display-1"  value="<?php echo $rif; ?>" placeholder="remplace rif" aria-label="Disabled input example" disabled>
                        <input name="rif" id="rif" type="hidden" value="<?php echo $rif; ?>">
                    </div><br>
                    <div class="form-group">
                            <p class="h7">Nombre:</p>
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="remplace nombre" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="nombre">
                    </div><br>
                    <div class="form-group">
                        <p class="h7">Tipo:</p>
                        <input name="tipo" type="text" class="form-control" value="<?php echo $tipo; ?>" placeholder="remplace tipo" required  onkeypress="return soloLetras(event)" onblur="limpia()" id="tipo">
                    </div><br>
                    
                    <br>
                    <?php $Rif = $rif; ?>
                    <?php include("../../includes/barrallenaj.php"); ?>
                    <div class="text-center">
                        <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px"></button>
                    </div>
                </form><br><br>

    <script>
        var numero = <?php echo isset($row['RIF']) ? $row['RIF'] : "''"; ?>; //cambiar cuando este listo todo
    </script>
                <form id="form2" method="POST">
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
                <th>Tipo</th>
                <th>Nro poliza</th>
            <th><button type="button" class="btn btn-success container" id="update3">Actualizar</button></th>
            </thead>
       <tbody></tbody>
       </table><br>
    <div class="text-center">
    <a href="funeraria.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
    </div>
    </form>
            </div>
        </div>
    </div>
</div>

<script src="codigo.js"></script>
<script src="update.js"></script>
<script src="funeraria/script.js"></script>
<?php include ("../../Vista/Layouts/footer.php");
