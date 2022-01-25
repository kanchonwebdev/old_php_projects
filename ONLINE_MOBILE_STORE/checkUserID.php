<?php session_start() ?>

<?php 
	if ($_SESSION["userId"] == "" || $_SESSION["userId"] == null) {
		header("Location: userLogin.php");
	} 

?>
<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	$check = new UserApp();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userId = $_POST['userId'];
		$data = $check->checkId($userId);
		if (isset($data)) {
			echo $data;
		}
	}
?>