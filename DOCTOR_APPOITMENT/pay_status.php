<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>

<div class="well" style="margin-top:50px">
    <h3 class="text-center">All Patient Information</h3> <br> 
    
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Doctor Name</th>
            <th>Payment Status</th>
            <th>Amount</th>
            <th>Update Payment</th>
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
            <td>
                <a href="update_pay.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Update</a>
            </td>
        </tr>

        <?php } ?>

        
    </table>
</div>

<?php
    include "inc/footer.php";
?>