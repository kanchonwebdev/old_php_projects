<?php
include "inc/header.php";
include "lib/blog.php";
?>

<?php
$blog = new Blog();
$getData = $blog->selectPost();
?>



<div class="container container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">CATEGORY NAME</a> <br>
                <a href="admin.php" class="btn btn-info">BACK</a>
            </div>
        </div>


        <div class="col-md-7">
            <?php
            if ($getData)
            {
                while ($data = $getData->fetch_assoc())
                {
                    ?>
                    <h2><?php echo $data['name'] ?></h2>
                    <p><?php echo $data['category'] ?></p>
                    <p>
                        <?php
                        $show = $data['description'];
                        if (strlen($show) >150)
                        {
                            $text = substr($show, 0,350);
                            echo $text.'........';
                        }
                        ?>
                    </p>
                    <a href="deletepost.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                <?php } } ?>
        </div>



    </div> <br> <br>
</div>

<?php
include "inc/footer.php";
?>
