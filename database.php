<?php
/* Función que realiza una petición SQL a la base de datos */
	function SQL_Query($SQL, $database = "sql2377322") {
		// Datos de conexion a la base de datos
		$server = 'sql2.freemysqlhosting.net';
		$user = 'sql2377322';
		$password = 'qV2*hJ8!';
		
		// Nos conectamos a la base de datos
		$connection = new mysqli($server, $user, $password, $database);

		// Definimos que nuestros datos vengan en utf8
		$connection->set_charset('utf8');

		$SQL_Query = NULL;

		// verificamos si hubo algun error y lo mostramos
		if ($connection->connect_errno) {
			$SQL_Query = $connection->connect_errno;
		} else {
			$SQL_Query = mysqli_query($connection, $SQL);
			mysqli_close($connection);
		}
		return $SQL_Query;
	}
?>