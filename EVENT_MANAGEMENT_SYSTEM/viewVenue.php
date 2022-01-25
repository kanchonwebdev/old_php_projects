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
		 <h4 class="text-center" style="color: red;">THIS IS VIEW VENUE PAGE</h4><br>
		 <table class="table">
		 	<tr>
		 		<td>VENUE TYPE</td>
		 		<td>
		 			<form>
		 				<div class="form-group" onchange="loadVenue()">
		 					<select name="venueName" class="form-control" id="venueG">
		 						<option>--SELECT VENUE TYPE--</option>
		 						<option value="birthday_party">BirthDay Party</option>
		 						<option value="marriage_function">Marriage Function</option>
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
						<option value="nothing">--SELECT MARRIAGE VENUE NAME--</option>
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
	 					<select class="form-control" id="bb_venue" onchange="nothingShow(this.value)">
	 						<?php 
	 							$usrBarVen = $usrVenue->getBarVen();
	 						?>
	 						<option value="nothing">--SELECT BIRTHDAY VENUE NAME--</option>
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
		 

		 
	</div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		$('#mm_venue').change(function(){
			var mm_venue = $('#mm_venue').val();
			$.ajax({
				url : "showVenueCode.php",
				type : "POST",
				data : {mm_venue : mm_venue},
				datatype : "text",
				success : function(data){
					$('#demo').html(data);
				}
			});
		});
	});


	$('#bb_venue').change(function(){
		var bb_venue = $('#bb_venue').val();
		$.ajax({
			url : "showVenueCode.php",
			type : "POST",
			data : {bb_venue : bb_venue},
			datatype : "text",
			success : function(data){
				$('#demo').html(data);
			}
		});
	});

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


	function nothingShow(noValue){
		if (noValue == "nothing") {
			document.getElementById("demo").style.display = "none";
		}else{
			document.getElementById("demo").style.display = "block";
		}
	}
</script>


<?php include 'inc/footer.php'; ?>