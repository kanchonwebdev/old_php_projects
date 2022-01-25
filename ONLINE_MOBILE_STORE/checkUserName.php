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
		$userName = $_POST['userName'];
		$data = $check->checkName($userName);
		if (isset($data)) {
			echo $data;
		}
	}
?>