<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>

<?php include 'inc/header.php'; ?>


<div class="row">
	<div class="well text-center">
		<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4>
		<a href="addBooking.php">ADD BOOKING</a>&nbsp;&nbsp;
		<a href="newBooking.php">NEW BOOKING</a>&nbsp;&nbsp;
		<a href="viewBooking.php">VIEW BOOKING</a>&nbsp;&nbsp;
		<a href="viewVenus.php">VIEW VENUES</a>&nbsp;&nbsp;
		<a href="viewFeedback.php">VIEW FEEDBACK</a>&nbsp;&nbsp;
		<a href="logOut.php">LOG OUT</a>&nbsp;&nbsp;
	</div>


	<div class="well">
		<table class="table">
			<thead>
				<tr>
					<td>SELECT FUNCTION TYPE</td>
					<td colspan="7">
						<form>
							<div class="form-group">
								<select class="form-control" id="showVenueJs" name="showVenueJs" onchange ="showVenueFunc()">
									<option>--SELECT FUNCTION TYPE--</option>
									<option value="BIRTHDAY_PARTY">BIRTHDAY_PARTY</option>
									<option value="MARRIAGE_FUNCTION">MARRIAGE_FUNCTION</option>
									<option value="ANNUAL_MARRIAGE_CEREMONY">ANNUAL_MARRIAGE_CEREMONY</option>
									<option value="SUCCESS_PARTY">SUCCESS_PARTY</option>
								</select>
							</div>
						</form>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>VENUE NAME</th>
					<th>VENUE ADDRESS</th>
					<th>VENUE PHONE NUMBER</th>
					<th>CAPACITY</th>
					<th>PREFERRED</th>
					<th>AMOUNT</th>
					<th>VENUE IMAGE</th>
				</tr>
			</tbody>
		</table>
		<span id="venue1">
			
		</span>
	</div>
</div>


<script type="text/javascript">
	function showVenueFunc() {
		var showVenueJsVar = document.getElementById('showVenueJs').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
		   document.getElementById("venue1").innerHTML = this.responseText;
		  }
		};
		 xhttp.open("POST","showVenues.php?showVenueJsVar="+showVenueJsVar,true);
		 xhttp.send();
	}

</script>


<?php include 'inc/footer.php'; ?>