<?php
	$mysqli = new mysqli("localhost","root","","polizas_servicios_funerarios"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>