<?php
	// CHECK IF USER IS LOGGED IN. Write include("auth.php") in all "private" pages
	// set session_start(); BEFORE including auth.php

	if (!$_SESSION['userLogin']) {
		$_SESSION['userLogin'] = $_SESSION['userLogin'];
		header("Location: http://localhost/Perfiles%20de%20usuario/login.php");
		exit();
	}

?>