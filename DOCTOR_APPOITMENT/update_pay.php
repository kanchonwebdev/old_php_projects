<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>


<?php
    error_reporting(0);
    $app = new App();
        
    if(isset($_POST['submit']))
    {
        $id = $_GET['id'];
        $u_pay = $_POST["u_pay"];
        $u_amounts = $_POST["u_amount"];

        $updatePay = $app->patientPayment($u_pay,$u_amounts,$id);
    }
?>

<?php
    if(isset($updatePay))
    {
        echo "<div style='margin-top:20px'  class='alert alert-success'><strong>Payment Update Successfully</strong></div>";
    }
?>





<div class="well" style="margin-top:50px">
    <h2 class="text-center">Update Payment</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <div class="form-group">
                    <select class="form-control" name="u_pay">
                        <option valu="Paid">Select Pay Option</option>
                        <option value="Paid">Paid</option>
                        <option value="Pay Later">Pay Later</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="number" name="u_amount" class="form-control" placeholder="Enter Full Amount Of full Fees">
                </div>

                <div class="form-group">
                    <input type="submit" value="Update Payment" class="btn btn-success" name="submit">
                    <a class="btn btn-info" href="home.php">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include "inc/footer.php";
?>