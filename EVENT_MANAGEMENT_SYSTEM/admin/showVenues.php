<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>


	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "php_event_management";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	
	$showVenueJsVar = $_REQUEST['showVenueJsVar'];

	$sql = "SELECT * FROM admin_booking_data WHERE preferred = '$showVenueJsVar' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        ?>
	        <table class="table">
	        	<td><?php echo $row['venu_name']; ?></td>
				<td><?php echo $row['venu_address']; ?></td>
				<td><?php echo $row['venu_phone_number']; ?></td>
				<td><?php echo $row['capacity']; ?></td>
				<td><?php echo $row['preferred']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><img src="images/<?php echo $row['venu_image']; ?>" width="50px" height="50px"></td><br>
	        </table>
		

	<?php } }else{
		echo "<p class='text-center'>No DATA Found</p>";
	} ?>




        
