<?php
 include ('../../../database/conexion.php');

// Obtener el valor de búsqueda
$q = $_GET["q"];

// Consultar la base de datos
$sql = "SELECT *
        FROM RESPONSABLE_NATURAL
        JOIN PERSONA ON RESPONSABLE_NATURAL.CEDULA_natural = PERSONA.CEDULA
        WHERE RESPONSABLE_NATURAL.CEDULA_natural LIKE '%" . $q . "%'";
$result = $mysqli->query($sql);

// Mostrar los resultados de búsqueda
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<p>" . $row["CEDULA_natural"] . " - " . $row["NOMBRE"] . "</p>";
		
	}
} else {
	echo "<p>No se encontraron resultados</p>";
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>