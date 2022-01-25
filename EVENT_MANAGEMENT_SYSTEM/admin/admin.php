<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>


<?php include "inc/header.php"; ?>

<div class="row">
	<div class="well text-center">
		<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4><br>
		<a href="addBooking.php">ADD BOOKING</a>&nbsp;&nbsp;
		<a href="newBooking.php">NEW BOOKING</a>&nbsp;&nbsp;
		<a href="viewBooking.php">VIEW BOOKING</a>&nbsp;&nbsp;
		<a href="viewVenus.php">VIEW VENUS</a>&nbsp;&nbsp;
		<a href="viewFeedback.php">VIEW FEEDBACK</a>&nbsp;&nbsp;
		<a href="logOut.php">LOG OUT</a>&nbsp;&nbsp;
	</div>


	<div class="well">
		<h4 class="text-center">THIS IS ADMIN SECTION</h4>
		<h6 class="text-center">WELCOME THIS PAGE</h6>
	</div>
</div>


<?php include "inc/header.php" ?>