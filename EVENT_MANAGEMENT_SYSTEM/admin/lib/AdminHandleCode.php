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



		public function adminBookingDataInsert($venu_name,$venu_address,$venu_phone_number,$capacity,$preferred,$amount,$upload_filed){
			$venu_name = mysqli_real_escape_string($this->db->link, $venu_name);
			$venu_address = mysqli_real_escape_string($this->db->link, $venu_address);
			$venu_phone_number = mysqli_real_escape_string($this->db->link, $venu_phone_number);
			$capacity = mysqli_real_escape_string($this->db->link, $capacity);
			$preferred = mysqli_real_escape_string($this->db->link, $preferred);
			$amount = mysqli_real_escape_string($this->db->link, $amount);
			$venu_image = mysqli_real_escape_string($this->db->link, $upload_filed);

			$query = "INSERT INTO admin_booking_data(venu_name,venu_address,venu_phone_number,capacity,preferred,amount,venu_image) VALUES('$venu_name','$venu_address','$venu_phone_number','$capacity','$preferred','$amount','$upload_filed')";
			

			$result = $this->db->insert($query);
            if($result)
            {
                return $result;
            }

		}


		public function newBookingMethod(){
			$query = "SELECT * FROM `user_booking_data` WHERE booking_status = 'Pending' OR booking_status = 'Cancel' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function newBookingMethod3(){
			$query = "SELECT * FROM `user_booking_data` WHERE booking_status = 'Confirm' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function newBookingMethod2($str){
			$query = "SELECT * FROM `user_booking_data` WHERE booking_id = '$str' ";
			$result = $this->db->select($query);
			return $result;
		}

		
		public function singleBooking($id_name){
			$query = "SELECT * FROM `user_booking_data` WHERE booking_id = '$id_name' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function updateBooking($h_id,$sts){
			$query = "UPDATE `user_booking_data` SET booking_status = '$sts' WHERE booking_id = '$h_id' ";
			$result = $this->db->update($query);
			return $result;
		}
	}
?>