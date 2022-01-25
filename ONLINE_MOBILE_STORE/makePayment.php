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
			<a href="home.php">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
	</div>

	<div class="well">
		<?php
			error_reporting(0); 
			$sessionID = session_id();
			$usr = new UserApp();
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$userId = $_POST["userId"];
				$items = $_POST["items"];
				$quantity = $_POST["quantity"];
				$cost = $_POST["cost"];
				$total = $_POST["total"];
				$paymentMethod = $_POST["paymentMethod"];
				$amount = $_POST["amount"];
				$paymentId = $_POST["paymentId"];


				$data = $usr->paymentMethod($userId,$items,$quantity,$cost,$total,$paymentMethod,$amount,$paymentId,$sessionID);
			}
			
		 ?>
		 <?php 
		 	if (isset($data)) {
		 		echo $data;
		 	}
		  ?>
		<div class="row text-center">
			<div class="col-sm-1">
				<b>User ID</b>
			</div>

			<div class="col-sm-3">
				<b>Items</b>
			</div>

			<div class="col-sm-2">
				<b>Quantity</b>
			</div>

			<div class="col-sm-2">
				<b>Cost</b>
			</div>

			<div class="col-sm-3">
				<b>Total</b>
			</div>
		</div><br>


		
			
		
		

		  <?php 
		  	 $userIds = $_SESSION["userId"];
		  	 $selectBuyItem = $usr->selectBuyItem($userIds,$sessionID);
		  	 $payData = 0;
		  	 foreach ($selectBuyItem as $buyData) {
		  ?>

		<form method="post" action="">
		<div class="row text-center">
			<div class="col-sm-1">
				<span><?php echo $buyData["userId"]; ?></span>
				<span><input type="hidden" name="userId" class="form-control" readonly="" value="<?php echo $buyData["userId"]; ?>"></span>
			</div>

			<div class="col-sm-3">
				<span><?php echo $buyData["productName"]; ?></span>
				<span><input type="hidden" name="items" class="form-control" readonly="" value="<?php echo $buyData["productName"]; ?>"></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $buyData["productQuantity"]; ?></span>
				<span><input type="hidden" name="quantity" class="form-control" readonly="" value="<?php echo $buyData["productQuantity"]; ?>"></span>
			</div>

			<div class="col-sm-2">
				<span><?php echo $buyData["productPrice"]; ?></span>
				<span><input type="hidden" name="cost" class="form-control" readonly="" value="<?php echo $buyData["productPrice"]; ?>"></span>
			</div>

			<div class="col-sm-3">
				<span><?php echo $data2 = ($buyData["productPrice"]) * ($buyData["productQuantity"]).'/=' ?></span>
				<span><input type="hidden" name="total" class="form-control" readonly="" value="<?php echo $data2 = ($buyData["productPrice"]) * ($buyData["productQuantity"]).'/=' ?>"></span>
			</div>
		</div><br><br>
		<?php 
			$payData = $data2 + $payData;
		 ?>
		<?php } ?>
		<hr style="border: 3px solid red;">
		<div class="row">
			<div class="col-sm-8 text-right"><h5><b>Total</b></h5></div>
			<div class="col-sm-4 text-center"><?php echo $payData; ?></div><br>
		</div>
		
		<h4 class="text-center">SELECT YOUR PAYMENT METHOD</h4><br>

		<div class="row">
			<div class="col-sm-6 text-center">
				<b>SELECT PAYMENT</b>
			</div>

			<div class="col-sm-6">
				<select class="form-control" name="paymentMethod">
					<option>SELECT PAYMENT METHOD</option>
					<option value="bKash">BKASH</option>
					<option value="DBBL">DBBL</option>
				</select>
			</div>
		</div><br>


		<div class="row">
			<div class="col-sm-6 text-center">
				<b>ENTER AMOUNT</b>
			</div>

			<div class="col-sm-6">
				<input type="text" name="amount" class="form-control">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-6 text-center">
				<b>ENTER PAYMENT ID</b>
			</div>

			<div class="col-sm-6">
				<input type="text" name="paymentId" class="form-control">
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-6 text-center">
			</div>

			<div class="col-sm-6">
				<input type="submit" value="PAYMENT" class="btn btn-info">
			</div>
		</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>