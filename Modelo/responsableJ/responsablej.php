<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>

<?php include ('../../database/conexion.php');?>

<div class="row">
<div class="col-md-11 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
<h1 class="mt-3 mb-4">Responsable Jurídico</h1>
<div class="table-responsive">
<table class="table table-striped" id="example">
<thead class="thead-dark"><!--creamos un encabezado-->
<tr><!--seccionamos todos los elementos que contendra-->
<th>Rif</th><!--<th>codigo</th>-->
<th>Nombre</th>
<th>Razón Social</th>
<th>DIRECCION</th><!--<th>codigo</th>-->
<th>CORREO</th>
<th><a href="registrar.php" class="btn btn-success container">Registrarse</a></th>
</tr>
</thead>
<tbody>
<?php
$consulta_pagina_actual = "SELECT * FROM ENTIDAD_JURIDICA, RESPONSABLE_JURIDICO where ENTIDAD_JURIDICA.RIF = RESPONSABLE_JURIDICO.RIF_juridico";

$resultado_pagina_actual = $mysqli->query($consulta_pagina_actual);

while($row = mysqli_fetch_array($resultado_pagina_actual)) {?>
    <tr>
    <td>J-<?php echo $row['RIF']?></td>
    <td><?php echo $row['NOMBRE']?></td>
    <td><?php echo $row['RAZON_SOCIAL']?></td>
    <td><?php echo $row['DIRECCION']?></td>
    <td><?php echo $row['CORREO']?></td>
    <td>
    <a href="edit.php?id=<?php echo $row['RIF']?>" type="button" onclick="return ConfirmarEditar()">
    <i class="btn btn-primary btn-sm">Modificar</i><!--cambiar por codigo-->
    </a>
    <a href="delete.php?id=<?php echo $row['RIF']?>" type="button" onclick="return ConfirmarEliminar()">
    <i class="btn btn-danger btn-sm">Borrar</i>
    </a>
    </td>
    </tr>
    <?php }?>
    </tbody>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    
    <?php include ("../../Vista/Layouts/footer.php");?><!--aqui incluimos el footer y lo repetimos-->
    
    