<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	error_reporting(0);
	$regUsr = new UserApp();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userId = $_POST['userId'];
		$userName = $_POST['userName'];
		$address = $_POST['address'];
		$phoneNumber = $_POST['phoneNumber'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$confirmPass = $_POST['confirmPass'];

		$userReg = $regUsr->userRegister($userId,$userName,$address,$phoneNumber,$email,$pass,$confirmPass);
		
	}
	
?>



<?php include 'inc/header.php'; ?>

<div class="row">
	<div class="well text-center">
		<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4>
		<h4><i>User Registration Form</i></h4>
	</div>

	<?php 
		if (isset($userReg)) {
			echo $userReg;
		}
	?>

	<div class="well">
		<form method="post" action="">
			<div class="form-group">
				<input type="text" name="userId" placeholder="Enter Your Id" class="form-control" value="<?php echo $userId; ?>">
			</div>

			<div class="form-group">
				<input type="text" name="userName" placeholder="Enter Your Name" class="form-control" value="<?php echo $userName; ?>">
			</div>

			<div class="form-group">
				<textarea class="form-control" name="address" cols="20" rows="5" placeholder="Enter Your Address"><?php echo $address; ?></textarea>
			</div>

			<div class="form-group">
				<input type="text" name="phoneNumber" placeholder="Enter Your Phone Number" class="form-control" value="<?php echo $phoneNumber; ?>">
			</div>

			<div class="form-group">
				<input type="text" name="email" placeholder="Enter Your Email" class="form-control" value="<?php echo $email; ?>">
			</div>

			<div class="form-group">
				<input type="password" name="pass" placeholder="Enter Your Password" class="form-control" value="<?php echo $pass; ?>">
			</div>

			<div class="form-group">
				<input type="password" name="confirmPass" placeholder="Confirm Your Password" class="form-control" value="<?php echo $confirmPass; ?>">
			</div>

			<div class="form-group">
				<input type="submit" value="REGISTER" class="btn btn-success">
				<a href="userLogIn.php" class="btn btn-info">LOG IN</a>
			</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>