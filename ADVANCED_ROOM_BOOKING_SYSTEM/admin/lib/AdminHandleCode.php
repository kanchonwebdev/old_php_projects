<?php
	include 'lib/Database.php';
?>

<?php
	class AdminApp
	{
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}


		public function addRoom($r_name,$r_bed_no,$r_capacity,$r_price,$r_image,$r_number)
		{
			$query = "INSERT INTO `tbl_room`(`r_name`, `r_bed_no`, `r_capacity`, `r_price`, `r_image`, `r_number`) VALUES ('$r_name','$r_bed_no','$r_capacity','$r_price','$r_image','$r_number')";
			$result = $this->db->insert($query);
			if($result)
			{
				$success = 0;
				header("Location: addBooking.php?success=$success");
			}else{
				$_SESSION['error'] = 0;
				header("Location: addBooking.php");
			}
		}

		public function showRoom()
		{
			$query = "SELECT * FROM tbl_room";
			$result = $this->db->select($query);
			return $result;
		}

		public function viewRoom($room_id)
		{
			$query = "SELECT * FROM tbl_room WHERE id = '$room_id' ";
			$result = $this->db->select($query);
			return $result;
		}


		public function showData($id)
		{
			$query = "SELECT * FROM tbl_room WHERE id = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function updateRoom($id,$r_name,$r_bed_no,$r_capacity,$r_price,$r_image,$r_number)
		{
			$query = "UPDATE `tbl_room` SET `r_name`='$r_name',`r_bed_no`='$r_bed_no',`r_capacity`='$r_capacity',`r_price`='$r_price',`r_image`='$r_image',`r_number`='$r_number' WHERE id = '$id' ";
			$result = $this->db->update($query);
			if($result)
			{
				$success = 0;
				$id = $id;
				header("Location: updateRoom.php?id=$id&&success=$success");
			}else{
				header("Location: addBooking.php");
			}
		}


		public function deleteRoom($id)
		{
			$query2 = "SELECT r_image FROM tbl_room WHERE id = '$id' ";
			$result2 = $this->db->select($query2)->fetch_assoc();
			unlink('images/'.$result2['r_image']);
			$query = "DELETE FROM `tbl_room` WHERE id = '$id' ";
			$result = $this->db->delete($query);
			if($result)
			{
				header("Location: admin.php");
			}
		}
	}
?>