<?php
// Obtener el estado seleccionado
$cedula = $GLOBALS['cedula']; 
$consulta = "SELECT * FROM estado
  JOIN municipio ON estado.CODIGO_ESTADO = municipio.CODIGO_ESTADO
  JOIN parroquia ON municipio.CODIGO_MUNICIPIO = parroquia.CODIGO_MUNICIPIO
  JOIN ciudad ON parroquia.CODIGO_PARROQUIA = ciudad.CODIGO_PARROQUIA
  JOIN persona ON ciudad.CODIGO_CIUDAD = persona.Cod_ciudad
  WHERE persona.CEDULA = $cedula";
$resultado1 = $mysqli->query($consulta);
$row1 = $resultado1->fetch_assoc();

// Generar menú desplegable para el estado
$estados_query = "SELECT CODIGO_ESTADO, NOMBRE_ESTADO FROM estado";
$estados_result = $mysqli->query($estados_query);
?>
<table class="table table-bordered table-striped" width="25%" border="0" align="center">
  <tr>
    <td>
      <label for="estado">Estado:</label>
      <select name="estado" id="estado" class="form-control" required>
        <option value="">Selecciona un estado</option>
        <?php while ($estado = $estados_result->fetch_assoc()) { ?>
          <option value="<?php echo $estado['CODIGO_ESTADO']; ?>"<?php if ($estado['CODIGO_ESTADO'] == $row1['CODIGO_ESTADO']) { echo " selected"; } ?>>
            <?php echo $estado['NOMBRE_ESTADO']; ?>
          </option>
        <?php } ?>
      </select>
      <br>
    </td>
    <td>
      <label for="municipio">Municipio:</label>
      <select name="municipio" id="municipio" class="form-control" required>
        <option value="">Selecciona un municipio</option>
        <?php if ($row1['CODIGO_ESTADO']) { ?>
          <?php
          $municipios_query = "SELECT CODIGO_MUNICIPIO, NOMBRE_MUNICIPIO FROM municipio WHERE CODIGO_ESTADO = ".$row1['CODIGO_ESTADO'];
          $municipios_result = $mysqli->query($municipios_query);
          while ($municipio = $municipios_result->fetch_assoc()) { ?>
            <option value="<?php echo $municipio['CODIGO_MUNICIPIO']; ?>"<?php if ($municipio['CODIGO_MUNICIPIO'] == $row1['CODIGO_MUNICIPIO']) { echo " selected"; } ?>>
              <?php echo $municipio['NOMBRE_MUNICIPIO']; ?>
            </option>
          <?php } ?>
        <?php } ?>
      </select>
      <br>
    </td>
    <td>
      <label for="parroquia">Parroquia:</label>
      <select name="parroquia" id="parroquia" class="form-control" required>
        <option value="">Selecciona una parroquia</option>
        <?php if ($row1['CODIGO_MUNICIPIO']) { ?>
          <?php
          $parroquias_query = "SELECT CODIGO_PARROQUIA, NOMBRE_PARROQUIA FROM parroquia WHERE CODIGO_MUNICIPIO = ".$row1['CODIGO_MUNICIPIO'];
          $parroquias_result = $mysqli->query($parroquias_query);
          while ($parroquia = $parroquias_result->fetch_assoc()) { ?>
            <option value="<?php echo $parroquia['CODIGO_PARROQUIA']; ?>"<?php if ($parroquia['CODIGO_PARROQUIA'] == $row1['CODIGO_PARROQUIA']) { echo " selected"; } ?>>
              <?php echo $parroquia['NOMBRE_PARROQUIA']; ?>
            </option>
          <?php } ?>
        <?php } ?>
      </select>
      <br>
    </td>
    <td>
      <label for="ciudad">Ciudad:</label>
      <select name="ciudad" id="ciudad" class="form-control" required>
        <option value="">Selecciona una ciudad</option>
        <?php if ($row1['CODIGO_PARROQUIA']) { ?>
          <?php
          $ciudades_query= "SELECT CODIGO_CIUDAD, NOMBRE_CIUDAD FROM ciudad WHERE CODIGO_PARROQUIA = ".$row1['CODIGO_PARROQUIA'];
          $ciudades_result = $mysqli->query($ciudades_query);
          while ($ciudad = $ciudades_result->fetch_assoc()) { ?>
            <option value="<?php echo $ciudad['CODIGO_CIUDAD']; ?>"<?php if ($ciudad['CODIGO_CIUDAD'] == $row1['CODIGO_CIUDAD']) { echo " selected"; } ?>>
              <?php echo $ciudad['NOMBRE_CIUDAD']; ?>
            </option>
          <?php } ?>
        <?php } ?>
      </select>
      <br>
    </td>
  </tr>
</table>
<script>
$(document).ready(function() {
  // Cargar los municipios según el estado seleccionado
  $('#estado').change(function() {
    var estadoId = $(this).val();
    if(estadoId) {
      $.ajax({
        url: '../../includes/get_municipios.php',
        type: 'POST',
        data: {estadoId: estadoId},
        success: function(response) {
          console.log(response); // agregar esta línea
          $('#municipio').html(response);
          $('#parroquia').html('<option value="">Elija una opcion</option>');
          $('#ciudad').html('<option value="">Elija una opcion</option>');
        }
      });
    } else {
      $('#municipio').html('<option value="">Elija una opcion</option>');
      $('#parroquia').html('<option value="">Elija una opcion</option>');
      $('#ciudad').html('<option value="">Elija una opcion</option>');
    }
  });

  // Cargar las parroquias según el municipio seleccionado
  $('#municipio').change(function() {
    var municipioId = $(this).val();
    if(municipioId) {
      $.ajax({
        url: '../../includes/get_parroquias.php',
        type: 'POST',
        data: {municipioId: municipioId},
        success: function(response) {
          $('#parroquia').html(response);
          $('#ciudad').html('<option value="">Elija una opcion</option>');
        }
      });
    } else {
      $('#parroquia').html('<option value="">Elija una opcion</option>');
      $('#ciudad').html('<option value="">Elija una opcion</option>');
    }
  });

  // Cargar las ciudades según la parroquia seleccionada
  $('#parroquia').change(function() {
    var parroquiaId = $(this).val();
    if(parroquiaId) {
      $.ajax({
        url: '../../includes/get_ciudades.php',
        type: 'POST',
        data: {parroquiaId: parroquiaId},
        success: function(response) {
          $('#ciudad').html(response);
        }
      });
    } else {
      $('#ciudad').html('<option value="">Elija una opcion</option>');
    }
  });
});

</script>
