<?php session_start() ?>
<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	if ($_SESSION["userId"] != "" || $_SESSION["userId"] != null) {
		$ad = new UserApp();
		$data = $ad->deleteExistData();
		unset($_SESSION["userId"]);
		header("Location: home.php");
	} 

?>
<?php session_destroy(); ?>