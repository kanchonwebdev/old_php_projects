
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
					<a href="admin.php" class="list-group-item">VIEW ROOM</a>
					<a href="viewBooking.php" class="list-group-item">VIEW BOOKING</a>
					<a href="addBooking.php" class="list-group-item active">ADD BOOKING</a>
				</div>
			</div>

            <?php
               
                
                $ad = new AdminApp();
                $id = $_GET['id'];
                $show = $ad->showData($id)->fetch_assoc(); 

                $nameErr = $bedErr = $capacityErr = $priceErr = $imageErr = $numberErr = "";
                $r_name = $r_bed_no = $r_capacity = $r_price = $r_image = $r_number = "";
                $errValue = 0;
                if($_SERVER['REQUEST_METHOD'] == "POST")
                {

                    if (empty($_POST['r_name'])) 
                    {
                        $nameErr = "Name Is Required";
                        $errValue++;
                    }else{
                        $r_name = test_input($_POST['r_name']);
                    }

                    if (empty($_POST['r_bed_no'])) 
                    {
                        $bedErr = "Number Is Required";
                        $errValue++;
                    }else{
                        $r_bed_no = test_input($_POST['r_bed_no']);
                    }

                    if (empty($_POST['r_capacity'])) 
                    {
                        $capacityErr = "Capacity Is Required";
                        $errValue++;
                    }else{
                        $r_capacity = test_input($_POST['r_capacity']);
                    }

                    if (empty($_POST['r_price'])) 
                    {
                        $priceErr = "Price Is Required";
                        $errValue++;
                    }else{
                        $r_price = test_input($_POST['r_price']);
                    }

                    if (empty($_POST['r_number'])) 
                    {
                        $numberErr = "Room Number Is Required";
                        $errValue++;
                    }else{
                        $r_number = test_input($_POST['r_number']);
                    }

                    
                    if($errValue == 0)
                    {
                        $insertData = $ad->deleteRoom($id);
                    }
                    
                }

                function test_input($data)
                 {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                  }
                
            ?>

            

			<div class="col-sm-9">

				<form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="r_name" placeholder="ROOM NAME" class="form-control" value="<?php echo $show['r_name']; ?>"><br>
                        <span style="color:red;font-weight:bold;"><?php echo $nameErr; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="r_bed_no" placeholder="TOTAL BED" class="form-control" maxlength="2" value="<?php echo $show['r_bed_no']; ?>"><br>
                        <span style="color:red;font-weight:bold;"><?php echo $bedErr; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="r_capacity" placeholder="TOTAL CAPACITY" class="form-control" maxlength="2" value="<?php echo $show['r_capacity']; ?>"><br>
                        <span style="color:red;font-weight:bold;"><?php echo $capacityErr; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="r_price" placeholder="ROOM PRICE" class="form-control" maxlength="5" value="<?php echo $show['r_price']; ?>"><br>
                        <span style="color:red;font-weight:bold;"><?php echo $priceErr; ?></span>
                    </div>

                    <div class="form-group">
                        <img src="images/<?php echo $show['r_image']; ?>" width="250px" height="250px" id="preimage">
                    </div>

                    <div class="form-group">
                        <input type="text" name="r_number" placeholder="ROOM NUMBER" class="form-control" value="<?php echo $show['r_number']; ?>"><br>
                        <span style="color:red;font-weight:bold;"><?php echo $numberErr; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="DELETE ROOM" class="btn btn-danger">
                    </div>
                </form>
			</div>

		</div>
	</div>
</div>
<script>
   function loadFile(event)
   {
    var output = document.getElementById("preimage");
    output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php include "inc/header.php" ?>