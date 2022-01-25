<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
	error_reporting(0);
?>

<?php include'lib/AdminHandleCode.php'; ?>
<?php include 'inc/header.php'; ?>

<div class="row">
	<div class="well text-center">
		<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4> <br>
		<a href="addBooking.php">ADD BOOKING</a>&nbsp;&nbsp;
	    <a href="newBooking.php">NEW BOOKING</a>&nbsp;&nbsp;
	    <a href="viewBooking.php">VIEW BOOKING</a>&nbsp;&nbsp;
	    <a href="viewVenus.php">VIEW VENUS</a>&nbsp;&nbsp;
	    <a href="logOut.php">LOG OUT</a><br><br><br>
	</div>


	<div class="well">
		<form class="row">
			<div class="form-group col-sm-*">
				<input type="text" name="id_name" placeholder="Enter Booking Id" class="form-control" onkeyup ="showHint(this.value)">
			</div>
		</form>

		<span id="demo">
			
		</span>
	</div>


	<div class="well">
		<h4 class="text-center" style="color: red">ALL BOOKING RECORD</h4><br>

		<table class="table table-hover">
			<tr>
				<th>B_ID</th>
				<th>GUEST</th>
				<th>EVENT</th>
				<th>PLACE</th>
				<th>DATE</th>
				<th>E_EQUIPMENT</th>
				<th>F_TYPE</th>
				<th>BREAKFAST</th>
				<th>LUNCH</th>
				<th>SNACK</th>
				<th>DINNER</th>
				<th>STATUS</th>
			</tr>

			<?php 
				$ad = new AdminApp();
				$newBooking = $ad->newBookingMethod3();
				foreach ($newBooking as $data) {
			?>

			<tr>
				<td><?php echo $data['booking_id']; ?></td>
				<td><?php echo $data['guest_number']; ?></td>
				<td><?php echo $data['venu_name']; ?></td>
				<td><?php echo $data['venu_address']; ?></td>
				<td><?php echo $data['booking_date']; ?></td>
				<td><?php echo $data['dj']; ?> <?php echo $data['stage']; ?> <?php echo $data['mike']; ?></td>
				<td><?php echo $data['food_type']; ?></td>
				<td><?php echo $data['breakfast']; ?></td>
				<td><?php echo $data['lunch']; ?></td>
				<td><?php echo $data['tea_&_snack']; ?></td>
				<td><?php echo $data['dinner']; ?></td>
				<td><?php echo $data['booking_status']; ?></td>
			</tr>

			<?php } ?>
		</table>


		<div class="text-center">
			<ul class="pagination">
				<li><a href="#">PRE</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">NEXT</a></li>
			</ul>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	function showHint(str){
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "searchOption.php?q=" + str, true);
        xmlhttp.send();
	}
</script>

 <?php include 'inc/footer.php'; ?>