<?php 
	session_start();
	if ($_SESSION["name"] == "" || $_SESSION["name"] == null) {
		header("Location: adminLogin.php");
	}
 ?>
 
<?php include 'lib/AdminHandleCode.php'; ?>

<?php 
	$dataVar = $_GET["id"];
	$ad = new AdminApp();
	$deleteData = $ad->deleteDataMethod($dataVar);
	$data = $singleData->fetch_assoc();
?>