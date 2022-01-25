<?php include 'lib/UserHandleCode.php'; ?>
<?php include 'inc/header.php'; ?>
<?php $_SESSION["status"] = 10 ?>
<div class="row">
	<div class="panel panel-default">
		<header class="panel-body bg-info">
			<div class="col-sm-8">
				<h2 style="color:blue;"><a href="home.php" style="text-decoration:none">ROOM BOOKING SYSTEM</a></h2>
			</div>

			<div class="col-sm-4 text-right" style="margin-top:20px;font-size: 15px;">

				<?php
					if(isset($_SESSION['u_name']))
					{
				?>
				WELCOME <b><?php echo $_SESSION['u_name'] ?></b> <a href="logOut.php">LOGOUT</a>


				<?php }else{ ?>

				<a href="login.php">LOGIN</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="register.php">REGISTER</a>

				<?php } ?>
			</div>
		</header>
	</div>

	<?php
		$ur = new UserApp();
		$productData = $ur->showProduct();
	?>

	<div class="panel panel-default">
		<div class="panel-body bg-warning" style="padding-left:80px;">
		  <?php foreach($productData as $data){ ?>
			<div class="col-sm-4" style="margin-top:20px;">	
				<div id="container">
					<div id="overlay">
						<div id="text" height="250px" width="250px">
							GUEST CAPACITY = <?php echo $data['r_capacity']; ?>/-<br><br>
							TOTAL BED = <?php echo $data['r_bed_no']; ?>/-<br><br>
							<?php echo $data['r_name']; ?><br><br>
							PRICE = <?php echo $data['r_price']; ?>/-
						</div>
					</div>
					<img id="img" src="admin/images/<?php echo $data['r_image']; ?>" width="250px" height="250px" alt="demo image"><br>
				</div>

				<div class="btn btn-default" style="width:77%;font-weight:bold">
					<a href="viewRoom.php?id=<?php echo $data['id'] ?>">VIEW MORE DETALS</a>
				</div>
			</div>
          <?php } ?>
		</div>
	</div>


	<footer>
		<div class="panel panel-default">
			<div class="panel-body bg-info">
				<h5 class="text-center">&copy;2020 All rights reserved | Room Booking System</h5>
			</div>
		</div>
	</footer>


</div>

<?php include 'inc/footer.php'; ?>