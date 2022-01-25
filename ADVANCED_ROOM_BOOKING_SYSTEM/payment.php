<?php include 'lib/UserHandleCode.php'; ?>
<?php include 'inc/header.php' ?>

<?php
	if($_SESSION['u_name'] == "" || $_SESSION['u_name'] == null)
	{
		header("Location: home.php");
	}
?>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body bg-info">
                <div class="col-sm-8">
                <h2 style="color:blue;"><a href="home.php" style="text-decoration:none">ROOM BOOKING SYSTEM</a></h2>
                </div>

                <div class="col-sm-4 text-right" style="margin-top:20px;font-size: 15px;">
                    <?php
                        if(isset($_SESSION['u_name']))
                        {
                    ?>
                    WELCOME <b><?php echo $_SESSION['u_name'] ?></b> <a href="logOut.php">LOGOUT</a>


                    <?php }else{ ?>

                    <a href="login.php">LOGIN</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="register.php">REGISTER</a>

                    <?php } ?>
                </div>
            </div>
        </div>

        <?php
            $ur = new UserApp();
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $_SESSION["s_method"] = $_POST['u_payment_method'];
                $_SESSION["s_id"] = $_POST['u_payment_id'];
                $u_payment_method = $_POST['u_payment_method'];
                $u_payment_id = $_POST['u_payment_id'];
                $session_id = session_id();
                $u_name = $_SESSION['u_name'];
                $u_email = $_SESSION['u_email'];
                $payment_tk = ($_SESSION["sessionDay"] * 1000);
                $u_status = $_SESSION["status"];

                
                $dataInsert = $ur->userPayment($u_payment_method,$u_payment_id,$session_id,$u_name,$u_email,$payment_tk,$u_status);
            }
            
        ?>


        <div class="panel panel-default">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h3>YOUR PROFILE</h3><br><br>
                    <span style="font-weight:bold"><?php echo $_SESSION['u_name'] ?></span><br><br><br>
                    <span style="font-weight:bold"><?php echo $_SESSION['u_email'] ?></span><br><br><br>
                    <span style="font-weight:bold"><?php echo $_SESSION['u_address'] ?></span><br><br><br>
                </div>

                <div class="col-sm-8" style="margin-top:10px;">
                    <?php if(isset($dataInsert)){ ?>
                        <div class="alert alert-success">
                            <?php echo $dataInsert; ?>
                        </div>
                    <?php } ?>
                    <form action="payment.php" method="POST">
                        <div class="row" style="margin-top:20px;margin-bottom:20px;">
                            <div class="col-sm-4 text-right">
                                <b><h5>BILL NAME : </h5></b><br><br>
                                <b><h5>LIVING DATE : </h5></b><br><br>
                                <b><h5>TOTAL DAY : </h5></b><br><br>
                                <b><h5>TOTAL COST : </h5></b><br><br>
                                <b><h5>PAYMENT METHOD NAME : </h5></b><br><br>
                                <b><h5>PAYMENT ID NUMBER : </h5></b>
                            </div>

                            <div class="col-sm-4">
                                <b><h5><?php echo $_SESSION['u_name'] ?> </h5></b><br><br>
                                <b><h5><div><?php echo $_SESSION["sessionDate"] ?></div> </h5></b><br><br>
                                <b><h5><?php echo $_SESSION["sessionDay"] ?> </h5></b><br><br>
                                <b><h5><?php echo ($_SESSION["sessionDay"] * 1000) ?>/=</h5></b><br><br>
                                <select name="u_payment_method" id="" class="form-control">
                                    <option value="nothing">--SELECT PAYMENT METHOD--</option>
                                    <option value="BKASH">BKASH</option>
                                    <option value="ROCKET">ROCKET</option>
                                </select><br><br>
                                <input type="text" placeholder="PAYMENT METHOD NAME" name="u_payment_id" class="form-control"><br><br>
                                <input type="submit"  name="PAYMENT" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer>
            <div class="panel panel-default">
                <div class="panel-body bg-info">
                    <h5 class="text-center">&copy;2020 All rights reserved | Room Booking System</h5>
                </div>
            </div>
        </footer>
        
    </div>
<?php include 'inc/footer.php' ?>