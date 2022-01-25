<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>

<?php include 'inc/header.php'; ?>
<?php include 'lib/UserHandleCode.php'; ?>
<?php error_reporting(0) ?>

<div class="row">
	<div class="well text-center">
		<div class="well text-center">
			<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4><br>
			<a href="home.php">MY DETAILS</a>&nbsp;&nbsp;&nbsp;
			<a href="bookAnEvent.php">BOOK AN EVENT</a>&nbsp;&nbsp;&nbsp;
			<a href="bookingStatus.php">BOOKING STATUS</a>&nbsp;&nbsp;&nbsp;
			<a href="bookingHistory.php">BOOKING HISTORY</a>&nbsp;&nbsp;&nbsp;
			<a href="giveFeedback.php">FEEDBACK</a>&nbsp;&nbsp;&nbsp;
			<a href="viewVenue.php">VIEW VENUE</a>&nbsp;&nbsp;&nbsp;
			<a href="logOut.php">LOG OUT</a>
		</div>
	</div>


	<div class="well">

		<h4 class="text-center" style="color: red">YOUR BOOKING STATUS</h4><br>

		<table class="table table-hover">
			<tr>
				<th>B_ID</th>
				<th>GUEST</th>
				<th>EVENT</th>
				<th>PLACE</th>
				<th>DATE</th>
				<th>EQUIPMENT</th>
				<th>F_TYPE</th>
				<th>BREAKFAST</th>
				<th>LUNCH</th>
				<th>SNACK</th>
				<th>DINNER</th>
				<th>STATUS</th>
			</tr>
			<?php 
				$usrData = new UserApp();
				$sessionData = $_SESSION['userID'];
				$selectBooking = $usrData->selectBookingMethod($sessionData);
					
				foreach ($selectBooking as $data) {
					?>

			

			<tr>
				<td><?php echo $data['booking_id']; ?></td>
				<td><?php echo $data['guest_number']; ?></td>
				<td><?php echo $data['venu_name']; ?></td>
				<td><?php echo $data['venu_address']; ?></td>
				<td><?php echo $data['booking_date']; ?></td>
				<td><?php echo $data['dj']; ?> <?php echo $data['stage']; ?> <?php echo $data['mike']; ?></td>
				<td><?php echo $data['food_type']; ?></td>
				<td><?php echo $data['breakfast']; ?></td>
				<td><?php echo $data['lunch']; ?></td>
				<td><?php echo $data['tea_&_snack']; ?></td>
				<td><?php echo $data['dinner']; ?></td>
				<td><?php echo $data['booking_status']; ?></td>
			</tr>

			<?php } ?>
		</table>
	</div>
</div>

<?php include 'inc/footer.php'; ?>