<?php include 'inc/header.php'; ?>

<div class="row">
	<div class="well text-center">
		<h4 class="text-center">ONLINE MOBILE STORE</h4><br>
		<h5 class="text-center">THIS IS HOME PAGE</h5>
		<a href="userLogin.php">LOGIN HERE</a>&nbsp;&nbsp;&nbsp;&nbsp;
	</div>


	<div class="well">
		<h4 class="text-center">USER REGISTRATION FROM</h4><br>

		<div id="demo"></div>

		<form action="userRegisterCode.php" method="POST">
			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>First Name</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="firstName">
						<span id="firstNameErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Middle Name</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="middleName">
						<span id="middleNameErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Last Name</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="lastName">
						<span id="lastNameErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Gender</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<select class="form-control" id="Gender">
							<option value="nothing">--SELECT GENDER--</option>
							<option value="Male">Male</option>
							<option value="FeMale">FeMale</option>
						</select>
						<span id="genderErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Email</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="email" class="form-control" id="email">
						<span id="emailNameErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Contact NO</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="contactNo">
						<span id="contactNoErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>City</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="city">
						<span id="cityErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Address</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<textarea id="address" rows="5" cols="20" class="form-control"></textarea>
						<span id="addressErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>User Name</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="userName">
						<span id="userNameErrorMsg"></span>
						<div id="demo2"></div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>Password</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="password" class="form-control" id="password">
						<span id="passwordErrorMsg"></span>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-4 text-right">
					<div><b>User ID</b></div>
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<input type="text" class="form-control" id="userId" maxlength="4">
						<span id="userIdErrorMsg"></span>
						<div id="demo3"></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4 text-right">
					
				</div>

				<div class="col-sm-6 text-left">
					<div class="form-group">
						<div class="btn btn-info" id="subBtn">REGISTER</div>
					</div>
				</div>
			</div>
		</form>


	</div>
</div>




<script type="text/javascript">
	$(document).ready(function(){
		$('#userName').keyup(function(){
			var userName = $('#userName').val();
			$.ajax({
				type : "POST",
				url : "checkUserName.php",
				datatype : "text",
				data : {
					userName : userName
				},
				success: function(data2){
					$('#demo2').html(data2);
				}

			});
		});



		$('#userId').keyup(function(){
			var userId = $('#userId').val();
			$.ajax({
				type : "POST",
				url : "checkUserID.php",
				datatype : "text",
				data : {
					userId : userId
				},
				success: function(data3){
					$('#demo3').html(data3);
				}

			});
		});

		$('#subBtn').click(function(){
			var firstName = $('#firstName').val();
			var middleName = $('#middleName').val();
			var lastName = $('#lastName').val();
			var Gender = $('#Gender').val();
			var email = $('#email').val();
			var contactNo = $('#contactNo').val();
			var city = $('#city').val();
			var address = $('#address').val();
			var userName = $('#userName').val();
			var password = $('#password').val();
			var userId = $('#userId').val();


			if (firstName == "" || middleName == "" || lastName == "" || Gender == "" || email == "" || contactNo == "" || city == "" || address == "" || userName == "" || password == "" || userId == "") {

				if (firstName == "") {
					$('#firstNameErrorMsg').text('Enter Your First Name');
				}else{
					$('#firstNameErrorMsg').text('');
				}

				if (middleName == "") {
					$('#middleNameErrorMsg').text('Enter Your Middle Name');
				}else{
					$('#middleNameErrorMsg').text('');
				}

				if (lastName == "") {
					$('#lastNameErrorMsg').text('Enter Your Last Name');
				}else{
					$('#lastNameErrorMsg').text('');
				}

				if (Gender == "nothing") {
					$('#genderErrorMsg').text('Select Your Gender');
				}else{
					$('#genderErrorMsg').text('');
				}

				if (email == "") {
					$('#emailNameErrorMsg').text('Enter Your Email');
				}else{
					$('#emailNameErrorMsg').text('');
				}

				if (contactNo == "" || contactNo.length != 11) {
					$('#contactNoErrorMsg').text('Enter Your 11 Digit Contact Number');
				}else{
					$('#contactNoErrorMsg').text('');
				}

				if (city == "") {
					$('#cityErrorMsg').text('Enter City Name');
				}else{
					$('#cityErrorMsg').text('');
				}

				if (address == "") {
					$('#addressErrorMsg').text('Enter Your Address');
				}else{
					$('#addressErrorMsg').text('');
				}

				if (userName == "") {
					$('#userNameErrorMsg').text('Enter Your User Name');
				}else{
					$('#userNameErrorMsg').text('');
				}

				if (password == "") {
					$('#passwordErrorMsg').text('Enter Your Password');
				}else{
					$('#passwordErrorMsg').text('');
				}

				if (userId == "" && userId.length != 4) {
					$('#userIdErrorMsg').text('Enter Your 4 Digit User ID');
					

				}else{
					$('#userIdErrorMsg').text('');
				}

			}else{
				$.ajax({
					type : "POST",
					url : "userregisterCode.php",
					datatype : "text",
					data : {
						firstName : firstName,
						middleName : middleName,
						lastName : lastName,
						Gender : Gender,
						email : email,
						contactNo : contactNo,
						city : city,
						address : address,
						userName : userName,
						password : password,
						userId : userId
					},
					success: function(data){
						$('#demo').html(data);
					}
				});
			}

		});
	});
</script>

<?php include 'inc/footer.php'; ?>
