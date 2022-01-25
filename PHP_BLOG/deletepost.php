<?php
include "lib/blog.php";
?>

<?php
  $blog = new Blog();
  $id = $_GET['id'];
  $data = $blog->DeletePost();
?>
