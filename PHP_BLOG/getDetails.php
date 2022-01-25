<?php
include "inc/header.php";
include "lib/blog.php";
?>

<?php
    error_reporting(0);
    $blog = new Blog();
    $id = $_GET['id'];
    $getData = $blog->selectPostById();
    $data = $getData->fetch_assoc();
?>



<div class="container container-fluid">
    <div class="row">
        <div class="col-md-16">
            <h2><?php echo $data['name']; ?></h2>
            <p><?php echo $data['category'] ?></p>
            <p><?php echo $data['description']; ?></p>
        </div>
    </div> <br>
</div>

<?php
include "inc/footer.php";
?>
