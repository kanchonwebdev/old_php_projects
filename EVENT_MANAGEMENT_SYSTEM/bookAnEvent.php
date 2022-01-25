<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>


<?php include 'inc/header.php'; ?>
<?php include 'lib/UserHandleCode.php'; ?>
<div class="row">
	<div class="well text-center">
		<div class="well text-center">
			<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4><br>
			<a href="home.php">MY DETAILS</a>&nbsp;&nbsp;&nbsp;
			<a href="bookAnEvent.php">BOOK AN EVENT</a>&nbsp;&nbsp;&nbsp;
			<a href="bookingStatus.php">BOOKING STATUS</a>&nbsp;&nbsp;&nbsp;
			<a href="bookingHistory.php">BOOKING HISTORY</a>&nbsp;&nbsp;&nbsp;
			<a href="giveFeedback.php">FEEDBACK</a>&nbsp;&nbsp;&nbsp;
			<a href="viewVenue.php">VIEW VENUE</a>&nbsp;&nbsp;&nbsp;
			<a href="logOut.php">LOG OUT</a>
		</div>
	</div>


	<div class="well">
		 <h4 class="text-center" style="color: red;">THIS IS ADD BOOKING PAGE</h4><br>
		 <table class="table">
		 	<tr>
		 		<td>VENUE TYPE</td>
		 		<td>
		 			<form>
		 				<div class="form-group" onchange="loadVenue()">
		 					<select name="venueName" class="form-control" id="venueG">
		 						<option>--SELECT VENUE TYPE--</option>
		 						<option value="birthday_party">BIRTHDAY PARTY</option>
		 						<option value="marriage_function">MARRIAGE FUNCTION</option>
		 					</select>
		 				</div>
		 			</form>
		 		</td>
		 	</tr>
		 </table>



		 <div class="well row" id="m_venue" style="display: none;" >
		 	<div class="col-sm-2">
			 	VENUE NAME
			 </div>

			 <div class="col-sm-10">
			 	<form>
					<select class="form-control" id="mm_venue" onchange="nothingShow(this.value)">
						<option value="Nothing">--SELECT MARRIAGE VENUE NAME--</option>
						<?php 
							$usrVenue = new UserApp();
							$usrMarVen = $usrVenue->getMarVen();
						?>

						<?php while ($data = $usrMarVen->fetch_assoc()) { ?>
						<option value="<?php echo $data['venu_name']; ?>" ><?php echo $data['venu_name']; ?></option>
						<?php } ?>
					</select>
				</form>
			 </div>
		 </div>



		 <div class="well row" id="b_venue" style="display: none;" >
		 	<div class="col-sm-2">
			 	VENUE NAME
			 </div>

			 <div class="col-sm-10">
			 	<form>
					<div class="form-group">
	 					<select class="form-control" id="bb_venue" name="mmm_venue" onchange="nothingShow(this.value)">
	 						<?php 
	 							$usrBarVen = $usrVenue->getBarVen();
	 							
	 						?>
	 						<option value="Nothing">--SELECT BIRTHDAY VENUE NAME--</option>
	 						<?php while ($BarData = $usrBarVen->fetch_assoc()) { ?>
	 							<option value="<?php echo $BarData['venu_name']; ?>"><?php echo $BarData['venu_name']; ?></option>
	 							<?php } ?>
	 					</select>
	 				</div>
				</form>
			 </div>
		 </div>


		 <div class="well" id="demo">
		 	
		 </div>

		 <form action="bookinCode.php" method="post">
		 	<input type="hidden" name="userId" value="<?php echo $_SESSION['userID']; ?>">

		 	<div class="form-group">
		 		<input type="text" name="venu_name" placeholder="Enter Venue Name" class="form-control" required="1">
		 	</div>

		 	<div class="form-group">
		 		<input type="text" name="venu_address" placeholder="Enter Venue Address" class="form-control" required="1">
		 	</div>

		 	<!--quipment enteitaiment-->
		 	<div class="form-group text-center">
		 		<h4 class="text-center">ENTERTAINMENT QUIPMENT</h4><br>
		 		<input type="checkbox" id="dj" value="DJ" name="dj">
		 		<label for="dj">DJ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 		
		 		<input type="checkbox" id="stage" value="STAGE" name="stage">
		 		<label for="stage">STAGE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 		
		 		<input type="checkbox" id="mike" value="MIKE & SPEAKER" name="mike">
		 		<label for="mike">MIKE & SPEAKER</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 	</div><br><br>


		 	<div class="form-group text-center">
		 		<h4 class="text-center">FOOD TYPE</h4><br>
		 		<input type="checkbox" id="brekFast" value="BreakFast" onclick ="brekFastMenuShow()">
		 		<label for="brekFast">BREAKFAST</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		 		<input type="checkbox" id="tea" value="Tea & Snack" onclick ="teaMenuShow()">
		 		<label for="tea">TEA & SNACK</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		 		<input type="checkbox" id="lunch" value="Lunch" onclick ="lunchMenuShow()">
		 		<label for="lunch">LUNCH</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		 		<input type="checkbox" id="dinner" value="Dinner" onclick ="dinnerMenuShow()">
		 		<label for="dinner">DINNER</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 	</div>

		 	<div class="form-group text-center">
		 		<label for="veg">VEG FOOD</label>
		 		<input type="radio" id="veg" value="VEGITABLE" name="food">

		 		<label for="nonVeg">NON VEG FOOD</label>
		 		<input type="radio" id="nonVeg" value="NON VEGITABLE" name="food">

		 	</div>

		 	<div class="form-group col-sm-6 col-sm-offset-3" id="breakfastMenuId" style="display: none;">
		 		<select class="form-control" name="brekFastMenuValue">
		 			<option value="Nothing">--SELECT BREAKFAST TYPE--</option>
			 		<option value="Normal">NORMAL</option>
			 		<option value="Deluxe">DELUXE</option>
			 		<option value="Royal">ROYAL</option>
		 		</select>
		 	</div>

		 	<div class="form-group col-sm-6 col-sm-offset-3" id="teaMenuId" style="display: none;">
		 		<select class="form-control" name="teaMenuValue">
		 			<option value="Nothing">--SELECT TEA & SNACK TYPE--</option>
			 		<option value="Normal">NORMAL</option>
			 		<option value="Deluxe">DELUXE</option>
			 		<option value="Royal">ROYAL</option>
		 		</select>
		 	</div>


		 	<div class="form-group col-sm-6 col-sm-offset-3" id="lunchMenuId" style="display: none;">
		 		<select class="form-control" name="lunchMenuValue">
		 			<option value="Nothing">--SELECT LUNCH TYPE--</option>
			 		<option value="Normal">NORMAL</option>
			 		<option value="Deluxe">DELUXE</option>
			 		<option value="Royal">ROYAL</option>
		 		</select>
		 	</div>

		 	<div class="form-group col-sm-6 col-sm-offset-3" id="dinnerMenuId" style="display: none;">
		 		<select class="form-control" name="dinnerMenuValue">
		 			<option value="Nothing">--SELECT DINNER TYPE--</option>
			 		<option value="Normal">NORMAL</option>
			 		<option value="Deluxe">DELUXE</option>
			 		<option value="Royal">ROYAL</option>
		 		</select>
		 	</div>



		 	<div class="form-group">
		 		<input type="text" name="booking_id" id="booking_id" class="form-control" placeholder="Enter Booking Id" required="1">
		 	</div>

		 	<div class="form-group">
		 		<input type="date" name="booking_date" id="booking_date" class="form-control" required="1">
		 	</div>

		 	<div class="form-group">
		 		<input type="text" name="total_guest" id="total_guest" class="form-control" placeholder="How Much Your Total Guest?" required="1">
		 	</div>

		 	<div class="form-group">
		 		<input type="submit" value="BBOK AN EVENT" class="btn btn-success">
		 	</div>
		 </form>
		 
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function(){
		$('#mm_venue').change(function(){
			var mm_venue = $('#mm_venue').val();
			$.ajax({
				url : "checkVenueAvaiableCode.php",
				type : "POST",
				data : {mm_venue : mm_venue},
				datatype : "text",
				success : function(data){
					$('#demo').html(data);
				}
			});
		});




		$('#bb_venue').change(function(){
			var bb_venue = $('#bb_venue').val();
			$.ajax({
				url : "checkVenueAvaiableCode.php",
				type : "POST",
				data : {bb_venue : bb_venue},
				datatype : "text",
				success : function(data){
					$('#demo').html(data);
				}
			});
		});

	});



	function nothingShow(noValue){
		if (noValue == "Nothing") {
			document.getElementById("demo").style.display = "none";
		}else{
			document.getElementById("demo").style.display = "block";
		}
	}


	

	function loadVenue(){
		var venueG = document.getElementById("venueG").value;

		if (venueG == "birthday_party") {
			document.getElementById("m_venue").style.display = "none";
			document.getElementById("b_venue").style.display = "block";
		}else if (venueG == "marriage_function") {
			document.getElementById("m_venue").style.display = "block";
			document.getElementById("b_venue").style.display = "none";
		}
	}


	function brekFastMenuShow(){
		var brekFastMenu = document.getElementById("brekFast").value;
		var brekFastMenu2 = document.getElementById("brekFast");

		if (brekFastMenu2.checked) {
			if (brekFastMenu == "BreakFast") {
				document.getElementById("breakfastMenuId").style.display = "block";
			}
		}else{
			document.getElementById("breakfastMenuId").style.display = "none";
		}
	}



	


	function teaMenuShow(){

		var tea = document.getElementById("tea").value;
		var tea2 = document.getElementById("tea");

		if (tea2.checked) {
			if (tea == "Tea & Snack") {
				document.getElementById("teaMenuId").style.display = "block";
			}
		}else{
			document.getElementById("teaMenuId").style.display = "none";
		}
	}

	function lunchMenuShow(){

		var lunch = document.getElementById("lunch").value;
		var lunch2 = document.getElementById("lunch");

		if (lunch2.checked) {
			if (lunch == "Lunch") {
				document.getElementById("lunchMenuId").style.display = "block";
			}
		}else{
			document.getElementById("lunchMenuId").style.display = "none";
		}
	}


	function dinnerMenuShow(){

		var dinner = document.getElementById("dinner").value;
		var dinner2 = document.getElementById("dinner");


		if (dinner2.checked) {
			if (dinner == "Dinner") {
				document.getElementById("dinnerMenuId").style.display = "block";
			}
		}else{
			document.getElementById("dinnerMenuId").style.display = "none";
		}
	}

</script>


<?php include 'inc/footer.php'; ?>