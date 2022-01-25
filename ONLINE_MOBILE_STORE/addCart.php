<?php session_start() ?>

<?php 
	if ($_SESSION["userId"] == "" || $_SESSION["userId"] == null) {
		header("Location: userLogin.php");
	} 

?>
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
	</div>
	

	<?php 
		$usr = new UserApp();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$productName = $_POST["productName"];
			$productImage = "productImage";
			$productPrice = $_POST["productPrice"];
			$productDes = $_POST["productDes"];
			$productQuantity = $_POST["productQuantity"];
			$sessionId = session_id();
			$userId = $_SESSION["userId"];
			$insertData = $usr->addCartData($productName,$productImage,$productPrice,$productDes,$productQuantity,$sessionId,$userId);

		}
	 ?>

	 <?php 
		 
		$cartId = $_GET['cart'];
		$selectProduct = $usr->selectProductById($cartId);
		$data = $selectProduct->fetch_assoc();
	?>

	<div class="well">
		<h4 class="text-center">THIS IS BUY PRODUCT PAGE</h4><br>
		<?php 
			if (isset($insertData)) {
				echo $insertData;
			}
		?>
		<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT NAME</b>
			</div>

			<div class="col-sm-6">
				<span><?php echo $data['productName']; ?></span>
				<input type="hidden" name="productName" class="form-control" readonly="" value="<?php echo $data['productName']; ?>">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT IMAGE</b>
			</div>

			<div class="col-sm-6">
				<img src="admin/images/<?php echo $data['productImage']; ?>" width="250px" height="250px" id="preimage">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT PRICE</b>
			</div>

			<div class="col-sm-6">
				<span><?php echo $data['productPrice']; ?></span>
				<input type="hidden" name="productPrice" class="form-control" readonly="" value="<?php echo $data['productPrice']; ?>">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT DESCRIPTION</b>
			</div>

			<div class="col-sm-6">
				<span><?php echo $data['productDes']; ?></span>
				<input type="hidden" name="productDes" class="form-control" value="<?php echo $data['productDes']; ?>">
			</div>
		</div><br>


		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT QUANTITY</b>
			</div>

			<div class="col-sm-6">
				<input type="text" name="productQuantity" class="form-control" maxlength="2" required="">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				
			</div>

			<div class="col-sm-6">
				<input type="submit" class="btn btn-info" value="BUY">
			</div>
		</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>

