<?php 
	session_start();
	if ($_SESSION['userID'] == "") {
		header("Location: userLogIn.php");
	} 
?>


<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	error_reporting(0);
	$venCheck = new UserApp();
	$mmvenue = $_POST["mm_venue"];
	$bbvenue = $_POST["bb_venue"];
	$show = $venCheck->getCheckVenue($mmvenue,$bbvenue);
	$row = $show->fetch_assoc();
?>

<div class="row">
	<div class="col-sm-6 text-right">
		<b>VENUE NAME</b><br><br>
		<b>VENUE ADDRESS</b><br><br>
		<b>CAPACITY</b><br><br>
		<b>VENUE IMAGE</b><br><br>
	</div>
	<div class="col-sm-6">
		<div><?php $_SESSION["vinu_name"] = $row['venu_name']; echo $row['venu_name']; ?></div><br>
		<div><?php echo $row['venu_address']; ?></div><br>
		<div><?php echo $row['capacity']; ?></div><br>
		<div> <img src="admin/images/<?php echo $row['venu_image']; ?>" width="150px" height="150px"></div><br><br>
	</div>
</div>