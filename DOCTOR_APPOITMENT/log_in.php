<?php
    session_start();
    include "inc/header.php";
    include "lib/Appoitment.php";
?>


<?php
    $app = new App();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;

        $selectAd = $app->AdminData();

        $data = $selectAd->fetch_assoc();

        if($name == $data['email'] && $pass == $data['pass'])
        {   
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $pass;
            
            header('Location: home.php');
        }
        else
        {
            echo "<div class='alert alert-danger'><strong>You Entered Wrong Email and Password Please Enter Valid Email And Password</strong></div>";
        }
    }
?>




<div class="well" style="margin-top:80px">
    <h4 class="text-center">Wellcome To Our Admin Panel</h4> <br>
    <h4 class="text-center" style="margin-bottom:30px">Admin Log In</h4>

    <div class="row">
        <div class="col-sm-6 col-md-offset-3">
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Enter Admin Email">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="pass" placeholder="Enter Admin Password">
                </div>

                <div class="form-group">
                    <input type="submit" value="Log In" class="btn btn-success" name="log">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include "inc/footer.php";
?>