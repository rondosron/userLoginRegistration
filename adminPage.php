<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Página de admin</title>
	</head>
	<body>
		<?php
			session_start();
			require("auth.php");
			require("ddbbConnection.php");

			$username = stripslashes($_SESSION['userLogin']);
			$username = $connection->real_escape_string($username);

			// Check if user is admin
			$stmt = $connection->prepare("SELECT typeofuser FROM users WHERE username = ?");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->bind_result($typeofuserDDBB);

			while ($stmt->fetch()) {
				$typeofuser = $typeofuserDDBB;
			}

			// var_dump($typeofuser)

			if (isset($_SESSION['userLogin']) && $typeofuser == "admin") {
				// Página a mostrar que necesite la información del usuario
				echo "<p>Bienvenido <span>" . $_SESSION['userLogin'] . "</span> a la página de administración.</p>";
			} else {
				header("location: index.php");
			}


			var_dump($_SESSION);
		?>



		<a href="index.php">Ir a la página principal</a><br>
		<a href="secondPage.php">Ir a la segunda página</a><br>

		<?php
			include("logOutButton.php");
		?>



		
	</body>
</html>	