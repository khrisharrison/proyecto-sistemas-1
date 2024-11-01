
<table class="table table-bordered table-striped" width="25%" border="0" align="center">
                        <tr>
                          <td>
                            <label for="estado">Estado:</label>
                            <select name="estado" id="estado" class="form-control" required>
                              <option value="">Elija una opcion</option>
                              <?php
                              $estados_query = "SELECT CODIGO_ESTADO, NOMBRE_ESTADO FROM estado";
                              $estados_result = $mysqli->query($estados_query);
                              while ($estado = $estados_result->fetch_assoc()) {
                                echo "<option value=\"" . $estado['CODIGO_ESTADO'] . "\">" . $estado['NOMBRE_ESTADO'] . "</option>";
                              }
                              ?>
                            </select>
                            <br>
                          </td>
                          <td>
                            <label for="municipio">Municipio:</label>
                            <select name="municipio" id="municipio" class="form-control" required>
                              <option value="">Elija una opcion</option>
                            </select>
                            <br>
                          </td>
                          <td>
                            <label for="parroquia">Parroquia:</label>
                            <select name="parroquia" id="parroquia" class="form-control" required>
                              <option value="">Elija una opcion</option>
                            </select>
                            <br>
                          </td>
                          <td>
                            <label for="ciudad">Ciudad:</label>
                            <select name="ciudad" id="ciudad" class="form-control" required>
                              <option value="">Elija una opcion</option>
                            </select>
                            <br>
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
