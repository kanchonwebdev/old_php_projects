<?php
include "inc/header.php";
include "lib/blog.php";
?>



<?php

$blog = new Blog();
if (isset($_POST['submit']))
{
    $text = $_POST['text'];

    $getIns = $blog->insertCategory($text);
}
?>


<div class="container container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">ADD POST</a>
                <a href="addCategory.php" class="list-group-item">ADD CATEGORY</a>
                <a href="#" class="list-group-item">UPDATE POST</a>
                <a href="#" class="list-group-item">DELETE POST</a>
            </div>
        </div>

        <div class="col-md-8">
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="text" class="form-control" placeholder="Enter Category Name">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-info" value="Add Post">
                </div>
            </form>
        </div>

    </div>
</div>

<?php
include "inc/footer.php";
?>
