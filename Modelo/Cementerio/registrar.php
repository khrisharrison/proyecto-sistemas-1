<?php include ('../../database/conexion.php');

if(isset($_POST['save'])){
    //datos
    $Rif = $_POST['RIF'];//$codigo = $_POST['codigo']
    $Nombre = $_POST['NOMBRE'];
    $Tipo = $_POST['TIPO'];
    $Ciudad = $_POST['ciudad'];
    $query = "INSERT INTO ENTIDAD_JURIDICA (RIF, NOMBRE, Cod_ciudad_Ju) VALUES ('$Rif', '$Nombre', '$Ciudad')";
    $querys = "INSERT INTO CEMENTERIO (RIF_CEMENTERIO, TIPO) VALUES ('$Rif', '$Tipo')";
    $result=mysqli_query($mysqli,$query);
    $resultado = mysqli_query($mysqli,$querys);
    //si no nos devuelve un resultado nos cierra el programa
    if(!$result){
        echo
        "<script> alert('Error. Verifique de nuevo'); </script>";
    }
    if(!$resultado){
        echo
        "<script> alert('Error. Verifique de nuevo'); </script>";
    }
    header("Location: cementerio.php");
    
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
    <h1 class="mt-4 mb-4">CEMENTERIO</h1>
    <div class="card card-body"><!--formulario de preguntas-->
    <form action="registrar.php">
    <div class="form-group"><!---->
    <p class="h7">Rif del Cementerio</p>
    <input type="number" name="RIF" class="form-control" placeholder="Ingrese el Rif del cementerio" required onkeypress="return valideKey(event);"onblur="limpia()" >
    <div class="text-center">
    <input type="submit" class="btn btn-primary" name="buscar" value="Buscar" style="margin-top: 20px !important;">
    </div>
    </form>
    <form id="miFormulario" action="save.php" method="POST">
    <?php
    if(isset($_GET['RIF'])){
        $Rif=$_GET['RIF'];
        $sql = "SELECT * FROM CEMENTERIO WHERE RIF_cementerio='$Rif'";
        $resultado = $mysqli->query($sql);
        $sqls = "SELECT * FROM ENTIDAD_JURIDICA WHERE RIF='$Rif'";
        $resultados = $mysqli->query($sqls);
            $consulta = "SELECT * FROM estado
            JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
            JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
            JOIN ciudad ON parroquia.CODIGO_PARROQUIA = ciudad.CODIGO_PARROQUIA
            JOIN ENTIDAD_JURIDICA ON ciudad.CODIGO_CIUDAD = ENTIDAD_JURIDICA.Cod_ciudad_Ju
            WHERE ENTIDAD_JURIDICA.RIF = $Rif"; // Agregar la cláusula WHERE
            $resultado1 = $mysqli->query($consulta);
            $row1 = $resultado1->fetch_assoc();
        //-----------SI EL USUARIO ESTA REGISTRADO SE MUESTRA ESTO ---------
        if($row = $resultado->fetch_assoc()){
            echo "<script> alert('El cementerio ya se encuentra registrado'); </script>";?>
            
            <div class="form-group"><!---->
            <p class="h7">Rif de Cementerio</p>
            <input type="number" name="RIF" value="<?php echo $row['RIF_cementerio']; $Rif2 = $row['RIF_cementerio'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
            </div><br>
            <div class="form-group"><!---->
            <p class="h7">Nombre </p>
            <input type="text" name="NOMBRE" value="<?php echo $row1['NOMBRE']; $var = $row1['NOMBRE'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
            </div><br>
            <div class="form-group"><!---->
            <p class="h7">Tipo </p>
            <input type="text" name="TIPO" value="<?php echo $row['TIPO']; $var = $row['TIPO'];?>" class="form-control" placeholder="" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
            </div>
            
            <tr>
            <td>
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
            <br>
            </tr>
            </table>
            <div class="text-center">
            <a href="cementerio.php" class="btn btn-primary btn-sm" style="font-size: 18px" type="button">Finalizar</a>
            </div>
            
            <?php }elseif($row = $resultados->fetch_assoc()){
                //----------SEGUNDA VALIDACION PARA SABER SI ES UNA PERSONA------------
                echo "<script> alert('El cementerio ya se encuentra registrado'); </script>";?>
                <div class="form-group"><!---->
                <p class="h7">RIF</p>
                <input type="number" name="RIF" value="<?php echo $row['RIF']; $Rif2 = $row['RIF'];?>" class="form-control" placeholder="Ingrese el Rif" required onkeypress="return valideKey(event);"onblur="limpia()" readonly>
                </div><br>
                <div class="form-group"><!---->
                <p class="h7">Nombre</p>
                <input type="text" name="NOMBRE" value="<?php echo $row['NOMBRE']; $Nombre2 = $row['NOMBRE'];?>" class="form-control" placeholder="Ingrese el nombre" required onblur="limpia()"  readonly>
                </div><br>
                <input type="hidden" name="ciudad" value="<?php echo $row1['CODIGO_CIUDAD']; $Nombre2 = $row1['CODIGO_CIUDAD'];?>" class="form-control" placeholder="Ingrese el NOMBRE" required onblur="limpia()"  readonly>
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
                <div class="form-group"><!---->
                <p class="h7">Tipo</p>
                <input type="text" name="TIPO" class="form-control" placeholder="Ingrese el tipo de cementerio" required onblur="limpia()">
                </div>
                <div class="text-center">
        <input type="submit" value="Guardar" style="font-size: 18px" class="btn btn-primary btn-sm" name="save">
                </div>
                <?php } else { $Rif=$_GET['RIF'];?>
                    <div class="form-group"><!---->
                    <p class="h7">Rif del Cementerio</p>
                    <input type="number" name="RIF" value="<?php echo "$Rif"; $Rif3 = $Rif?>" class="form-control" placeholder="Ingrese su Rif" requiredonkeypress="return soloLetras(event)" onblur="limpia()" >
                    </div><br>
                    <div class="form-group">
                    <p class="h7">Nombre</p>
                    <input type="text" name="NOMBRE"class="form-control" required  placeholder="Ingrese el nombre" onkeypress="return soloLetras(event)"  id="miInput">
                    </div><br>
                    <div class="form-group"><!---->
                    <p class="h7">Tipo</p>
                    <input type="text" name="TIPO" required class="form-control" placeholder="Ingrese el tipo de cementerio">
                    </div>
                    
                    
                    <?php include ("../../includes/barra.php"); ?>
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
                    