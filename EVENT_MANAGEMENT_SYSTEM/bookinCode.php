<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>


<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	$usrBooking = new UserApp();
	$venu_name = $_POST["venu_name"];
	$venu_address = $_POST["venu_address"];
	$dj = $_POST["dj"];
	$stage = $_POST["stage"];
	$mike = $_POST["mike"];
	$brekFastMenuValue = $_POST["brekFastMenuValue"];
	$teaMenuId = $_POST["teaMenuValue"];
	$lunchMenuId = $_POST["lunchMenuValue"];
	$dinnerMenuId = $_POST["dinnerMenuValue"];
	$veg = $_POST["food"];
	$booking_id = $_POST["booking_id"];
	$booking_date = $_POST["booking_date"];
	$total_guest = $_POST["total_guest"];
	$userId = $_POST["userId"];

	$bookingInsert = $usrBooking->userBookingCode($venu_name,$venu_address,$dj,$stage,$mike,$brekFastMenuValue,$teaMenuId,$lunchMenuId,$dinnerMenuId,$veg,$booking_id,$booking_date,$total_guest,$userId);
	if ($bookingInsert) {
		header("Location: bookAnEvent.php");
	}
?>