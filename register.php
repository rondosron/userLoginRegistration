<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">

	</head>
	<body>

		<?php
			session_start();
		?>

		<form id="signUpForm" action="registerLogic.php" method="get">
			<input type="text" name="userSignUp" placeholder="Username" value="<?php if (isset($_SESSION['userSignUp'])) { echo $_SESSION['userSignUp']; } ?>" class="<?php if(isset($_SESSION['userSignUp'])) { if($_SESSION['errorsSignUp']['userSignUp'] == '') { echo 'validInput'; } else { echo 'invalidInput'; } } ?>" required />
			<?php if(isset($_SESSION['errorsSignUp']['userSignUp'])) {
				echo $_SESSION['errorsSignUp']['userSignUp'];
			} ?>
			<input type="email" name="emailSignUp" placeholder="Email" value="<?php if (isset($_SESSION['emailSignUp'])) { echo $_SESSION['emailSignUp']; } ?>" class="<?php if(isset($_SESSION['emailSignUp'])) { if(!isset($_SESSION['errorsSignUp']['emailSignUp'])) { echo 'validInput'; } else { echo 'invalidInput'; } } ?>" required />
			<?php if(isset($_SESSION['errorsSignUp']['emailSignUp'])) {
				echo $_SESSION['errorsSignUp']['emailSignUp'];
			} ?>
			<input type="password" name="passwordSignUp" placeholder="Password" required />
			<input type="submit" name="sendingSignUp" value="Sign Up">
		</form>


		<!-- Display error in registration -->
		<?php if(isset($_SESSION['successfullyRegistered']) && $_SESSION['successfullyRegistered'] == FALSE) {
			echo "Sorry, user could NOT be registered. Please, try again.";
		} ?>

		<div id="containerLoginSignUp">
			<a href="login.php"><button id="loginButton">Login</button></a>
		</div>
	</body>
</html>