<?php include 'lib/UserHandleCode.php'; ?>
<?php include 'inc/header.php'; ?>

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


        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h2>USER DETAILS</h2><br><br>
                        <span style="font-weight:bold"><?php echo $_SESSION['u_name'] ?></span><br><br><br>
                        <span style="font-weight:bold"><?php echo $_SESSION['u_email'] ?></span><br><br><br>
                        <span style="font-weight:bold"><?php echo $_SESSION['u_address'] ?></span><br><br><br>
                    </div>

                    <?php 
                        $ur = new UserApp();
                        $id = $_GET["id"];
                        $showRoom = $ur->showSingleRoom($id);
                        $showData = $showRoom->fetch_assoc();
                    ?>

                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <span style="font-weight:bold">ROOM NAME</span><br><br><br>
                                <span style="font-weight:bold">ROOM NUMBER</span><br><br><br>
                                <span style="font-weight:bold">TOTAL BED</span><br><br><br>
                                <span style="font-weight:bold">GUEST CAPACITY</span><br><br><br>
                                <span style="font-weight:bold">ROOM PRICE</span><br><br><br><br><br><br><br><br><br>
                                <span style="font-weight:bold">ROOM IMAGE</span><br><br><br><br><br><br><br><br>
                                <span style="font-weight:bold">START FROM</span><br><br><br>
                                <span style="font-weight:bold">END TO</span>
                                
                                
                                
                            </div>

                            <div class="col-sm-4">
                                <span style="font-weight:bold">: <?php echo $showData['r_name'] ?> </span><br><br><br>
                                <span style="font-weight:bold">: <?php echo $showData['r_number'] ?> </span><br><br><br>
                                <span style="font-weight:bold">: <?php echo $showData['r_bed_no'] ?> </span><br><br><br>
                                <span style="font-weight:bold">: <?php echo $showData['r_capacity'] ?> </span><br><br><br>
                                <span style="font-weight:bold">: <?php echo $showData['r_price'] ?>/= </span><br><br><br>
                                <span style="font-weight:bold"><img src="admin/images/<?php echo $showData['r_image'] ?>" alt="demo image" width="250px" height="250px"> </span><br><br><br>
                            
                            <?php
                                global $msg;
                                global $msg2;
                                $myArr = array($showData);
                                If($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    $count = 2;
                                    if(empty($_POST["start_from"]) || empty($_POST["to_end"]))
                                    {
                                        $msg = "PLEASE ENTER DATE";
                                        $count++;
                                    }
                                    
                                    if($_POST["start_from"] > $_POST["to_end"])
                                    {
                                        $msg2  = "PLEASE ENTER VALID DATE";
                                        $count++;
                                    }

                                    if($count == 2)
                                    {
                                        
                                    $r_name = $myArr[0]['r_name'];
                                    $r_bed_no = $myArr[0]['r_bed_no'];
                                    $r_capacity = $myArr[0]['r_capacity'];
                                    $r_price = $myArr[0]['r_price'];
                                    $r_number = $myArr[0]['r_number'];
                                    $start_from = $_POST["start_from"];
                                    $to_end = $_POST["to_end"];
                                    $session_id = session_id();
                                    while(0==0)
                                    {
                                        global $userArr;
                                        $start_from = date('Y-m-d', strtotime($start_from . "+ 1 days"));
                                        $userArr[] = $start_from;
                                        if($start_from==$to_end)
                                        {
                                            break;
                                        }
                                    }
                                    $startFrom = $userArr[0];
                                    $total_day = count($userArr);
                                    $_SESSION["sessionDay"] = $total_day;
                                    $dateArray = implode(" ",$userArr);
                                    $_SESSION["sessionDate"] = $dateArray;
                                    $selectDatabaseArray = $ur->selectDatabaseArrayMethod($r_number);
                                    global $databaseArray;
                                    foreach($selectDatabaseArray as $data)
                                    {
                                        $databaseArray[] = $data['date_array']."<br>";
                                    }
                                    $uniqueArray = array_unique($databaseArray);
                                    $stringData = implode(" ",$uniqueArray);
                                    $arrayData = explode(" ",$stringData);
                                   
                                   for($i = 0; $i <= count($userArr); $i++)
                                   {
                                    if(in_array($userArr[$i], $arrayData))
                                    {
                                        echo "DATE IS NOT AVAILABLE PLEASE TRY AGAIN";
                                        break;
                                    }else{
                                        $insertData = $ur->cartData($r_name,$r_bed_no,$r_capacity,$r_price,$r_number,$startFrom,$to_end,$session_id,$total_day,$dateArray);
                                        break;
                                    }
                                   }
                                    }
                                }
                            ?>

                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                    <?php if(isset($insertData)){ ?>
                                        <?php echo $insertData; ?>
                                    <?php } ?>

                                    <div class="form-group">
                                        <input type="date" name="start_from" placeholder="FROM START" class="form-control">
                                        <span><?php echo $msg; ?></span>
                                        <span><?php echo $msg2; ?></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="date" name="to_end" placeholder="TO END" class="form-control">
                                        <span><?php echo $msg; ?></span>
                                        <span><?php echo $msg2; ?></span>
                                    </div>

                                    <div class="form-group text-center">
                                        <input type="submit" value="REGISTER ROOM" class="btn btn-info">
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
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