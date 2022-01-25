<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "php_event_management";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$adminName = $_POST['adminName'];
		$adminPass = $_POST['adminPass'];
		

		$sql = "SELECT * FROM `tbl_admin_login` WHERE admin_name = '$adminName' AND admin_password = '$adminPass'";
		$result = $conn->query($sql);


		$_SESSION['adminName'] = $adminName;
		
		if ($result->num_rows > 0) {
			header("Location: admin.php");
		}else{
			
			header("Location: logIn.php");
		}
	}

?>

<?php include "inc/header.php"; ?>

	<div class="row col-sm-4 col-sm-offset-4" style="margin-top: 10%">
		<div class="well text-center">
			<h4>ADMIN LOGIN AREA</h4>
		</div>

		<div class="well">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="form-group">
					<input type="text" name="adminName" placeholder="Enter Admin Name" class="form-control">
					 <span></span>
				</div>

				<div class="form-group">
					<input type="password" name="adminPass" placeholder="Enter Admin Password" class="form-control">
					<span></span>
				</div>

				<div class="form-group">
					<input type="submit" value="LOG IN" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>

<?php include "inc/footer.php"; ?>



