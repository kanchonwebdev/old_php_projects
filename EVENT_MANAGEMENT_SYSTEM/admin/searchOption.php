<?php
	session_start();
	if ($_SESSION['adminName'] == "") {
		header("Location: logIn.php");
	}
?>

<?php include'lib/AdminHandleCode.php'; ?>
<?php 
	$ad = new AdminApp();
	error_reporting(0);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$str = $_REQUEST["q"];
		$newBooking = $ad->newBookingMethod2($str);
	}
?>
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