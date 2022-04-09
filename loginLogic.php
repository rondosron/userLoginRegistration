<?php
	session_start();
	require("ddbbConnection.php");

	if (isset($_REQUEST['userLogin']) && isset($_REQUEST['passwordLogin'])) {
		$username = stripslashes($_REQUEST['userLogin']);
		$username = $connection->real_escape_string($username);

		$password = stripslashes($_REQUEST['passwordLogin']);
		$password = $connection->real_escape_string($password);

		// Check if user and password are correct
		$stmt = $connection->prepare("SELECT username, password FROM users WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($usernameDDBB, $passwordDDBB);
		$stmt->fetch();

		// Cehck password
		$_SESSION['userLogin'] = $username; // Username in session is useful in both cases
		if (password_verify($password, $passwordDDBB)) {
			header("Location: index.php");
			exit();
		} else {
			$_SESSION['errorLogin'] = "Los datos ingresados son inválidos.";
			header("Location: login.php");
			exit();
		}

		// while($stmt->fetch()) {
		// 	echo "Usuario " . $usernameDDBB . " y contraseña " . $passwordDDBB .  "coincidentes.";
		// }

	} else {
		header("Location: login.php");
		exit();
	}

	$connection->close();
?>