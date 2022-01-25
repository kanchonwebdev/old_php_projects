<?php
include "inc/header.php";
include "lib/blog.php";
?>



<?php

$blog = new Blog();
if (isset($_POST['submit']))
{
    $text = $_POST['text'];
    $description  = $_POST['description'];
    $cat = $_POST['cat'];

    $getIns = $blog->UpdatesPost($text,$description,$cat);
}
?>


<?php
  $id = $_GET['id'];
  $getData = $blog->selectPostById();
  $data = $getData->fetch_assoc();
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
                    <input type="text" name="text" class="form-control" placeholder="Enter Category Name" value="<?php echo $data['name'] ?>">
                </div>

                <?php
                $getCat = $blog->selectCAT();
                ?>
                <select name="cat" class="form-control">
                    <?php  if ($getCat){ while($data = $getCat->fetch_assoc()){ ?>
                        <option value="<?php echo $data['cname']; ?>"><?php echo $data['cname']; ?></option>
                    <?php } } ?>
                </select> <br>

                <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $data['description'] ?></textarea> <br>

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
