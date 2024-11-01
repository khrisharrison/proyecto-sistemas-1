<?php
 include ('../../../database/conexion.php');

// Obtener el valor de búsqueda
$q = $_GET["q"]; // Obtiene el codigo

// Consultar la base de datos
$sql = "SELECT *
        FROM BENEFICIARIO
        JOIN PERSONA ON BENEFICIARIO.CEDULA_beneficiario = PERSONA.CEDULA
        WHERE BENEFICIARIO.CEDULA_beneficiario LIKE '%" . $q . "%'";
$result = $mysqli->query($sql);

// Mostrar los resultados de búsqueda
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<p>" . $row["CEDULA_beneficiario"] . " - " . $row["NOMBRE"] . "</p>";
		
	}
} else {
	echo "<p>No se encontraron resultados</p>";
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>