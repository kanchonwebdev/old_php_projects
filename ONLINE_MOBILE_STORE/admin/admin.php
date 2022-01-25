<?php 
	session_start();
	if ($_SESSION["name"] == "" || $_SESSION["name"] == null) {
		header("Location: adminLogin.php");
	}
 ?>
 
<?php include 'inc/header.php'; ?>

<?php include 'lib/AdminHandleCode.php'; ?>

<?php 
	$ad = new AdminApp();
	error_reporting(0);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$upload_file = "images/";
		$productName = $_POST["productName"];
		$productImageName = $_FILES["productImage"]["name"];
		$productImageTmpName = $_FILES["productImage"]["tmp_name"];
		$productImageSize = $_FILES["productImage"]["size"];
		$productPrice = $_POST["productPrice"];
		$productDes = $_POST["productDes"];
		if ($productName == "") {
			$productNameErr = "Product name empty";
		}else{
			$productNameErr ="";
		}

		if ($productImageName == "") {
			$productImageErr = "Product Image empty";
		}else{
			$productImageErr ="";
		}

		if ($productPrice == "") {
			$productPriceErr = "Product Price empty";
		}else{
			$productPriceErr ="";
		}

		if ($productDes == "") {
			$productDesErr = "Product DESCRIPTION empty";
		}else{
			$productDesErr ="";
		}
		if ($productName != "" && $productImageName != "" && $productPrice != "" && $productDes != "") {
			move_uploaded_file($productImageTmpName, $upload_file.$productImageName);
		$productData = $ad->productInsertMethod($productName,$productImageName,$productPrice,$productDes);
		}
		
	}
?>

<div class="row">
	<div class="well text-center">
		<h4 class="text-center">ONLINE MOBILE STORE</h4><br>
		<h5 class="text-center">THIS IS HOME PAGE</h5><br>
		<a href="admin.php">HOME PAGE</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="viewProduct.php">VIEW PRODUCT</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="viewOrder.php">VIEW ORDER</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logOut.php">LOG OUT</a>
	</div>
	<?php
	 if (isset($productData)) {
			echo $productData;
		}
		 ?>

	<div class="well">
		<form method="post" action="" enctype="multipart/form-data">
			
		
		<h4 class="text-center">THIS IS ADD PRODUCT PAGE</h4><br>
		<div id="demo"></div>
		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT NAME</b>
			</div>

			<div class="col-sm-6">
				<input type="text" name="productName" class="form-control" value="<?php echo $productName; ?>">
				<span id="errMsg1" style="color: red;"><?php echo $productNameErr; ?></span>
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT IMAGE</b>
			</div>

			<div class="col-sm-6">
				<input type="file" onchange="loadFile(event)" name="productImage" class="form-control">
				<span id="errMsg2" style="color: red;"><?php echo $productImageErr; ?></span><br>
				<img width="250px" height="250px" id="preimage">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT PRICE</b>
			</div>

			<div class="col-sm-6">
				<input type="text" name="productPrice" class="form-control" value="<?php echo $productPrice; ?>">
				<span id="errMsg3" style="color: red;"><?php echo $productPriceErr; ?></span>
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				<b>PRODUCT DESCRIPTION</b>
			</div>

			<div class="col-sm-6">
				<textarea class="form-control" rows="5" cols="20" name="productDes"><?php echo $productDes; ?></textarea>
				<span id="errMsg4" style="color: red;"><?php echo $productDesErr; ?></span>
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-4 text-right">
				
			</div>

			<div class="col-sm-6">
				<input type="submit" class="btn btn-info" value="GO">
			</div>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	function loadFile(event){
		var output = document.getElementById("preimage");
		output.src = URL.createObjectURL(event.target.files[0]);
		document.getElementById('errMsg2').innerHTML = "";
	}
</script>


<?php include 'inc/footer.php'; ?>