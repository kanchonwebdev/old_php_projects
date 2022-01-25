<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>

<?php include 'inc/header.php'; ?>
<?php include 'lib/UserHandleCode.php'; ?>

<div class="row">
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


	<div class="well row">

		<?php 
			$usrDetails = new UserApp();
			$usrDetailsId = $_SESSION['userID'];
			$selectDet = $usrDetails->getUserDetails($usrDetailsId);
			$selectDetails = $selectDet->fetch_assoc();
		 ?>

		<div class="col-sm-6 text-right">
			<b>User ID : </b><br><br>
			<b>Your Name : </b><br><br>
			<b>Your Address : </b><br><br>
			<b>Your Phone Number : </b><br><br>
			<b>Your Email : </b><br><br>
		</div>

		<div class="col-sm-6">
			<b><?php echo $selectDetails['userId']; ?></b><br><br>
			<b><?php echo $selectDetails['userName']; ?></b><br><br>
			<b><?php echo $selectDetails['address']; ?></b><br><br>
			<b><?php echo $selectDetails['phoneNumber']; ?></b><br><br>
			<b><?php echo $selectDetails['email']; ?></b><br><br>
		</div>

		
	</div>
</div>

<?php include 'inc/footer.php'; ?>