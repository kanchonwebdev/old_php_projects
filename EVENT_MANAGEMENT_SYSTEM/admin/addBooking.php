
<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>
<?php include "inc/header.php"; ?>

<div class="row">
	<div class="well text-center">
		<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4><br>
		<!--this is header -->
	    <a href="addBooking.php">ADD BOOKING</a>&nbsp;&nbsp;
	    <a href="newBooking.php">NEW BOOKING</a>&nbsp;&nbsp;
	    <a href="viewBooking.php">VIEW BOOKING</a>&nbsp;&nbsp;
	    <a href="viewVenus.php">VIEW VENUS</a>&nbsp;&nbsp;
	    <a href="logOut.php">LOG OUT</a><br><br><br>
	   <!--end header-->
	</div>

	

	<?php
		include 'lib/AdminHandleCode.php';

		$adminApp = new AdminApp();
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$venu_name = $_POST['venu_name'];
			$venu_address = $_POST['venu_address'];
			$venu_phone_number = $_POST['venu_phone_number'];
			$capacity = $_POST['capacity'];
			$preferred = $_POST['preferred'];
			$amount = $_POST['amount'];
			$upload_file = "images/";
			$upload_filed = "images/".$venu_name;
			//image uploading
			$venu_image_name = $_FILES['file']['name'];
			$venu_image_size = $_FILES['file']['size'];
			$venu_image_tmp_name = $_FILES['file']['tmp_name'];
			move_uploaded_file($venu_image_tmp_name, $upload_file.$venu_image_name);
			$adminBookingInsert = $adminApp->adminBookingDataInsert($venu_name,$venu_address,$venu_phone_number,$capacity,$preferred,$amount,$venu_image_name);
			
				
			
		}
	?>



	<div class="well">
	   <h4 class="text-center">THIS ADD BOOKING PAGE</h4><br><br>

	   <span id="showData"></span>

	   <form method="post" action="addBooking.php" enctype="multipart/form-data">

	   	<div class="form-group">
	   		<input type="text" id="venu_name" name="venu_name" placeholder="Enter Venue Name" class="form-control" required="1">
	   		<span id="errMsg1" style="color: red;"></span>
	   	</div>

	   	<div class="form-group">
	   		<input type="text" id="venu_address" name="venu_address" placeholder="Enter Venue Address" class="form-control" required="1">
	   		<span id="errMsg2"></span>
	   	</div>

	   	<div class="form-group">
	   		<input type="text" id="venu_phone_number" name="venu_phone_number" placeholder="Enter Venue Phone Number" class="form-control" required="1">
	   		<span id="errMsg3"></span>
	   	</div>

	   	<div class="form-group">
	   		<input type="text" id="capacity" name="capacity" placeholder="Enter Venue Capacity" class="form-control" required="1">
	   		<span id="errMsg4"></span>
	   	</div>

	   	<div class="form-group">
	   		<select class="form-control" id="preferred" name="preferred" required="1">
	   			<option value="nothing">--PREFERRED FOR--</option>
	   			<option value="BIRTHDAY_PARTY">BIRTHDAY_PARTY</option>
				<option value="MARRIAGE_FUNCTION">MARRIAGE_FUNCTION</option>
				<option value="ANNUAL_MARRIAGE_CEREMONY">ANNUAL_MARRIAGE_CEREMONY</option>
				<option value="SUCCESS_PARTY">SUCCESS_PARTY</option>
	   		</select>
	   		<span id="errMsg5"></span>
	   	</div>

	   	<div class="form-group">
	   		<input type="text" id="amount" name="amount" placeholder="Enter Venue Total Amount" class="form-control" required="1">
	   		<span id="errMsg6"></span>
	   	</div>

	   	<div class="form-group">
	   		<input type="file" id="file" name="file" class="form-control" required="1">
	   		<span id="errMsg7"></span>
	   	</div>

	   	<div class="form-group">
	   		<input type="submit" value="SUBMIT" class="btn btn-success">
	   		<input type="reset" value="RESET" class="btn btn-info">
	   		<!--<span class="btn btn-success" id="addVenue">ADD</span>-->
	   </form>

	</div>
</div>


<!--
<script type="text/javascript">
	$(document).ready(function(){
		$('#addVenue').click(function(){
			var venu_name = $('#venu_name').val();
			var venu_address = $('#venu_address').val();
			var venu_phone_number = $('#venu_phone_number').val();
			var capacity = $('#capacity').val();
			var preferred = $('#preferred').val();
			var amount = $('#amount').val();
			
			var fd = new FormData();
			$.each($('#file')[0].files,function(i,file){
				fd.append('file', file);
			});

			$.ajax({
				url : "addBookingCode.php",
				method : "POST",
				processData : false,
				data : {
					venu_name : venu_name,
					venu_address : venu_address,
					venu_phone_number : venu_phone_number,
					capacity : capacity,
					preferred : preferred,
					amount : amount,
					fd
				},
				contentType : false,
				
				success : function(data){
					$('#showData').html(data)
				}
			});
		});
	});
</script>
-->
<?php include "inc/footer.php"; ?>