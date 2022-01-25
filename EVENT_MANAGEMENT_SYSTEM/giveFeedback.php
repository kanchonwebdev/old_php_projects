<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>

<?php include 'inc/header.php'; ?>
<?php include 'lib/UserHandleCode.php'; ?>

<div class="row">
	<div class="well">
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

	<?php 
		$usr = new UserApp();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$userID = $_POST["userID"];
			$feedbackForm = $_POST["feedbackForm"];
			$feedBackData = $usr->feedBackMethod($userID,$feedbackForm);
		}
	?>

	<?php 
		if (isset($feedBackData)) {
			echo $feedBackData;
		}
	?>

	<div class="well">
		<div class="well">
			<form action="#" method="post">
				<input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">
				<div class="form-group">
					<textarea class="form-control" rows="10" cols="40" name="feedbackForm"></textarea>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="FEEDBACK">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>