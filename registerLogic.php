<?php
	session_start();

	// DATABASE:
		// CREATE TABLE IF NOT EXISTS `users` (
		// `id` int(11) NOT NULL AUTO_INCREMENT,
		// `username` varchar(50) NOT NULL,
		// `email` varchar(50) NOT NULL,
		// `password` varchar(255) NOT NULL,
		// `trn_date` datetime NOT NULL,
		// PRIMARY KEY (`id`)
		// );
	require("ddbbConnection.php");

	$errors = [];

	// If form submitted, insert values into the database.
	if (isset($_REQUEST['userSignUp']) && isset($_REQUEST['emailSignUp']) && isset($_REQUEST['passwordSignUp']) ) {
		
		//////////////// USERNAME
			// removes backslashes
			$username = stripslashes($_REQUEST['userSignUp']);
				//escapes special characters in a string
			$username = $connection->real_escape_string($username);
			
			// Check if user is already registered
			$stmt = $connection->prepare("SELECT username FROM users WHERE username = ?");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->bind_result($users);

			// Si existe algun resultado de la consulta, ya hay un usuario registrado con ese nombre
			if ($stmt->fetch()) {
				$errors["userSignUp"] = "El usuario que se intenta registrar ya existe.";
			}

			$stmt->close();

		//////////////// EMAIL
			$email = stripslashes($_REQUEST['emailSignUp']);
			$email = $connection->real_escape_string($email);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors["emailSignUp"] = "Ingrese una dirección de email válida.";
			}

		/////////////// PASSWORD
			$password = stripslashes($_REQUEST['passwordSignUp']);
			$password = $connection->real_escape_string($password);

		/////////////// DATE
			$trn_date = date("Y-m-d H:i:s");


		// Back to form	if there's an error
		if (count($errors) !== 0) {
			$_SESSION['userSignUp'] = $username; // To mantain value in form
			$_SESSION['emailSignUp'] = $email; // To mantain value in form
			$_SESSION['errorsSignUp'] = $errors;
			header("Location: register.php");
			exit();
		}

		// Register user if there are not errors
		$stmt = $connection->prepare("INSERT INTO users (username, password, email, trn_date) VALUES (?,?,?,?)");
		$stmt->bind_param("ssss", $username, password_hash($password, PASSWORD_DEFAULT), $email, $trn_date);
		// $stmt->execute(); (ejecutada directamente en el if)
			// IMPORTANT: doesn't need $stmt->bind_result() because INSERT queries don't have results

		if($stmt->execute()) {
			$_SESSION['successfullyRegistered'] = TRUE;
			header("Location: login.php");
			exit();
		} else {
			$_SESSION['successfullyRegistered'] = FALSE;
			header("Location: register.php");
			exit();
		}
	} else {
		header("Location: register.php");
		exit();
	}


	$connection->close();

?>