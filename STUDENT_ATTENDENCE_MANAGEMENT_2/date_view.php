<?php
include 'inc/header.php';
include 'lib/student.php';
?>



    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>
                <a class="btn btn-success" href="add.php">Add Student</a>
                <a class="btn btn-info pull-right" href="index.php">Back</a>
            </h3>
        </div>


        <div class="panel-body">


            <form action="" method="post">
                <table class="table table-striped">
                    <tr>
                        <th width="30%">Serial</th>
                        <th width="50%">Attendence date</th>
                        <th width="20%">Action</th>
                    </tr>



                    <?php
                    $stu = new Student();
                    $get_date = $stu->getDateList();

                    if ($get_date) {
                        $i = 0;
                        while ($value = $get_date->fetch_assoc()) {
                            $i++;

                            ?>


                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['att_time']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time']; ?>">View</a>
                                </td>
                            </tr>

                        <?php } } ?>
                </table>
            </form>
        </div>
    </div>




<?php include 'inc/footer.php'; ?>