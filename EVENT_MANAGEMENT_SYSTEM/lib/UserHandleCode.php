<?php include 'lib/Database.php'; ?>

<?php 
	class UserApp
	{
		private $db;
		
		function __construct()
		{
			$this->db = new Database();
		}

		//user Registration code
		public function userRegister($userId,$userName,$address,$phoneNumber,$email,$pass,$confirmPass){
			


			if ($userId == "" || $userName == "" || $address == "" || $phoneNumber == "" ||$email == "" || $pass == "" || $confirmPass == "") {

				$userId = mysqli_real_escape_string($this->db->link, $userId);
				$userName = mysqli_real_escape_string($this->db->link, $userName);
				$address = mysqli_real_escape_string($this->db->link, $address);
				$phoneNumber = mysqli_real_escape_string($this->db->link, $phoneNumber);
				$email = mysqli_real_escape_string($this->db->link, $email);
				$pass = mysqli_real_escape_string($this->db->link, $pass);
				$confirmPass = mysqli_real_escape_string($this->db->link, $confirmPass);


				$errorMsg = '<div class="alert alert-warning alert-dismissible fade in">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong>PLEASE ALL FIELD WITH VALID DATA</strong>
							  </div>';
				return $errorMsg;

			}elseif ($userId != "" || $userName != "" || $address != "" || $phoneNumber != "" ||$email != "" || $pass != "" || $confirmPass != "") {


				$query2 = "SELECT userId FROM tbl_user_register WHERE userId = '$userId'";
				$result2 = $this->db->select($query2);
				



				if ($pass != $confirmPass) {
					$errorMsg2 = '<div class="alert alert-warning alert-dismissible fade in">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong>PASSWORD NOT MATCH</strong>
							  </div>';
					return $errorMsg2;
				}elseif ($result2) {
					$errorMsg3 = '<div class="alert alert-warning alert-dismissible fade in">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong>ID NOT AVAIABLE</strong>
							  </div>';
					return $errorMsg3;
				}else{

					$query = "INSERT INTO `tbl_user_register`(`userId`, `userName`, `address`, `phoneNumber`, `email`, `pass`, `confirmPass`) VALUES ('$userId','$userName','$address','$phoneNumber','$email','$pass','$confirmPass')";
					$result = $this->db->insert($query);

					if ($result) {
					  $successMsg = '<div class="alert alert-success alert-dismissible fade in">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong>CONGRATULATION REGISTRATION SUCCESSFULL</strong>
							  </div>';
						return $successMsg;
					}
				}

			}
		}


		//user log In code
		public function userLogCode($userId,$userPass){
			$userId = mysqli_real_escape_string($this->db->link, $userId);
			$userPass = mysqli_real_escape_string($this->db->link, $userPass);

			$query = "SELECT userId AND pass  FROM tbl_user_register WHERE userId = '$userId' AND pass = '$userPass'";
			$result = $this->db->select($query);
			if ($result) {
				header("Location: home.php");
				return $result;
			}else{
				header("Location: userLogIn.php");
			}
		}


		//user details code
		public function getUserDetails($usrDetailsId){
			$query = "SELECT * FROM tbl_user_register WHERE userId = '$usrDetailsId' ";
			$result = $this->db->select($query);
			return $result;
		}

		//marriage venue code
		public function getMarVen(){
			$query = "SELECT DISTINCT(venu_name) FROM admin_booking_data WHERE preferred = 'marriage_function' ";
			$result = $this->db->select($query);
			return $result;
		}

		//birthday venue code
		public function getBarVen(){
			$query = "SELECT DISTINCT(venu_name) FROM admin_booking_data WHERE preferred = 'birthday_party' ";
			$result = $this->db->select($query);
			return $result;
		}


		//show venue code
		public function getSingleVen($mmvenue,$bbvenue){
			$query = "SELECT * FROM admin_booking_data WHERE venu_name = '$mmvenue' OR venu_name = '$bbvenue' ";
			$result = $this->db->select($query);
			return $result;
		}


		//code for add venue show
		public function getCheckVenue($mmvenue,$bbvenue){
			$query = "SELECT * FROM admin_booking_data WHERE venu_name = '$mmvenue' OR venu_name = '$bbvenue' ";
			$result = $this->db->select($query);
			return $result;
		}

		//booking code for
		public function userBookingCode($venu_name,$venu_address,$dj,$stage,$mike,$brekFastMenuValue,$teaMenuId,$lunchMenuId,$dinnerMenuId,$veg,$booking_id,$booking_date,$total_guest,$userId){
			$query = "INSERT INTO `user_booking_data`(`venu_name`, `venu_address`, `breakfast`, `tea_&_snack`, `lunch`, `dinner`, `food_type`, `booking_id`, `user_id`, `booking_date`, `guest_number`, `dj`, `stage`, `mike`) VALUES ('$venu_name','$venu_address','$brekFastMenuValue','$teaMenuId','$lunchMenuId','$dinnerMenuId','$veg','$booking_id','$userId','$booking_date','$total_guest','$dj','$stage','$mike')";

			$result = $this->db->insert($query);
			if ($result) {
				return $result;
			}
		}


		//select user booking
		public function selectBookingMethod($sessionData){
			$query = "SELECT * FROM user_booking_data WHERE user_id = '$sessionData' ";
			$result = $this->db->select($query);
			return $result;
		}

		//user feedback data
		public function feedBackMethod($userID,$feedbackForm){
			if (empty($feedbackForm)) {
				$msg1 = "
					<div class='alert alert-warning alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Warning!</strong> Please Fill Up FeedBack From
					</div>
				";
				return $msg1;
			}else{
				$query = "INSERT INTO `tbl_feedback`(`userID`, `feedBack_text`) VALUES ('$userID','$feedbackForm')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg2 = "
					<div class='alert alert-success alert-dismissible fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> FeedBack Give Successfully
					</div>
				";
				return $msg2;
				}
			}
			
		}
	}

 ?>