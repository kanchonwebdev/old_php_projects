<?php 
	session_start();
	if ($_SESSION["name"] == "" || $_SESSION["name"] == null) {
		header("Location: adminLogin.php");
	}
	error_reporting(0);
 ?>

<?php include 'inc/header.php'; ?>
<?php include 'lib/AdminHandleCode.php'; ?>
<div class="row">
	<div class="well text-center">
		<h4 class="text-center">ONLINE MOBILE STORE</h4><br>
		<h5 class="text-center">THIS IS HOME PAGE</h5><br>
		<a href="admin.php">HOME PAGE</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="viewProduct.php">VIEW PRODUCT</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="viewOrder.php">VIEW ORDER</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logOut.php">LOG OUT</a>
	</div>

	<div class="well text-center">
		<div class="row">
			<div class="col-sm-1">
				<b>User ID</b>
			</div>

			<div class="col-sm-3">
				<b>Items</b>
			</div>

			<div class="col-sm-2">
				<b>Quantity</b>
			</div>

			<div class="col-sm-1">
				<b>Cost</b>
			</div>

			<div class="col-sm-1">
				<b>Total</b>
			</div>

			<div class="col-sm-2">
				<b>Make Of Payment</b>
			</div>

			<div class="col-sm-2">
				<b>Payment Id</b>
			</div>
		</div><br>

		<?php 
			$ad = new AdminApp();
			$perPage = 5;
			if (isset($_GET["p"])) {
				$page = $_GET["p"];
			}else{
				$page = 1;
			}

			$startFrom = ($page - 1) * $perPage;
			$viewOrderData = $ad->viewOrderMethod($startFrom, $perPage);
		 ?>

		 <?php 
				foreach ($viewOrderData as $data) {
			 ?>

		<div class="row text-center">

			<div class="col-sm-1">
				<span><?php echo $data["userId"]; ?></span>
			</div>

			<div class="col-sm-3">
				<span><?php echo $data["productName"]; ?></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $data["productQuantity"]; ?></span>
			</div>

			<div class="col-sm-1">
				<span><?php echo $data["productPrice"]; ?></span>
			</div>

			<div class="col-sm-1">
				<span><?php echo $data["total"]; ?></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $data["paymentMethod"]; ?></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $data["payment_id"]; ?></span>
			</div>
		</div> <br><br>
		<?php } ?>



		<?php 
			$countId = $ad->countViewOrderId();
			$totalData = ceil($countId / 5);
		 ?>

		<div class="row">
			<ul class="pagination">
				<?php 
					for ($i=1; $i <= $totalData; $i++) {
				 ?>
			  <li><a href="viewOrder.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>