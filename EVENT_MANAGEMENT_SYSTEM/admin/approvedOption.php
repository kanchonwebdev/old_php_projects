<?php include 'lib/AdminHandleCode.php'; ?>
<?php include 'inc/header.php' ?>


<div class="row">
	<div class="well text-center">
		<h4>ADVANCED EVENT MANAGEMENT SYSTEM</h4> <br>
	</div>
	<?php 
	error_reporting(0);
		$ad = new AdminApp();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_name = $_POST["id_name"];
			$dataShow = $ad->singleBooking($id_name);
			$data = $dataShow->fetch_assoc();
		}
	?>
	<div class="well">
		
		<form method="POST" action="approvedOption2.php">
			<input type="hidden" name="h_id" value="<?php echo $data["booking_id"]; ?>">
			<div class="form-group">
				<select class="form-control" name="sts">
					<option value="Pending">--SELECT STATUS--</option>
					<option value="Confirm">CONFIRM</option>
					<option value="Cancel">CANCEL</option>
				</select>
			</div>

			<div class="form-group">
				<input type="submit" value="CONFIRM" class="btn btn-success">
			</div>
		</form>
	</div>
</div>

<?php include 'inc/footer.php'; ?>