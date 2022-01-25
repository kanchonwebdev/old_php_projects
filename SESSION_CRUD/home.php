    <?php
     session_start();
     include 'header.php'; 
     if (array_key_exists('data', $_SESSION) AND !empty($_SESSION['data'])) 
	     {
	     	$alldata = $_SESSION['data'];
	     }
     ?>
		
		<div class="well">
			<a href="create.php" class="btn btn-success ml-0 mt-5 mb-5">Add Data</a>
		</div>
		<div class="well text-center">
			<?php
				if (isset($_SESSION['msg'])) 
				{
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>

				
				<tbody>
					<?php
						if (!empty($alldata)) 
						{
							foreach ($alldata as $key => $value) 
							{
					?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['gender']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['address']; ?></td>
						<td>
							<a href="show.php?id=<?php echo $key; ?>" class="btn btn-info">Show</a>
							<a href="edit.php?id=<?php echo $key; ?>" class="btn btn-success">Edit</a>
							<a href="delete.php?id=<?php echo $key; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				    <?php } } ?>
				</tbody>
			</table>
		</div>


	<?php include 'footer.php'; ?>