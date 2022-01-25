<?php session_start(); ?>
<?php include 'inc/header.php'; ?>

<div class="row" style="margin-top: 10%;">
	<div class="well col-sm-4 col-sm-offset-4 text-center">
		<h4>ADMIN LOGIN</h4>
	</div>
	



	<div class="well col-sm-4 col-sm-offset-4">
		<?php 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $_POST["adminName"];
				$password = $_POST["adminPass"];

				if ($name == "admin" && $password == "123") {
					$_SESSION["name"] = $name;
					header("Location: admin.php");
				}else{
		?>
		
		<div class="alert alert-warning">
			Login Failed...
		</div>


		<?php } } ?>
		

		<form method="post" action="">
			<div class="form-group">
				<input type="text" name="adminName" placeholder="ADMIN NAME" class="form-control" required="1">
			</div>

			<div class="form-group">
				<input type="password" name="adminPass" placeholder="ADMIN PASSWORD" class="form-control" required="1">
			</div>

			<div class="form-group">
				<input type="submit" value="LOGIN" class="btn btn-success">&nbsp;&nbsp;
			</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>