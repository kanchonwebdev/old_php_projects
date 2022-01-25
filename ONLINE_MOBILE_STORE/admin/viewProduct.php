<?php 
	session_start();
	if ($_SESSION["name"] == "" || $_SESSION["name"] == null) {
		header("Location: adminLogin.php");
	}
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

	<div class="well">
		<div class="row">
			<div class="col-sm-1">
				<b>S.L.</b>
			</div>

			<div class="col-sm-2">
				<b>PRODUCT NAME</b>
			</div>

			<div class="col-sm-3">
				<b>PRODUCT IMAGE</b>
			</div>

			<div class="col-sm-2">
				<b>PRODUCT PRICE</b>
			</div>

			<div class="col-sm-3">
				<b>PRODUCT DESCRIPTION</b>
			</div>

			<div class="col-sm-1">
				<b>VIEW</b>
			</div>
		</div><br>
		<?php 
			$perPage = 10;
			if (isset($_GET["p"])) {
				$page = $_GET["p"];
			}else{
				$page = 1;
			}

			$startFrom = ($page - 1) * $perPage;
		 ?>

		<?php  
			error_reporting(0);
			$ad = new AdminApp();
			$data = $ad->selectAllProduct($startFrom,$perPage);
			$i = 1;
			if (isset($data)) {
				while ( $result = $data->fetch_assoc()) {
		?>

		<div class="row">
			<div class="col-sm-1">
				<span><?php echo $i++; ?></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $result["productName"]; ?></span>
			</div>

			<div class="col-sm-3">
				<span><img height="150px" width="150px" src="images/<?php echo $result["productImage"]; ?>"></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $result["productPrice"]; ?></span>
			</div>

			<div class="col-sm-3">
				<span><?php echo $result["productDes"]; ?></span>
			</div>

			<div class="col-sm-1">
				<a href="viewSingleProduct.php?id=<?php echo $result["id"] ?>" class="btn btn-info">VIEW</a>
			</div>
		</div><br>
		<?php } } ?>



		<div class="row text-center">
			<?php 
				$countId = $ad->countID();
				$totalPage = ceil($countId / 10);
			?>
			<div class="col-sm-*">
				<ul class="pagination">
					<?php 
						for($i = 1; $i <= $totalPage; $i++){
					?>
					<li class="page-item"><a href="viewProduct.php?p=<?php echo $i; ?>" class="link-item"><?php echo $i; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>