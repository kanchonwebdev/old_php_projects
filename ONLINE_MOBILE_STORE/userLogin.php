<?php include 'inc/header.php'; ?>

<div class="row" style="margin-top: 10%;">
	<div class="well col-sm-4 col-sm-offset-4 text-center">
		<h4>USER LOGIN</h4>
	</div>

	<div class="well col-sm-4 col-sm-offset-4">
		
		<form method="post" action="logInCode.php">
			<div class="form-group">
				<input type="text" name="userId" placeholder="USER ID" class="form-control" required="1">
			</div>

			<div class="form-group">
				<input type="password" name="userPass" placeholder="USER PASSWORD" class="form-control" required="1">
			</div>

			<div class="form-group">
				<input type="submit" value="LOGIN" class="btn btn-success">&nbsp;&nbsp;
			</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>