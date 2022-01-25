<?php
    session_start();
    if(empty($_SESSION['name']))
    {
        header("Location: log_in.php");
    }
?>





<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>


<?php
    //patient appoitment
    $app = new App();

    if(isset($_POST['patient']))
    {
        $name = $_POST["p_name"];
        $number = $_POST["p_contact"];
        $email = $_POST["p_email"];
        $doctor = $_POST["doctor"];
        $pay_status = $_POST["pay_status"];
        $amount = $_POST["amount"];
        $date = $_POST["date_month"];

        $insPData = $app->insertPatientData($name,$number,$email,$doctor,$pay_status,$amount,$date);
    }
?>







<?php
    if(isset($insPData))
    {
        echo "<div style='margin-top:20px' class='alert alert-success'><strong>Appointment Register Successfully </strong></div>";
    }
?>

<div class="well" style="margin-top:25px">
<div><h2 class="text-center">Doctor Appointment System</h2></div> <br>
    <div class="row">
        <form action="search_data.php" method="post">
            <div class="col-md-11">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Enter Patient Contact Number">
                </div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                    <input type="submit" class="btn btn-info" name="data" value="Search">
                </div>
            </div>
        </form>
    </div>



    <div class="row">
        
        <div class="col-md-3">
            <div class="list-group">
                <a href="home.php" class="list-group-item active">Patient Appoitment</a>
                <a href="all_patient.php" class="list-group-item">All Patient</a>
                <a href="add_doctor.php" class="list-group-item">Add Doctor</a>
                <a href="pay_status.php" class="list-group-item">Pay Status</a>
                <a href="log_out.php" class="list-group-item">Log Out</a>
            </div>
        </div>

        <div class="col-md-9">
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="p_name" placeholder="Enter Patient Name" class="form-control">
                </div>

                <div class="form-group">
                    <input type="number" name="p_contact" placeholder="Enter Mobile Number" class="form-control">
                </div>

                <div class="form-group">
                    <input type="email" name="p_email" placeholder="Enter Patient Email" class="form-control">
                </div>

                
                <div class="form-group">
                    <select class="form-control" name="doctor">
                    <option>Select Doctor Name</option>
                        <?php
                            $selectDoc = $app->SelectDoctor();
                            foreach($selectDoc as $data)
                            {
                        ?>
                        <option class="form-control" value="<?php echo $data['name'] ?>"> <?php echo $data['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="number" placeholder="Enter Appointment Fee" class="form-control" name="amount">
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="date_month">
                </div>

                <div class="form-group">
                    <select class="form-control" name="pay_status">
                        <option>Select Pay Satus Option</option>
                        <option value="Paid">Paid</option>
                        <option value="Pay Later">Pay Later</option>
                    </select>
                </div>

                <div class="form-group">
                    <input class="btn btn-info" name="patient" type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>




<?php
    include "inc/footer.php";
?>