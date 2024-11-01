<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>

<?php include ('../../database/conexion.php');?>

    <div class="row">
    <div class="col-md-10 mx-auto" style="width: 900px; margin-top: 20px !important; margin-bottom: 40px !important;"> 
                <h1 class="mt-4 mb-4">USUARIO</h1>
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } //el session_unset limpia los datos que tenemos?>
            <div class="table-responsive">
            <table class="table table-striped" id="example">
                <thead class="thead-dark"><!--creamos un encabezado-->
            <tr><!--seccionamos todos los elementos que contendra-->
                <th>Cédula</th><!--<th>codigo</th>-->
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th><!--<th>nombre</th>-->
                <th>Contraseña</th>
                <th><a href="registrar.php" class="btn btn-success container">Registrarse</a></th><!--colocar igual-->
            </tr>
            </thead>
<tbody>
    <?php
    //selecciona todas las tareas de persona
    $query = "SELECT * FROM persona, usuario where persona.cedula = usuario.CEDULA_usuario";
    //indicamos que hay una conexion
    $result = mysqli_query($mysqli,$query);
    //y recorremos por medio de row todos los elementos y mostramos en pantalla
    while($row = mysqli_fetch_array($result)) {?>
        <tr>
            <td>V-<?php echo $row['CEDULA']?></td>
            <td><?php echo $row['NOMBRE']?></td>
            <td><?php echo $row['APELLIDO']?></td>
            <td><?php echo $row['LOG_IN']?></td>
            <td><?php echo $row['CLAVE']?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['CEDULA_usuario']?>" type="button" onclick="return ConfirmarEditar()">
                    <i class="btn btn-primary btn-sm">Modificar</i><!--cambiar por codigo-->
                </a>
                <a href="delete.php?id=<?php echo $row['CEDULA_usuario']?>" type="button" onclick="return ConfirmarEliminar()">
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

