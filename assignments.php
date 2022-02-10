<?php

include "connection.php";
if (isset($_GET['assignmentId'])) {
    $assid = $_GET['assignmentId'];
    $query = "SELECT * FROM assignments where AssignmentID='$assid';";
    $result = mysqli_query($link, $query);
    $res1 = mysqli_fetch_assoc($result);

    $query2 = "SELECT COUNT(DISTINCT user_code) AS attempts FROM scores WHERE AssignmentID='$assid';";
    $result2 = mysqli_query($link, $query2);
    $res2 = mysqli_fetch_assoc($result2);

    $query3 = "SELECT AVG(scores) AS averages FROM scores WHERE AssignmentID='$assid';";
    $result3 = mysqli_query($link, $query3);
    $res3 = mysqli_fetch_assoc($result3);

    $avg = number_format($res3['averages'], 2);


    $query4 = "SELECT AVG(duration) AS avg_time FROM scores WHERE AssignmentID='$assid';";
    $result4 = mysqli_query($link, $query4);
    $res4 = mysqli_fetch_assoc($result4);

    $averagetime = number_format($res4['avg_time'], 2);


    //query for chart
    $chart = "SELECT user_code, scores FROM scores WHERE AssignmentID='$assid' ORDER BY scores;";

    $res = mysqli_query($link, $chart);
    foreach ($res as $row) {
        $usercode[] = $row['user_code'];
        $score[] = $row['scores'];
    }




    // echo $assid;
    // $query = "SELECT * FROM score where AssignmentID = '$assid';";
    // $result = mysqli_query($link, $query);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Document</title>

</head>

<body>

    <?php include "header.php" ?>
    <div class="wrapper">
        <div class="dash-board">

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

        <div class="content p-5">

            <h4>Assignment <?php echo $assid ?> details</h4>
            <section>
                <p>ASSIGNMENT NAME: <?php echo $res1['Assignment_Name'] ?></p>
                <p>CHARACTER LIST: <?php echo $res1['list_of_characters'] ?></p>
                <p>ATTEMPTS: <?php echo $res2['attempts'] ?></p>
                <p>NOT ATTEMPTED: <?php echo $res1['Assignment_Name'] ?></p>
                <p>AVERAGE TIME OF ATTEMPT: <?php echo $averagetime ?> seconds</p>
                <p>AVERAGE SCORE: <?php echo $avg ?> %</p>
            </section>

            <div>
                <canvas id="pupilChart" width="100" height="50"></canvas>

            </div>

        </div>
    </div>

    <!-- JAVA SCRIPT FOR CHARTS -->


    <script>
        const labels = <?php echo json_encode($usercode);
                        ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'SCORE',
                data: <?php echo json_encode($score);
                        ?>,
                backgroundColor: [
                    'rgba(255, 99, 132 )',
                    // 'rgba(255, 159, 64)',
                    // 'rgba(255, 205, 86,)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                    'rgba(153, 102, 255)',
                    // 'rgba(201, 203, 207)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    // 'rgb(255, 159, 64)',
                    // 'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    // 'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        //THE CONFIGURATION.
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('pupilChart'),
            config
        );
    </script>
    <?php include "footer.php"; ?>

</body>

</html>