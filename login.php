<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			session_start();
		?>

		<form id="loginForm" action="loginLogic.php" method="get">
			<?php
				if (isset($_SESSION['errorLogin'])) { echo $_SESSION['errorLogin']; unset($_SESSION['errorLogin']); } // Unset session after displaying error message so it disappears when the user refreshes
			?> 

			<!-- CLEAN FORM WITH JAVASCRIPT UPON REFRESH -->
			<!-- CLEAN FORM WITH JAVASCRIPT UPON REFRESH -->
			<!-- CLEAN FORM WITH JAVASCRIPT UPON REFRESH -->
			<!-- CLEAN FORM WITH JAVASCRIPT UPON REFRESH -->
			<input type="text" name="userLogin" placeholder="Username" value="<?php if (isset($_SESSION['userLogin'])) { echo $_SESSION['userLogin']; } ?>" required />
			<input type="password" name="passwordLogin" placeholder="Password" required />
			<input type="submit" name="sendingLogin" value="Login">
		</form>


		<div id="containerLoginSignUp">
			<a href="register.php"><button id="signUpButton">Sign Up</button></a>
		</div>

		<?php

			if(isset($_SESSION['successfullyRegistered']) && $_SESSION['successfullyRegistered'] == TRUE) {
				echo "Successfully registered";
			}

		?>

	</body>
</html>