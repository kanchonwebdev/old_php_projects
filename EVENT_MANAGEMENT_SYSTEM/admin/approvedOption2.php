<?php 
	include 'lib/AdminHandleCode.php';
	$ad = new AdminApp();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$h_id = $_POST["h_id"];
		$sts = $_POST["sts"];
		$dataShow2 = $ad->updateBooking($h_id,$sts);
		if ($dataShow2) {
			header("Location: newBooking.php");
		}
	}
?>