<?php
    include "inc/header.php";
    include "lib/Appoitment.php";
?>



<div class="well">
    <h2 class="text-center">All patient</h2>
    
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Pay status</th>
            <th>Doctor name</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>

        <?php
            error_reporting(0);
            $app = new App();
            if(isset($_POST['data']))
            {
                $name = $_POST["search"];
                $searchPatient = $app->searchPData($name);
            }
        ?>
        <?php
            foreach($searchPatient as $data)
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
        </tr>

        <?php } ?>

        <a href="home.php" class="btn btn-success">Back</a>
    </table>
</div>

<?php
    include "inc/footer.php";
?>