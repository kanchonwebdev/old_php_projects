<?php 
  include 'header.php';
?>


  <div class="well text-center">
  	<form action="add.php" method="post">
  		<div class="form-group">
  			<input class="form-control" type="text" name="name" placeholder="Enter Name">
  		</div>

  		<div class="form-group text-left">
  			<input type="radio" name="gender" value="Male">Male
  			<input type="radio" name="gender" value="Female">Female
  		</div>

  		<div class="form-group">
  			<input class="form-control" type="text" name="email" placeholder="Enter Email">
  		</div>

  		<div class="form-group">
  			<input class="form-control" type="text" name="address" placeholder="Enter Address">
  		</div>

  		<div class="form-group">
  			<input class="btn btn-info" type="submit" name="create" value="Add">
  			<input class="btn btn-info" type="reset" name="name" value="Clear">
  		</div>
  	</form>
  </div>




<?php include 'footer.php'; ?>