<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>

<?php
	include 'lib/AdminHandleCode.php';

	$adminApp = new AdminApp();
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$venu_name = $_POST['venu_name'];
		$venu_address = $_POST['venu_address'];
		$venu_phone_number = $_POST['venu_phone_number'];
		$capacity = $_POST['capacity'];
		$preferred = $_POST['preferred'];
		$amount = $_POST['amount'];
		$upload_file = "images/";
		$upload_filed = "images/".$venu_name;
		//image uploading
		$venu_image_name = $_FILES['file']['name'];
		$venu_image_size = $_FILES['file']['size'];
		$venu_image_tmp_name = $_FILES['file']['tmp_name'];

		move_uploaded_file($venu_image_tmp_name, $upload_file.$venu_image_name);
		$adminBookingInsert = $adminApp->adminBookingDataInsert($venu_name,$venu_address,$venu_phone_number,$capacity,$preferred,$amount,$venu_image_name);
		
			
		if ($adminBookingInsert) {
			echo "Data insert";
		}
	}
?>