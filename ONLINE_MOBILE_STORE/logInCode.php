<?php session_start() ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_online_mobile_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$userId = $_POST["userId"];
$userPass = $_POST["userPass"];

$sql = "SELECT * FROM tbl_user_register WHERE userName = '$userId' AND password = '$userPass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($result) {
		$_SESSION["userId"] = $userId;
		header("Location: home.php");
	}else{
		$msg3 = '<div class="text-center alert alert-warning alert-dismissible fade in">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <strong>Login Fail Please Try Again</strong>
				 </div>';
		return $msg3;
	}
} 
$conn->close();
?>