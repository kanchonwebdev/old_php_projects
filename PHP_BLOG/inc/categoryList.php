<div class="col-md-3">
    <div class="list-group">
        <a href="" class="list-group-item active">CATEGORY NAME</a>
        <?php  if ($getCat){ while($data = $getCat->fetch_assoc()){ ?>
            <a href="postsByCategory.php?cat_name=<?php echo $data['cname']; ?>" class="list-group-item"><?php echo $data['cname']; ?></a>
        <?php } } ?>
    </div>
</div>