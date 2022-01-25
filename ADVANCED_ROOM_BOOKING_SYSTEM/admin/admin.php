
<?php include 'lib/AdminHandleCode.php'; ?>
<?php include "inc/header.php"; ?>

<div class="row">
	<div class="panel panel-default">
		<div class="panel-body text-center">
			<h2>ROOM BOOKING SYSTEM</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-sm-3">
				<div class="list-group">
					<a href="admin.php" class="list-group-item active">VIEW ROOM</a>
					<a href="viewBooking.php" class="list-group-item">VIEW BOOKING</a>
					<a href="addBooking.php" class="list-group-item">ADD BOOKING</a>
				</div>
			</div>

			<?php
				error_reporting(0);
				$ad = new AdminApp();
				$showData = $ad->showRoom();
			?>


			<div class="col-sm-9">
				<table class="table">
					<tr>
						<th>ROOM NAME</th>
						<th>ROOM NUMBER</th>
						<th>ROOM PRICE</th>
						<th class="text-center">ACTION</th>
					</tr>

					<?php 
						foreach($showData as $data){
					?>

						
					<tr>
						<td><?php echo $data['r_name']; ?></td>
						<td><?php echo $data['r_number']; ?></td>
						<td><?php echo $data['r_price']; ?>/=</td>
						<td class="text-center">
							<a href="viewRoom.php?id=<?php echo $data['id']; ?>" class="btn btn-info">VIEW</a>
							<a href="updateRoom.php?id=<?php echo $data['id']; ?>" class="btn btn-success">UPDATE</a>
							<a href="deleteRoom.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">DELETE</a>
						</td>
					</tr>

					<?php } ?>

				</table>
			</div>

		</div>
	</div>
</div>


<?php include "inc/header.php" ?>