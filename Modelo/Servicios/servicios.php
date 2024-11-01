<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>

<?php include ('../../database/conexion.php');?>
    <div class="row">
    <div class="col-md-11 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
                <h1 class="mt-3 mb-4">SERVICIOS FUNERARIOS</h1>
            <div class="table-responsive">
            <table class="table table-striped" id="example">
                <thead class="thead-dark"><!--creamos un encabezado-->
            <tr><!--seccionamos todos los elementos que contendra-->
                <th>Codigo</th><!--<th>codigo</th>-->
                <th>Tipo</th>
                <th>Monto</th>
                <th><a href="registrar.php" class="btn btn-success container">Registrar</a></th>
            </tr>
            </thead>
<tbody>
    <?php
$consulta_pagina_actual = "SELECT * FROM servicio_funerario";

$resultado_pagina_actual = $mysqli->query($consulta_pagina_actual);

// Recorremos por medio de row todos los elementos y mostramos en pantalla
while($row = mysqli_fetch_array($resultado_pagina_actual)) {?>
    <tr>
        <td><?php echo $row['CODIGO_SERVICIO']?></td>
        <td><?php echo $row['DESCRIPCION']?></td>
        <td>$<?php echo $row['MONTO']?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['CODIGO_SERVICIO']?>" type="button" onclick="return ConfirmarEditar()">
                <i class="btn btn-primary btn-sm">Modificar</i><!--cambiar por codigo-->
            </a>
            <a href="delete.php?id=<?php echo $row['CODIGO_SERVICIO']?>" type="button" onclick="return ConfirmarEliminar()">
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