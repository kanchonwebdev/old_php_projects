
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
                $ad = new AdminApp();
                $room_id = $_GET['id'];
				$showData = $ad->viewRoom($room_id)->fetch_assoc();
			?>


			<div class="col-sm-9">
				<div class="row panel panel-default">
				  <div class="panel-body">
                    <div class="col-sm-3">
                        <div>ROOM NAME</div><br>
                        <div>TOTAL BED</div><br>
                        <div>GUEST CAPACITY</div><br>
                        <div>ROOM PRICE</div><br>
                        <div>ROOM IMAGE</div><br><br><br><br><br><br><br><br><br><br><br><br>
                        <div>ROOM NUMBER</div><br>
                    </div>

                    <div class="col-sm-6">
                        <div><?php echo $showData['r_name']; ?></div><br>
                        <div><?php echo $showData['r_bed_no']; ?></div><br>
                        <div><?php echo $showData['r_capacity']; ?></div><br>
                        <div><?php echo $showData['r_price']; ?></div><br>
                        <div><img src="images/<?php echo $showData['r_image']; ?>" alt="demo_image" width="250px" height="235px"></div><br>
                        <div><?php echo $showData['r_number']; ?></div><br>
                    </div>
				   </div>
                </div>
			</div>

		</div>
	</div>
</div>


<?php include "inc/header.php" ?>