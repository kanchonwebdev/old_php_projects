
<?php include 'inc/header.php'; ?>
<?php include 'lib/UserHandleCode.php'; ?>

<div class="row">
	<div class="panel panel-default">
		<div class="panel-body bg-danger">
			<div class="col-sm-8">
				<h2 style="color:blue;"><a href="home.php" style="text-decoration:none">ROOM BOOKING SYSTEM</a></h2>
			</div>

			<div class="col-sm-4 text-right" style="margin-top:20px;font-size: 15px;">
				<a href="login.php">LOGIN</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="register.php">REGISTER</a>
			</div>
		</div>
	</div>

    <?php
        $ur = new UserApp();
        $u_name = $u_email = $u_phone = $u_address = $u_pass = "";
        $nameErr = $emailErr = $phoneErr = $addressErr = $passErr = "";
        $errValue = 0;
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST['u_name']))
            {
                $nameErr = "NAME REQUIRED";
                $errValue++;
            }else{
                $u_name = test_input($_POST["u_name"]);
            }

            if(empty($_POST['u_email']))
            {
                $emailErr = "EMAIL REQUIRED";
                $errValue++;
            }else{
                $u_email = test_input($_POST["u_email"]);
            }

            if(empty($_POST['u_phone']))
            {
                $phoneErr = "PHONE REQUIRED";
                $errValue++;
            }else{
                $u_phone = test_input($_POST["u_phone"]);
            }

            if(empty($_POST['u_address']))
            {
                $addressErr = "ADDRESS REQUIRED";
                $errValue++;
            }else{
                $u_address = test_input($_POST["u_address"]);
            }

            if(empty($_POST['u_pass']))
            {
                $passErr = "PASSWORD REQUIRED";
                $errValue++;
            }else{
                $u_pass = test_input($_POST["u_pass"]);
            }
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($errValue == 0)
        {
            $insertData = $ur->userRegister($u_name,$u_email,$u_phone,$u_address,$u_pass);
        }
    ?>

    <div class="panel panel-default"><div class="alert alert-success alert-dismissible">
        <?php if(isset($insertData)){ ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $insertData; ?>
            </div>
        <?php } ?>

        <div class="panel-body bg-info">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                    <input type="text" name="u_name" placeholder="YOUR FULL NAME" maxlength="30" class="form-control"><br>
                    <span style="color:red;font-weight:bold;"><?php echo $nameErr; ?></span>
                </div>

                <div class="form-group">
                    <input type="email" name="u_email" placeholder="YOUR EMAIL NAME" class="form-control"><br>
                    <span style="color:red;font-weight:bold;"><?php echo $emailErr; ?></span>
                </div>

                <div class="form-group">
                    <input type="text" name="u_phone" placeholder="YOUR PHONE NUMBER" maxlength="11" class="form-control"><br>
                    <span style="color:red;font-weight:bold;"><?php echo $phoneErr; ?></span>
                </div>

                <div class="form-group">
                    <textarea name="u_address" class="form-control" cols="30" rows="5" placeholder="YOUR ADDRESS"></textarea><br>
                    <span style="color:red;font-weight:bold;"><?php echo $addressErr; ?></span>
                </div>

                <div class="form-group">
                    <input type="password" name="u_pass" placeholder="YOUR PASSWORD" maxlength="11" class="form-control"><br>
                    <span style="color:red;font-weight:bold;"><?php echo $passErr; ?></span>
                </div>

                <div class="form-group">
                    <input type="submit" value="REGISTER" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


	




</div>

<?php include 'inc/footer.php'; ?>