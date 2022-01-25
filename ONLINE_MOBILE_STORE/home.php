<?php session_start() ?>

<?php include 'inc/header.php'; ?>
<?php include 'lib/UserHandleCode.php'; ?>

<div class="row">
	<div class="well text-center">
		<h4 class="text-center">ONLINE MOBILE STORE</h4><br>
		<h5 class="text-center">THIS IS HOME PAGE</h5>
		<a href="home.php">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="makePayment.php">MAKE PAYMENT</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logOut.php">LOG OUT</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="home.php">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="userRegister.php">REGISTER HERE</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="userLogin.php">LOGIN HERE</a>&nbsp;&nbsp;&nbsp;&nbsp;
	</div>


	<div class="well">
		<div class="row">
			<div class="col-sm-3">
		  	  <div class="list-group">
			    <a href="#" class="list-group-item active">CATEGORY NAME</a>
			    <a href="#" class="list-group-item">SAMSUNG</a>
			    <a href="#" class="list-group-item">SYMPHONY</a>
			    <a href="#" class="list-group-item">NOKIA</a>
			  </div>
		   </div>
		   <?php
			    $per_page = 10;
			    if(isset($_GET['p']))
			    {
			        $page = $_GET['p'];
			    }
			    else
			    {
			        $page = 1;
			    }

			    $start_form = ($page - 1) * $per_page;
			?>


		   <?php 
		   	//select all product
		   	$usr = new UserApp();
		   	$usrData = $usr->selectAllProduct($start_form, $per_page);
		   ?>

		   <div class="col-sm-9">
		   	<?php 
		   		foreach ($usrData as $data) {
		   	?>
		   		<div class="col-sm-4 text-center">
		   			<img src="admin/images/<?php echo $data['productImage']; ?>" style="max-width:150px;" height="200px"><br>
		   			<b><a href="addCart.php?cart=<?php echo $data["id"]; ?>"><?php echo $data['productName']; ?></a></b><br>
		   			<b><?php echo $data['productPrice']; ?></b>
		   		</div>

		   	<?php } ?>
		   </div>

		</div>


		<div class="row">
			<?php 
		   		$countId = $usr->countID();
		   		$totalPage = ceil($usr->countID() / $per_page);
		   	?>
			<div class="col-sm-* text-center">
				<?php if ($totalPage < 10){ ?>
				<ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <?php
                       
                            for($i=1; $i<= $totalPage; $i++)
                            {
                    ?>
                            <li class="page-item"><a class="page-link" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php }  ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
               <?php } ?>
			</div>
		</div>

	</div>
</div>

<?php include 'inc/footer.php'; ?>