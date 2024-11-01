<?php include("../../Vista/Layouts/munuusuario/layout.php"); ?>
<body>
  <?php 
  include ('../../database/conexion.php');
  $result = "SELECT * FROM ESTADO
  JOIN MUNICIPIO ON ESTADO.CODIGO_ESTADO = MUNICIPIO.CODIGO_ESTADO
  JOIN PARROQUIA ON MUNICIPIO.CODIGO_MUNICIPIO = PARROQUIA.CODIGO_MUNICIPIO";
  $resultado = $mysqli->query($result);
  ?>
  

  <div class="container">
    <h1 class="mt-4 mb-4">PARROQUIA<span class="subtitulo"> Venezuela</span></h1>

    <div class="row mb-4">
      <div class="col-md-6">
        <!-- Modificar la barra de búsqueda para que sea dinámica -->
        <form id="busqueda-form">
          <div class="input-group">
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
            <th>Parroquia</th>
            <th>Municipio</th>
            <th>Estado</th>
            <th><a href="menuinsertar.php" class="btn btn-success container">Insertar</a></th>
          </tr>
        </thead>
        <tbody>
          <?php // Mostrar los resultados de la página actual
          foreach ($resultado as $dato): ?>
            <tr>
              <td><?php echo $dato['CODIGO_PARROQUIA'] ?></td>
              <td><?php echo $dato['NOMBRE_PARROQUIA'] ?></td>
              <td><?php echo $dato['NOMBRE_MUNICIPIO'] ?></td>
              <td><?php echo $dato['NOMBRE_ESTADO'] ?></td>
              <td>
                <a href="borrar_parroquia.php?Id=<?php echo $dato['CODIGO_PARROQUIA'] ?>"
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('¿Está seguro que desea borrar este registro?')">Borrar</a>
                <a href="modificar.php?Id=<?php echo $dato['CODIGO_PARROQUIA']?> & parr=<?php echo $dato['NOMBRE_PARROQUIA']?> & id_mun=<?php echo $dato['CODIGO_MUNICIPIO']?>"
                  class="btn btn-primary btn-sm">Modificar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Configurar la barra de búsqueda dinámica
      $('#busqueda-form').submit(function(e) {
        e.preventDefault();
        var busqueda = $('#busqueda').val();

        $.ajax({
          url: 'buscar.php',
          type: 'POST',
          data: { busqueda: busqueda },
          success: function(response) {
            $('#tabla-ciudades tbody').html(response);
          }
        });
      });
    });
  </script>
</body>
<?php include ("../../Vista/Layouts/footer.php");?>
</html>