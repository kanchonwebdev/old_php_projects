<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>


<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	error_reporting(0);
	$usrVen = new UserApp();
	$mmvenue = $_POST["mm_venue"];
	$bbvenue = $_POST["bb_venue"];
	$show = $usrVen->getSingleVen($mmvenue,$bbvenue);
	$row = $show->fetch_assoc();
?>

<table class="table">
	<tr class="text-center">
		<th>Venue Name</th>
		<th>Venue Address</th>
		<th>Venue Phone Number</th>
		<th>Capacity</th>
		<th>Preferred For</th>
		<th>Amount</th>
		<th>Venue Image</th>
	</tr>

	<tr class="text-center">
		<td><?php echo $row['venu_name']; ?></td>
		<td><?php echo $row['venu_address']; ?></td>
		<td><?php echo $row['venu_phone_number']; ?></td>
		<td><?php echo $row['capacity']; ?></td>
		<td><?php echo $row['preferred']; ?></td>
		<td><?php echo $row['amount']; ?></td>
		<td><img src="admin/images/<?php echo $row['venu_image']; ?>" width="50px" height="50px"></td><br>
	</tr>
</table>