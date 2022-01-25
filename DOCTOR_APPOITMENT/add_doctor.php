<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>


<?php
    error_reporting(0);
    $app = new App();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST["a_doctor"];

        $insDoc = $app->insDocData($name);
    }
?>
<?php
    if(isset($insDoc))
    {
        echo "<div class='alert alert-success'><strong>Doctor Added Succesfully</strong></div>";
    }
?>

<div class="well" style="margin-top:50px">
    <h2 class="text-center">Add Doctor</h2>

    <div class="row">
        <div class="col-md-6 col-sm-offset-3">
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="a_doctor" placeholder="Enter doctor name">
                </div>

                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-success">
                    <a href="home.php" class="btn btn-info">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include "inc/footer.php";
?>