<?php include("../../Vista/Layouts/munuusuario/layout.php");
      include ('../../database/conexion.php');
?>

<body>
<h1>Insertar Ciudad</h1>
<p>
 
</p>
<p>&nbsp;</p>
<form action="guardar.php" method="post">
  <table class="table table-bordered table-striped" width="25%" border="0" align="center">
    <tr>
      <td><label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control">
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
      <td><label for="municipio">Municipio:</label>
        <select name="municipio" id="municipio" class="form-control">
          <option value="">Elija una opcion</option>
        </select>
        <br>
      </td>
      <td><label for="parroquia">Parroquia:</label>
        <select name="parroquia" id="parroquia" class="form-control">
          <option value="">Elija una opcion</option>
        </select>
        <br>
      </td>
      <td><label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" class="form-control">
      </td>
      <td><input type="submit" name="bot_agregar" value="Agregar" class="btn btn-primary"></td>
      <br>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
      <div class="text-center text-right">
        <a href="index.php" class="btn btn-primary">Volver</a>
      </div>
<p>&nbsp;</p>
</body>
<?php include ("../../Vista/Layouts/footer.php");?>
</html>




<script>
// Cargar los municipios y las parroquias según el estado y municipio seleccionados
document.getElementById("estado").addEventListener("input", function() {
  var estado_id = this.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("municipio").innerHTML = this.responseText;
      document.getElementById("municipio").value = "";
      document.getElementById("parroquia").innerHTML = "";
      document.getElementById("ciudad").value = "";
    }
  };
  xhttp.open("GET", "obtener_municipios.php?codigo_estado=" + estado_id, true);
  xhttp.send();
});

document.getElementById("municipio").addEventListener("input", function() {
  var municipio_id = this.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("parroquia").innerHTML = this.responseText;
      document.getElementById("ciudad").value = "";
    }
  };
  xhttp.open("GET", "obtener_parroquias.php?codigo_municipio=" + municipio_id, true);
  xhttp.send();
});

document.getElementById("parroquia").addEventListener("input", function() {
  var parroquia_id = this.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ciudad").value = this.responseText;
    }
  };
  xhttp.open("GET", "obtener_ciudad.php?codigo_parroquia=" + parroquia_id, true);
  xhttp.send();
});
</script>
