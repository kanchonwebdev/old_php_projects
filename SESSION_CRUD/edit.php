<?php 
  session_start();
  include 'header.php';
  if (isset($_GET['id'])) 
  {
  	if (array_key_exists('data', $_SESSION) AND !empty($_SESSION['data'])) 
	  {
	  	$getData = $_SESSION['data'][$_GET['id']];
	  }
	  $_SESSION['id'] = $_GET['id'];
  }
  else
  {
  	header('Location: home.php');
  }
?>


  <div class="well text-center">
  	<form action="update.php" method="post">
  		<div class="form-group">
  			<input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $getData['name']; ?>">
  		</div>

  		<div class="form-group text-left">
  			<?php
  				if ($getData['gender'] == "Male") {
  			?>
  			<input type="radio" checked="checked" name="gender" value="Male">Male
  			<?php
  				}else{
  			?>
  			<input type="radio" name="gender" value="Male">Male
  		    <?php } ?>

  		    <?php
  				if ($getData['gender'] == "Female") {
  			?>
  			<input type="radio" checked="checked" name="gender" value="Female">Female
  			<?php
  				}else{
  			?>
  			<input type="radio" name="gender" value="Female">Female
  		    <?php } ?>
  		</div>

  		<div class="form-group">
  			<input class="form-control" type="text" name="email" placeholder="Enter Email" value="<?php echo $getData['email']; ?>">
  		</div>

  		<div class="form-group">
  			<input class="form-control" type="text" name="address" placeholder="Enter Address" value="<?php echo $getData['address']; ?>">
  		</div>

  		<div class="form-group">
  			<input class="btn btn-info" type="submit" name="update" value="Add">
  			<input class="btn btn-info" type="reset" name="name" value="Clear">
  		</div>
  	</form>
  </div>




<?php include 'footer.php'; ?>