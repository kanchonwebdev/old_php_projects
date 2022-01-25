<?php session_start(); ?>
<?php include 'lib/Database.php'; ?>

<?php 
	class UserApp
	{
		private $db;
		
		function __construct()
		{
			$this->db = new Database();
		}

		

		public function userRegister($u_name,$u_email,$u_phone,$u_address,$u_pass)
		{
			$u_name = mysqli_real_escape_string($this->db->link, $u_name);
			$u_email = mysqli_real_escape_string($this->db->link, $u_email);
			$u_phone = mysqli_real_escape_string($this->db->link, $u_phone);
			$u_address = mysqli_real_escape_string($this->db->link, $u_address);
			$u_pass = mysqli_real_escape_string($this->db->link, $u_pass);


			if(!empty($u_email))
			{
				$query2 = "SELECT u_email FROM tbl_user WHERE u_email  = '$u_email' ";
				$result2 = $this->db->select($query2);
				if($result2)
				{
					return $msg2 = "Email Already Exist.Registration Faild.Please Try Again";
				}else{
					if(empty($u_name) == false)
					{
						$query = "INSERT INTO `tbl_user`(`u_name`, `u_email`, `u_phone`, `u_address`, `u_pass`) VALUES ('$u_name','$u_email','$u_phone','$u_address','$u_pass')";
					$result = $this->db->insert($query);
					
						if($result)
						{
							return $msg = "Registration successfull.You Can log in now";
						}
					}
				}
			}
		}

		public function showProduct()
		{
			$query = "SELECT * FROM tbl_room";
			$result = $this->db->select($query);
			return $result;
		}


		public function showSingleRoom($id)
		{
			$query = "SELECT * FROM tbl_room WHERE id = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function selectDatabaseArrayMethod($r_number)
		{
			$selQuery = "SELECT date_array FROM tbl_cart WHERE r_number = '$r_number' ";
			$selresult = $this->db->select($selQuery);
			return $selresult;
		}

		public function cartData($r_name,$r_bed_no,$r_capacity,$r_price,$r_number,$startFrom,$to_end,$session_id,$total_day,$dateArray)
		{
			$query = "INSERT INTO `tbl_cart`(`r_name`, `r_bed_no`, `r_capacity`, `r_price`, `r_number`, `session_id`, `start_from`, `to_end`, `total_day`, `date_array`) VALUES ('$r_name','$r_bed_no','$r_capacity','$r_price','$r_number','$session_id','$startFrom','$to_end','$total_day','$dateArray')";
			$result = $this->db->insert($query);
			if($result)
			{
				header("Location: payment.php");
			}
		}

		public function userPayment($u_payment_method,$u_payment_id,$session_id,$u_name,$u_email,$payment_tk,$u_status)
		{
			

			if($_SESSION["status"] == "" || $_SESSION["status"] == null)
			{
				header("Location: home.php");
			}else{
				$query = "INSERT INTO `tbl_payment`( `u_name`, `u_payment_method`, `u_payment_id`, `u_email`, `session_id`, `payment_tk`) VALUES ('$u_name','$u_payment_method','$u_payment_id','$u_email','$session_id','$payment_tk')";
				$result = $this->db->insert($query);
				if($result)
				{
					unset($_SESSION["status"]);
					header("Location: printPage.php");
				}
			}

			
		}

		public function login($u_email,$u_pass)
		{
			$query = "SELECT * FROM `tbl_user` WHERE u_email = '$u_email' AND u_pass = '$u_pass' ";
			$result = $this->db->select($query)->fetch_assoc();
			if($result)
			{
				$_SESSION['u_name'] = $result['u_name'];
				$_SESSION['u_email'] = $result['u_email'];
				$_SESSION['u_address'] = $result['u_address'];
				
				header("Location: home.php");
				
			}

		}

		

	}

 ?>