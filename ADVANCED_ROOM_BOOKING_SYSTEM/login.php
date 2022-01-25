<?php include 'lib/UserHandleCode.php'; ?>
<?php include 'inc/header.php'; ?>


<div class="row">
	<div class="panel panel-default">
		<div class="panel-body bg-success">
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
        error_reporting(0);
        $ur = new UserApp();
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $u_email = $_POST['u_email'];
            $u_pass = $_POST['u_pass'];

            $insertData = $ur->login($u_email,$u_pass);
        }
    ?>

	<div class="panel panel-default">
        <div class="panel-body bg-info">
                <h2 class="text-center">LOGIN FORM</h2>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> WRONG EMAIL AND PASSWORD.
                        </div>
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="u_email" placeholder="YOUR EMAIL" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="password" name="u_pass" placeholder="YOUR PASS" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="LOGIN" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>




</div>

<?php include 'inc/footer.php'; ?>