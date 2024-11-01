<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>
<body>
  <?php 
  include ('../../database/conexion.php');
  $sql = "SELECT * FROM estado";
  $resultado_pagina_actual = $mysqli->query($sql);
  ?>
  

  <div class="container">
    <h1 class="mt-4 mb-4">ESTADOS<span class="subtitulo"> Venezuela</span></h1>

    <div class="row mb-4">
      <div class="col-md-6">
        <!-- Modificar la barra de búsqueda para que sea dinámica -->
        <form id="busqueda-form">
          <div class="input-group">
            <div class="input-group-append">
            </div>
          </div>
        </form>
    </div>

    <div class="table-responsive">
      <table class="table table-striped col-md-8 mx-auto" id="example">
        <thead class="thead-dark">
      </div>
      <div class="col-md-13 text-right">
      </div>
          <tr>
            <th>Id</th>
            <th>Estado</th>
            <th><a href="menuinsertar.php" class="btn btn-success container">Insertar</a></th>
          </tr>
        </thead>
        <tbody>
          <?php // Mostrar los resultados de la página actual
          foreach ($resultado_pagina_actual as $dato): ?>
            <tr>
              <td><?php echo $dato['CODIGO_ESTADO'] ?></td>
              <td><?php echo $dato['NOMBRE_ESTADO'] ?></td>
              <td>
                <a href="borrar_est.php?Id=<?php echo $dato['CODIGO_ESTADO'] ?>"
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('¿Está seguro que desea borrar este registro?')">Borrar</a>
                 <a href="modificar_est.php?CODIGO_ESTADO=<?php echo $dato['CODIGO_ESTADO']?> & nom=<?php echo $dato['NOMBRE_ESTADO']?>"
                  class="btn btn-primary btn-sm">Modificar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
<?php include ("../../Vista/Layouts/footer.php");?>
</html>