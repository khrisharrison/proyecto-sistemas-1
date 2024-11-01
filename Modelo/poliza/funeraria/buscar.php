<?php
 include ('../../../database/conexion.php');

// Obtener el valor de búsqueda
$q = $_GET["q"];

// Consultar la base de datos
$sql = "SELECT *
        FROM FUNERARIA
        JOIN ENTIDAD_JURIDICA ON FUNERARIA.RIF_funeraria = ENTIDAD_JURIDICA.RIF
        WHERE FUNERARIA.RIF_funeraria LIKE '%" . $q . "%'";
$result = $mysqli->query($sql);

// Mostrar los resultados de búsqueda
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<p>" . $row["RIF_funeraria"] . " - " . $row["NOMBRE"] . "</p>";
		
	}
} else {
	echo "<p>No se encontraron resultados</p>";
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>