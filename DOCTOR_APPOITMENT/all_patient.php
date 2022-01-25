<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>



<div class="well" style="margin-top:50px">
    <h2 class="text-center">All Patient <a href="home.php" class="btn btn-primary pull-right">Back</a></h2> <br>
    
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Pay status</th>
            <th>Doctor name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>View All</th>
        </tr>

        <?php
            error_reporting(0);
            $app = new App();
            $showPatient = $app->selectPatient();
            foreach($showPatient as $data)
            {
        ?>

        <tr>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['contact'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['doc_name'] ?></td>
            <td><?php echo $data['pay_status'] ?></td>
            <td><?php echo $data['p_amount'] ?></td>
            <td><?php echo $data['p_date'] ?></td>
            <td>
                <a class="btn btn-info" href="view_all.php?id=<?php echo $data['id'] ?>">View</a>
            </td>
        </tr>

        <?php } ?>


    </table>
    
</div>

<?php
    include "inc/footer.php";
?>