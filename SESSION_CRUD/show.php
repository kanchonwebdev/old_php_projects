<?php
    session_start();
   include 'header.php';
   if (isset($_GET['id'])) 
   {
   	if (array_key_exists('data', $_SESSION) AND !empty($_SESSION['data'])) 
	   {
	   	$allData = $_SESSION['data'][$_GET['id']];
	   }
   } else
   {
   	$_SESSION['msg'] = "Data Show Successfully";
   	header('Location: home.php');
   }
?>



<div class="well text-center">
	        <?php
				if (isset($_SESSION['msg'])) 
				{
					echo $_SESSION['msg'];
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
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $_GET['id']+1; ?></td>
				<td><?php echo $allData['name']; ?></td>
				<td><?php echo $allData['gender']; ?></td>
				<td><?php echo $allData['email']; ?></td>
				<td><?php echo $allData['address']; ?></td>
			</tr>
		</tbody>
	</table>
</div>