<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>

<?php include ('../../database/conexion.php');?>
    <div class="row">
    <div class="col-md-11 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
                <h1 class="mt-3 mb-4">BENEFICIARIO</h1>
            <div class="table-responsive">
            <table class="table table-striped" id="example">
                <thead class="thead-dark"><!--creamos un encabezado-->
            <tr><!--seccionamos todos los elementos que contendra-->
                <th>Cédula</th><!--<th>codigo</th>-->
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Partida nacimiento</th>
                <th>Fecha nacimiento</th>
                <th>Fecha deceso</th>
                <th>Causa muerte</th>
                <th><a href="registrar.php" class="btn btn-success container">Registrarse</a></th>
            </tr>
            </thead>
<tbody>
    <?php
$consulta_pagina_actual = "SELECT * FROM persona, BENEFICIARIO where persona.cedula = BENEFICIARIO.CEDULA_beneficiario";

$resultado_pagina_actual = $mysqli->query($consulta_pagina_actual);

// Recorremos por medio de row todos los elementos y mostramos en pantalla
while($row = mysqli_fetch_array($resultado_pagina_actual)) {?>
    <tr>
        <td>V-<?php echo $row['CEDULA']?></td>
        <td><?php echo $row['NOMBRE']?></td>
        <td><?php echo $row['APELLIDO']?></td>
        <td><?php echo $row['PARTIDA_NACIMIENTO']?></td>
        <td><?php echo $row['FECHA_NACIMIENTO']?></td>
        <td><?php if ($row['FECHA_DECESO'] === "0000-00-00" || $row['FECHA_DECESO'] === null) {
           echo 'No registrado';
          } else {
           echo $row['FECHA_DECESO'];
          } ?></td>
        <td><?php if ($row['CAUSA_MUERTE'] === null || $row['CAUSA_MUERTE'] === "") {
            echo 'No registrado';
        } else {
            echo '<button onclick="mostrarCausaMuerte(\'' . $row['CAUSA_MUERTE'] . '\')">Ver</button>';
        } ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['CEDULA']?>" type="button" onclick="return ConfirmarEditar()">
                <i class="btn btn-primary btn-sm">Modificar</i><!--cambiar por codigo-->
            </a>
            <a href="delete.php?id=<?php echo $row['CEDULA']?>" type="button" onclick="return ConfirmarEliminar()">
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
<script>
function mostrarCausaMuerte(causa) {
  alert(causa);
}
</script>
<?php include ("../../Vista/Layouts/footer.php");?><!--aqui incluimos el footer y lo repetimos-->

