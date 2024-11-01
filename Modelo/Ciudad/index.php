<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>
<body>
  <?php 
  include ('../../database/conexion.php');

  $consulta_pagina_actual = "SELECT * FROM estado
        JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
        JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
        JOIN ciudad ON parroquia.CODIGO_PARROQUIA = ciudad.CODIGO_PARROQUIA";
  $resultado_pagina_actual = $mysqli->query($consulta_pagina_actual);
  ?>
  

  <div class="container">
    <h1 class="mt-4 mb-4">CIUDAD<span class="subtitulo"> Venezuela</span></h1>

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
    </div>
    <div class="table-responsive">
      <table class="table table-striped" id="example">
        <thead class="thead-dark">
        <div class="col-md-13 text-right">
      </div>
          <tr>
            <th>Id</th>
            <th>Ciudad</th>
            <th>Parroquia</th>
            <th>Municipio</th>
            <th>Estado</th>
            <th><a href="menuinsertar.php" class="btn btn-success container">Insertar</a></th>
          </tr>
        </thead>
        <tbody>
          <?php // Mostrar los resultados de la página actual
          foreach ($resultado_pagina_actual as $dato): ?>
            <tr>
              <td><?php echo $dato['CODIGO_CIUDAD'] ?></td>
              <td><?php echo $dato['NOMBRE_CIUDAD'] ?></td>
              <td><?php echo $dato['NOMBRE_PARROQUIA'] ?></td>
              <td><?php echo $dato['NOMBRE_MUNICIPIO'] ?></td>
              <td><?php echo $dato['NOMBRE_ESTADO'] ?></td>
              <td>
                <a href="borrarciudad.php?Id=<?php echo $dato['CODIGO_CIUDAD'] ?>"
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('¿Está seguro que desea borrar este registro?')">Borrar</a>
                <a href="modificar.php?Id=<?php echo $dato['CODIGO_CIUDAD']?> & ciu=<?php echo $dato['NOMBRE_CIUDAD']?> & id_parr=<?php echo $dato['CODIGO_PARROQUIA']?>"
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