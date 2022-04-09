<?php 

	$host = "localhost";
	$username = "root";
	$password = "";
	$ddbb = "perfilesdeusuario";

	$connection = new mysqli ($host, $username, $password, $ddbb);
	$connection->set_charset("utf8");

	if ($connection->connect_errno) {
		echo "Falló la conexión" . $connection->connect_errno;
	} else {
		// echo "Conexión exitosa";
	}

?>