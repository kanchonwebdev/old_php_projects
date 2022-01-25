<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>

<?php include 'inc/header.php'; ?>


<div class="row">
	 <div class="well text-center">
	 	<h4>ADVANCED BOOKING SYSTEM</h4><br>
	 	<a href="addBooking.php">ADD BOOKING</a>&nbsp;&nbsp;
		<a href="newBooking.php">NEW BOOKING</a>&nbsp;&nbsp;
		<a href="viewBooking.php">VIEW BOOKING</a>&nbsp;&nbsp;
		<a href="viewVenus.php">VIEW VENUS</a>&nbsp;&nbsp;
		<a href="viewFeedback.php">VIEW FEEDBACK</a>&nbsp;&nbsp;
		<a href="logOut.php">LOG OUT</a>&nbsp;&nbsp;
	 </div>

	 <div class="well">
	 	<table class="table">
	 		<tr>
	 			<th class="text-center">B_ID</th>
	 			<th class="text-center">FEEDBACK STATUS</th>
	 			<th class="text-center">DATE</th>
	 		</tr>

	 		<tr>
	 			<td class="text-center">101</td>
	 			<td class="text-center">it's A Nice Place</td>
	 			<td class="text-center">10-10-2019</td>
	 		</tr>
	 	</table>
	 </div>
</div>


<?php include 'inc/footer.php'; ?>