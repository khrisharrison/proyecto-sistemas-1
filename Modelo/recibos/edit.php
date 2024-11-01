<?php
include ('../../database/conexion.php');//incluir base de datos

if(!isset($_POST["bot_actualizar"])){
    $numero= $_GET['id'];
    
  }else{
    $id= $_GET['id'];
    $fecha = $_GET['fecha'];
    $monto = $_GET['monto'];
    $estado = $_GET['STATUS'];

    //$id=validar_campo($_POST["id"]);
    
    // Verificar si ya existe un estado con el mismo nombre
    $query = "SELECT * FROM recibo_pago WHERE NUMERO_RECIBO=$$id";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($result);
    $resultado=$mysqli->prepare($sql);

    $resultado->bind_param("s", $nom);

    $resultado->execute();

    $resultado->store_result();
  }

    if ($resultado->num_rows > 0) {
      // Si ya existe un estado con el mismo nombre, mostrar un mensaje de error
      echo "<script>alert('Error, ya existe un estado con el mismo nombre.'); window.location.href = 'estado.php';</script>";
    } else {
      // Si no existe un estado con el mismo nombre, actualizar el estado en la base de datos
      $sql = "UPDATE recibo_pago SET FECHA_PAGO_= '$fecha', MONTO = '$monto', Estado = '$estado' WHERE NUMERO_RECIBO=$id";
      $resultado=$mysqli->prepare($sql);

      $resultado->bind_param("si", $nom, $id);
    }


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
                            <p class="h7">Fecha: </p>
                            <input name="fecha" id="fecha" style="width: 150px;" type="date" class="form-control" value="<?php echo $row['FECHA_PAGO']; ?>" required>
                    </div><br>
                    
                    <div class="form-group">
                        <p class="h7">Monto ($):</p>
                        <input name="monto" type="number" class="form-control" value="<?php echo $row['MONTO']; ?>" placeholder="remplace el monto de la poliza" required  onkeypress="return valideKey(event);" id="monto">
                        <br><br>
                Status de la poliza:
                <select name="STATUS" id="STATUS" required class="form-control" style="width: 180px;">
                    <option value="">Elija una opcion</option>
                    <option value="ACTIVO"<?php if ($row['Estado'] === 'ACTIVO') { echo ' selected'; } ?>>ACTIVO</option>
                    <option value="INACTIVO"<?php if ($row['Estado'] === 'INACTIVO') { echo ' selected'; } ?>>INACTIVO</option>
                </select>
                            </div><br>
                    
                    <div class="text-center">
                        <input type="submit" value="Actualizar" class="btn btn-primary btn-sm mx-auto" style="font-size: 18px">
                    </div><br><br>
                            
                </form>
</form>
    <script>
        var numero = <?php echo isset($row['NUMERO_POLIZA']) ? $row['NUMERO_POLIZA'] : "''"; ?>; //cambiar cuando este listo todo
    </script>
       
    </div>
</div>

<?php include ("../../Vista/Layouts/footer.php");