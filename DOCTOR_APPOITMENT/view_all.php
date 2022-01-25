<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>


<?php
    error_reporting(0);

    $app = new App();
    $id = $_GET['id'];

    $viewData = $app->viewSinglePatient($id);
?>

<div class="well" style="margin-top:50px">
    <h3 class="text-center">Wellcome To Our Hospital</h3> <hr> 
    <h4 class="text-center">Patient Information</h4>
    <hr>
    <?php
        $data = $viewData->fetch_assoc();
    ?>

    <div class="row col-sm-offset-2">
        <div class="col-sm-6">
            <span><b>Serial No.</b></span> <br> <br>
            <span><b>Name</b></span> <br> <br>
            <span><b>Contact</b></span> <br> <br>
            <span><b>Email</b></span> <br> <br>
            <span><b>Doctor Name</b></span> <br> <br>
            <span><b>Pay Satus</b></span> <br> <br>
            <span><b>Amount Of Tk</b></span> <br> <br>
            <span><b>Date</b></span> <br> <br>
            <a class="btn btn-info" href="home.php">Back</a>
            <input type="button" class="btn btn-primary" value="Print" onClick="window.print()">
        </div>


        <div class="col-sm-6">
            <span><?php echo $data['id']; ?></span> <br> <br>
            <span><?php echo $data['name']; ?></span> <br> <br>
            <span><?php echo $data['contact']; ?></span> <br> <br>
            <span><?php echo $data['email']; ?></span> <br> <br>
            <span><?php echo $data['doc_name']; ?></span> <br> <br>
            <span><?php echo $data['pay_status']; ?></span> <br> <br>
            <span><?php echo $data['p_amount']; ?>.00 Tk</span> <br> <br>
            <span><?php echo $data['p_date']; ?></span> <br> <br>
        </div>
    </div>
   
</div>

<?php
    include "inc/footer.php";
?>