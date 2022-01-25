<?php
include "inc/header.php";
include "lib/blog.php";
?>

<?php
error_reporting(0);
if (isset($_GET['cat_name']))

$per_page = 2;

if (isset($_GET['p'])) {
    $page = $_GET['p'];
}else{
    $page = 1;
}

$start_form = ($page - 1) * $per_page;
?>

<?php
 $blog = new Blog();

 $getData = $blog->selectPostByCategory($start_form, $per_page, $_GET['cat_name']);
?>

<?php
$getCat = $blog->selectCAT();
?>

<div class="container container-fluid">
    <div class="row">
        <?php
            include "./inc/categoryList.php";
        ?>


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
                    <a href="getDetails.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Read More</a>
                <?php } } ?>

            <?php
            $totalPost = $blog->countTotalPostByCategory($_GET['cat_name']);
            $total_page = ceil($totalPost / 3);
            ?>


            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <?php
                    if ($total_page > 0) {
                        for ($i = 1; $i <= $total_page; $i++) {
                            ?>
                            <li class="page-item"><a class="page-link" href="?p=<?php echo $i; ?>&cat_name=<?php echo $_GET['cat_name']; ?>"><?php echo $i; ?></a></li>
                        <?php } } ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>



    </div> <br> <br>
</div>

<?php
include "inc/footer.php";
?>
