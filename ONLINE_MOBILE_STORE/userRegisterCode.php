<?php include 'lib/UserHandleCode.php'; ?>

<?php 
	$usrReg = new UserApp();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$firstName = $_POST["firstName"];
		$middleName = $_POST["middleName"];
		$lastName = $_POST["lastName"];
		$Gender = $_POST["Gender"];
		$email = $_POST["email"];
		$contactNo = $_POST["contactNo"];
		$city = $_POST["city"];
		$address = $_POST["address"];
		$userName = $_POST["userName"];
		$password = $_POST["password"];
		$userId = $_POST["userId"];

		$usrRegData = $usrReg->userRegister($firstName,$middleName,$lastName,$Gender,$email,$contactNo,$city,$address,$userName,$password,$userId);
		if (isset($usrRegData)) {
			echo $usrRegData;
		}
	}
?>