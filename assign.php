<?php
include "connection.php";
$status1 = "EXPIRED";

$status3 = "ACTIVE";
date_default_timezone_set("Africa/Nairobi");
$crntdate = date('y-m-d H:i:s');
$message = "";

// $sql1 = "UPDATE assignments SET status='$status3' where Start_time BETWEEN '$crntdate' AND End_time;";
// mysqli_query($link, $sql1);

$query3 = "UPDATE assignments SET status='$status3' where Start_time > '$crntdate';";
mysqli_query($link, $query3);

$query4 = "UPDATE assignments SET status='$status1' where Start_time < '$crntdate';";
mysqli_query($link, $query4);


if (isset($_POST['upload'])) {



    $assignName = mysqli_real_escape_string($link, $_POST['assignmentname']);
    $Numbers = mysqli_real_escape_string($link, $_POST['number']);
    $list = mysqli_real_escape_string($link, $_POST['list']);
    $Tstart = mysqli_real_escape_string($link, $_POST['start']);
    $Tend = mysqli_real_escape_string($link, $_POST['end']);

    $query4 = "INSERT INTO assignments (Start_time, End_time, Assignment_name, Number_of_characters, list_of_characters) VALUES('$Tstart', '$Tend','$assignName', $Numbers, '$list');";
    mysqli_query($link, $query4);
    $message='<h5 style= "background-color:cadetblue; font-size:20px; 
    text-align:center; padding:10px 0px;">'.$assignName.' '.'has been uploaded'.'</h5>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
      <style>
          label{
              color: black;
          }
      </style>

    <title>KCES</title>
</head>

<body>
    <?php require("header.php"); ?>

    <div class="wrapper">
        <div class="dash-board">
            <a href="pupils.php">
                <div class="p-4"> <img src="activation2.png" alt=""> Pupil's Details</div>
            </a>
            <a href="register.php">
                <div class="p-4"><img src="register.jpg" alt="">Register Pupil</div>
            </a>
            <a href="assign.php">
                <div style=" background-color: cadetblue;" class="p-4"> <img src="assignment.png" alt="">Post Assignment</div>
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

            <form action="assign.php" method="POST" class = "bg-secondary">
                <?php echo $message ?>
                <h5>ASSIGNMENT UPLOAD PAGE</h5>
                <label for="assignmentname">ASSIGNMENT NAME: </label>
                <input class = "form-control" type="text" name="assignmentname" required>
                <label for="number">NUMBER OF CHARACTERS: </label>
                <input class = "form-control" type="number" name="number" required min = "1" max = "8">
                <label for="list">LIST OF CHARACTERS:  </label>
                <input class = "form-control" type="text" name="list" placeholder="eg; JMNBKR" required>
                <label for="start">START TIME: </label>
                <input class = "form-control" type="datetime-local" name="start" required>
                <label for="end">END TIME: </label>
                <input class = "form-control" type="datetime-local" name="end" required>
                <button type="submit" name="upload" class="btn">POST ASSIGNMENT </button>
            </form>
        </div>
    </div>




    <?php include "footer.php"; ?>

</body>

</html>