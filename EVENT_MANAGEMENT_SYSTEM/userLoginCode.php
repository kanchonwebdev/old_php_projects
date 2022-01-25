 <?php include 'inc/header.php'; ?>
 <?php
 	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "php_event_management";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$userId = $_POST['userId'];
	$userPass = $_POST['userPass'];
	

	$sql = "SELECT * FROM `tbl_user_register` WHERE userId = '$userId' AND pass = '$userPass' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION['userID'] = $userId;
	    header("Location: home.php");
	} else {
	    echo "<span style='margin-left:38%;'>WRONG USER ID and PASSWORD<span>"."<br><br><br>";
	    echo '<a href="userLogIn.php" style="top:40%;margin-left:40%;">PLEASE TRY AGAIN HERE.....</a>';
	}

	$conn->close();
?>
<?php include 'inc/footer.php'; ?>