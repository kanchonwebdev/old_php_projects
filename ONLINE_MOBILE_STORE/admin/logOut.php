<?php 
	session_start();
	if ($_SESSION["name"] != "" || $_SESSION["name"] != null) {
		unset($_SESSION["name"]);
		header("Location: adminLogin.php");
	}
	session_destroy();
 ?>