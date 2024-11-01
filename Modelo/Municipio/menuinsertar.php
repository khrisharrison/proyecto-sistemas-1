<?php include("../../Vista/Layouts/munuusuario/layout.php");
      include ('../../database/conexion.php');
?>


<body>
<h1>Insertar Municipio</h1>
<p>

</p>
<p>&nbsp;</p>
<form action="guardar.php" method="post">
<table class="table table-bordered table-striped" width="25%" border="0" align="center">
<tr>
  <td>
    <label for="ESTADO">Estado:</label>
    <select name="ESTADO" id="ESTADO" class="form-control">
      <option value="">Elija una opción</option>
      <?php
      $estados_query = "SELECT CODIGO_ESTADO, NOMBRE_ESTADO FROM ESTADO";
      $estados_result = $mysqli->query($estados_query);
      while ($ESTADO = $estados_result->fetch_assoc()) {
        echo "<option value=\"" . $ESTADO['CODIGO_ESTADO'] . "\">" . $ESTADO['NOMBRE_ESTADO'] . "</option>";
      }
      ?>
    </select>
  </td>
  <td>
    <label for="MUNICIPIO">Municipio:</label>
    <input type="text" name="MUNICIPIO" class="form-control">
  </td>
  <td>
    <input type="submit" name="bot_agregar" value="Agregar" class="btn btn-primary">
  </td>
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

