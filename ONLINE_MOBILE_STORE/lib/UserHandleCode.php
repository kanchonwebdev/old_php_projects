
<?php include 'lib/Database.php'; ?>

<?php 
	class UserApp
	{
		private $db;
		
		function __construct()
		{
			$this->db = new Database();
		}

		
		//user registration
		public function userRegister($firstName,$middleName,$lastName,$Gender,$email,$contactNo,$city,$address,$userName,$password,$userId){
			$firstName = mysqli_real_escape_string($this->db->link, $firstName);
			$middleName = mysqli_real_escape_string($this->db->link, $middleName);
			$lastName = mysqli_real_escape_string($this->db->link, $lastName);
			$Gender = mysqli_real_escape_string($this->db->link, $Gender);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$contactNo = mysqli_real_escape_string($this->db->link, $contactNo);
			$city = mysqli_real_escape_string($this->db->link, $city);
			$address = mysqli_real_escape_string($this->db->link, $address);
			$userName = mysqli_real_escape_string($this->db->link, $userName);
			$password = mysqli_real_escape_string($this->db->link, $password);
			$userId = mysqli_real_escape_string($this->db->link, $userId);

			$query = "SELECT userName FROM tbl_user_register WHERE userName = '$userName' ";
			$result = $this->db->select($query);

			$query2 = "SELECT userId FROM tbl_user_register WHERE userId = '$userId' ";
			$result2 = $this->db->select($query2);
			

			if ($result) {
				$msg2 = '<div class="text-center alert alert-warning alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>User Name Already Exist</strong>
						 </div>';
				return $msg2;
			}else if ($result2) {
				$msg3 = '<div class="text-center alert alert-warning alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>User ID Already Exist</strong>
						 </div>';
				return $msg3;
			}else{
				$query = "INSERT INTO `tbl_user_register`( `firstName`, `middleName`, `lastName`, `Gender`, `email`, `contactNo`, `city`, `address`, `userName`, `password`, `userId`) VALUES ('$firstName','$middleName','$lastName','$Gender','$email','$contactNo','$city','$address','$userName','$password','$userId')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg1 = '<div class="text-center alert alert-success alert-dismissible fade in">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong><a href="userLogin.php">Registration Successfull!Now You Can log In</a></strong>
							 </div>';
					return $msg1;
				}
			}
		}



		//check user name
		public function checkName($userName){
			$query = "SELECT userName FROM tbl_user_register WHERE userName = '$userName' ";
			$result = $this->db->select($query);
			if ($result) {
				$msg4 = '<div class="text-center alert alert-warning alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>User Name Already Exist</strong>
						 </div>';
				return $msg4;
			}
		}


		//check user ID
		public function checkId($userId){
			$query = "SELECT userId FROM tbl_user_register WHERE userId = '$userId' ";
			$result = $this->db->select($query);
			if ($result) {
				$msg5 = '<div class="text-center alert alert-warning alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>User ID Already Exist</strong>
						 </div>';
				return $msg5;
			}
		}

		//select all product
		public function selectAllProduct($start_form,$per_page){
			$query = "SELECT * FROM `tbl_admin_product_data` LIMIT $start_form, $per_page";
			$result = $this->db->select($query);
			return $result;
		}

		//count Product
		public function countID(){
			$query = "SELECT id FROM `tbl_admin_product_data`";
			$result = $this->db->select($query);
			return $result->num_rows;
		}



		//select product By id
		public function selectProductById($cartId){
			$query = "SELECT * FROM `tbl_admin_product_data` WHERE id = '$cartId' ";
			$result = $this->db->select($query);
			return $result;
		} 

		//insert cart data
		public function addCartData($productName,$productImage,$productPrice,$productDes,$productQuantity,$sessionId,$userId){
			$query2 = "SELECT productName FROM tbl_user_cart WHERE productName = '$productName' AND sessionID = '$sessionId' AND paymentStatus = 'Pending' ";
			$result2 = $this->db->select($query2);
			if($result2){
				$msg2 = '<div class="text-center alert alert-success alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Product Already Add</strong>
						 </div>';
				return $msg2;
			} else{
			$query = "INSERT INTO `tbl_user_cart`(`userId`, `productName`, `productImage`, `productPrice`, `productDes`, `productQuantity`, `sessionID`, `paymentStatus`) VALUES ('$userId','$productName','$productImage','$productPrice','$productDes','$productQuantity','$sessionId','Pending')";
			$result = $this->db->insert($query);
			if ($result) {
				$msg1 = '<div class="text-center alert alert-success alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Product Add Successfully</strong>
						 </div>';
				return $msg1;
			}
		  }
		}

		//payment Method
		public function paymentMethod($userId,$items,$quantity,$cost,$total,$paymentMethod,$amount,$paymentId,$sessionID){
			if ($userId == "" || $amount == "" || $paymentId == "") {
				$msg2 = '<div class="text-center alert alert-warning alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Product Buy Failed</strong>
						 </div>';
				return $msg2;
			}else{
				$query = "INSERT INTO `tbl_user_payment`(`userId`, `items`, `quantity`, `cost`, `total`, `paymentMethod`, `amount`, `payment_id`) VALUES ('$userId','$items','$quantity','$cost','$total','$paymentMethod','$amount','$paymentId')";
				$result = $this->db->insert($query);
				if ($query) {
					$query2 = "UPDATE tbl_user_cart SET paymentStatus = 'Paid' WHERE sessionID = '$sessionID' ";
					$result2 = $this->db->update($query2);

					$msg1 = '<div class="text-center alert alert-success alert-dismissible fade in">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <strong>Product Buy Successfully</strong>
							 </div>';
					return $msg1;
				}
			}
		}


		//select buy item
		public function selectBuyItem($userIds,$sessionID){
			$query = "SELECT * FROM `tbl_user_cart` WHERE userId = '$userIds' AND sessionID = '$sessionID' AND paymentStatus = 'Pending' ";
			$result = $this->db->select($query);
			return $result;
		}

		//delete exist data
		public function deleteExistData(){
			$query = "DELETE FROM tbl_user_cart WHERE paymentStatus = 'Pending' ";
			$result = $this->db->delete($query);
			return $result;
		}
		
	}

 ?>