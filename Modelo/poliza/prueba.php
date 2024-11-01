<?php
	$numero = 1; // Asigna el valor correcto de `numero` aquí
?>

<!DOCTYPE html>
<html>
<head>
	<title>Barra de búsqueda en tiempo real</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="cementerio/script.js"></script>
	<script src="natural/script.js"></script>
	<script src="juridica/script.js"></script>
	<script src="funeraria/script.js"></script>
	<script src="servicio/script.js"></script>
	<script>
		var numero = <?php echo isset($numero) ? $numero : "''"; ?>;
	</script>
</head>
<body>
	<h1>Barra de búsqueda en tiempo real</h1>
	<input type="text" id="search-bar" placeholder="Ingrese la cédula">
	<button id="save-button">Guardar</button>
	<div id="search-results"></div>
	<h1>Lista de Cementerios</h1>
	<table id="person-table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Rif</th>
				<th>Nro poliza</th>
				<th><button id="update-button">Actualizar</button></th>
			</tr>
		</thead>
		<tbody>
			


		</tbody>
	</table>
<th>---------------------------------------------------------------------------------</th>

	<h1>Barra de búsqueda en tiempo real</h1>
	<input type="text" id="search-bar1" placeholder="Ingrese la cédula">
	<button id="save-button1">Guardar</button>
    <div id="searchResults1"></div>
	<h1>Lista de personas Naturales</h1>
	<table id="person1">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cédula</th>
				<th>Nro poliza</th>
				<th><button id="update1">Actualizar</button></th>
			</tr>
		</thead>
		        <tbody>
            <!-- Aquí se agregarán las filas generadas por PHP mediante AJAX -->
        </tbody>
	</table>
<th>---------------------------------------------------------------------------------</th>
	<h1>Barra de búsqueda en tiempo real</h1>
	<input type="text" id="search-bar2" placeholder="Ingrese el Rif">
	<button id="save-button2">Guardar</button>
    <div id="searchResults2"></div>
	<h1>Lista de personas Juridicas</h1>
	<table id="person2">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Rif</th>
				<th>Nro poliza</th>
				<th><button id="update2">Actualizar</button></th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
<th>---------------------------------------------------------------------------------</th>
	<h1>Barra de búsqueda en tiempo real</h1>
	<input type="text" id="search-bar3" placeholder="Ingrese el Rif">
	<button id="save-button3">Guardar</button>
    <div id="searchResults3"></div>
	<h1>Lista de Funerarias</h1>
	<table id="person3">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Rif</th>
				<th>Nro poliza</th>
				<th><button id="update3">Actualizar</button></th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
<th>---------------------------------------------------------------------------------</th>
	<h1>Barra de búsqueda en tiempo real</h1>
	<input type="text" id="search-bar4" placeholder="Ingrese el codigo del servicio">
	<button id="save-button4">Guardar</button>
    <div id="searchResults4"></div>
	<h1>Lista de Servicios</h1>
	<table id="person4">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Descripcion</th>
				<th>Nro poliza</th>
				<th><button id="update4">Actualizar</button></th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
<th>---------------------------------------------------------------------------------</th>
</body>
</html>
<script src="codigo.js"></script>