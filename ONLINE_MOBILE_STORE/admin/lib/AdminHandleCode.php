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



		public function productInsertMethod($productName,$productImageName,$productPrice,$productDes){
			$productName = mysqli_real_escape_string($this->db->link, $productName);
			$productPrice = mysqli_real_escape_string($this->db->link, $productPrice);
			$productDes = mysqli_real_escape_string($this->db->link, $productDes);
			if ($productName == "" || $productImageName == "" || $productPrice == "" || $productDes == "") {
				$msg2 = '<div class="text-center alert alert-warning alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Product Add Failed</strong>
						 </div>';
				return $msg2;

			}else{

			$query = "INSERT INTO `tbl_admin_product_data`(`productName`, `productImage`, `productPrice`, `productDes`) VALUES ('$productName','$productImageName','$productPrice','$productDes')";
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


		//select all product
		public function selectAllProduct($startFrom,$perPage){
			$query = "SELECT * FROM `tbl_admin_product_data` LIMIT $startFrom,$perPage";
			$result = $this->db->select($query);
			return $result;
		}


		//select single product
		public function getSingleProduct($dataVar){
			$query = "SELECT * FROM `tbl_admin_product_data` WHERE id = '$dataVar' ";
			$result = $this->db->select($query);
			return $result;
		}

		//update product method
		public function productUpdateMethod($productName,$productImageName,$productPrice,$productDes,$dataVar){
			$productName = mysqli_real_escape_string($this->db->link, $productName);
			$productPrice = mysqli_real_escape_string($this->db->link, $productPrice);
			$productDes = mysqli_real_escape_string($this->db->link, $productDes);
			

			$query = "UPDATE `tbl_admin_product_data` SET `productName`='$productName',`productImage`='$productImageName',`productPrice`='$productPrice',`productDes`='$productDes' WHERE id = '$dataVar' ";
			$result = $this->db->update($query);
			
			if ($result) {
				$msg1 = '<div class="text-center alert alert-success alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Product Update Successfully</strong>
						 </div>';
				return $msg1;
			}
		}

		//delete data
		public function deleteDataMethod($dataVar){
			$query = "DELETE FROM `tbl_admin_product_data` WHERE id = '$dataVar' ";
			$result = $this->db->delete($query);
			if ($result) {
				header("Location: viewProduct.php");
			}
		}

		//count id
		public function countID(){
			$query = "SELECT id FROM tbl_admin_product_data";
			$result = $this->db->select($query);
			return $result->num_rows;
		}


		//view order
		public function viewOrderMethod($startFrom, $perPage){
			$query = "SELECT tbl_user_payment.userId, tbl_user_payment.items, tbl_user_cart.productQuantity, tbl_user_cart.productPrice, tbl_user_payment.total, tbl_user_payment.paymentMethod, tbl_user_payment.payment_id FROM tbl_user_cart INNER JOIN tbl_user_payment ON tbl_user_cart.userId = tbl_user_payment.userId LIMIT $startFrom, $perPage";
			$result = $this->db->select($query);
			return $result;
		}

		//count id
		public function countViewOrderId(){
			$query = "SELECT id FROM tbl_user_cart WHERE paymentStatus = 'Paid' ";
			$result = $this->db->select($query);
			return $result->num_rows;
		}

	}
?>