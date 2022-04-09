<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
	</head>

	<body>

		<?php
			session_start();
			require("auth.php");
		?>



			<p>Esta es la segunda página, <?php echo $_SESSION['userLogin']; ?></p>

			<a href="index.php">Ir a la página principal</a>

		<?php			

			var_dump($_SESSION);
		

			include("logOutButton.php");
			include("adminButton.php");
		?>


		<script type="text/javascript" src="script.js"></script>

	</body>
</html>