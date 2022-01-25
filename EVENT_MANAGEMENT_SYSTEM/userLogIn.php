
<?php include 'inc/header.php'; ?>

<div class="row col-sm-4 col-sm-offset-4" style="margin-top: 10%;">
	<div class="well text-center">
		<h4>USER LOGIN</h4>
	</div>

	<div class="well">
		<form method="post" action="userLoginCode.php">
			<div class="form-group">
				<input type="text" name="userId" class="form-control" placeholder="Enter Your User ID" required="">
			</div>

			<div class="form-group">
				<input type="password" name="userPass" class="form-control" placeholder="Enter Your User Pasword" required="">
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success" value="LOGIN">
				<a href="userRegistration.php">New User? Please Register Here</a>
			</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>