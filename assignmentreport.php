<?php

include "connection.php";

$query = "SELECT * FROM assignments;";
$result = mysqli_query($link, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
        .content form {
            width: 100% !important;
            height: 30px !important;

        }
    </style>
    <title>Document</title>

</head>

<body>

    <?php include "header.php" ?>
    <div class="wrapper">
        <div class="dash-board">
            <a href="pupils.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Pupil's Details</div>
            </a>
            <a href="register.php">
                <div class="p-4"><img src="register.jpg" alt="">Register Pupil</div>
            </a>
            <a href="assign.php">
                <div class="p-4"> <img src="assignment.png" alt="">Post Assignment</div>
            </a>
            <a href="scores.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Pupil Scores</div>
            </a>
            <a href="status.php">
                <div class="p-4"> <img src="status.jpg" alt="">Change Pupil's Status</div>
            </a>
            <a href="reports.php">
                <div class="p-4"><img src="report.png" alt="">Reports</div>
            </a>

            <a href="requests.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Activation Requests</div>
            </a>
        </div>

        <div class="content">
            <!-- <table border="2"> -->
            <table class="table table-sm table-light table-hover table-bordered m-5 container">

                <thead align="center">
                    <h4>ASSIGNMENTS REPORTS</h4>
                </thead>
                <tr>
                    <th>ASSIGNMENT ID</th>
                    <th>ASSIGNMENT NAME</th>
                    <th>START TIME</th>
                    <th>STATUS</th>
                    <th>ACTION</th>


                </tr>
                <?php foreach ($result as $x) { ?>

                    <tr>
                        <td><?php echo $x['AssignmentID']; ?> </td>
                        <td><?php echo $x['Assignment_Name']; ?> </td>
                        <td><?php echo $x['Start_time']; ?> </td>
                        <td><?php echo $x['status']; ?> </td>

                        <td>
                            <a href="assignments.php?assignmentId=<?php echo $x['AssignmentID']; ?>">VIEW DETAILS </a>
                        </td>




                    </tr>
                <?php }; ?>





            </table>





        </div>
    </div>

    <?php include "footer.php"; ?>


</body>

</html>