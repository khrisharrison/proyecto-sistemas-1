<?php include("../../Vista/Layouts/munuusuario/layout.php");?>

<body>
<p></p>
<h1>Insertar Estado</h1>

<form action="guardar.php" method="post">
  <table width="25%" border="0" align="center">
<tr>
  <p>&nbsp;</p>
  <td><h2 class="mb-1">Estado:</h2>
    <input type="text" class="form-control table table-bordered table-striped" name="estado">
  </td>
  <td>
    <input type="submit" class="btn btn-primary" name="bot_agregar" value="Agregar">
  </td>
</tr>
  </table>
</form>
<p>&nbsp;</p>
      <div class="text-center text-right">
        <a href="estado.php" class="btn btn-primary">Volver</a>
      </div>
<p>&nbsp;</p>
</body>
<?php include ("../../Vista/Layouts/footer.php");?>
</html>