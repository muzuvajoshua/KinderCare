<?php
include"connection.php";

if (isset($_POST['upload'])){
    $assignName=mysqli_real_escape_string($link, $_POST['assignmentname']);
    $Numbers=mysqli_real_escape_string($link, $_POST['number']);
    $list=mysqli_real_escape_string($link, $_POST['list']);
    $Tstart=mysqli_real_escape_string($link, $_POST['start']);
    $Tend=mysqli_real_escape_string($link, $_POST['end']);


    $query4="INSERT INTO assignments (Start_time, End_time, Assignment_name, Number_of_characters, list_of_characters) VALUES('$Tstart', '$Tend','$assignName', '$Numbers', '$list');";
  
    if(mysqli_query($link, $query4)){
       header("Location:assign.php");
   } 
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        .content form{
            margin: 10px auto;
            width: 500px;
            height: 550px;
            background-color:dodgerblue;
            padding: 20px 70px;
        }

        .content form label{
            display: block;
            margin-right: 10px;
            margin-top: 10px;
           
        }
        .content form input {
            outline: none;
            width: 100%;
            height: 30px;
            border-radius: 5px;
            border: none;
        }

        .content h2{
            margin-bottom: 20px;
        }

        .content .btn{
            margin-top: 20px;
            padding: 10px 30px;
            border: none;
            margin-right: 30px;

        }

        .content .btn:hover{
            transform: scale(0.96);
            transition: 200ms;
        }
    </style>

    <title>KCES</title>
</head>
<body>
    <?php require ("header.php"); ?>
   
    <div class="wrapper">
        <div class="dash-board">
            
                <a href="register.php"><div>Register Pupil</div></a>
                <a href="assign.php"><div>Post Assignment</div></a>
                <a href="status.php"><div>Change Pupil's Status</div></a>
                <a href="reports.php"><div>Reports</div></a>
        </div>

        <div class="content">

            <form action="assign.php" method ="POST">
                <h2>ASSIGNMENT UPLOAD PAGE</h2>
                <label for="assignmentname">ASSIGNMENT NAME</label>
                <input type="text" name="assignmentname">
                <label for="number">NUMBER OF CHARACTERS</label>
                <input type="number" name="number">
                <label for="list">LIST OF CHARACTERS( comma separated)</label>
                <input type="text" name="list">
                <label for="start">START TIME</label>
                <input type="datetime-local" name="start">
                <label for="end">END TIME</label>
                <input type="datetime-local" name="end">
                <button type="submit" name="upload" class = "btn">POST ASSIGNMENT </button>
            </form>
        </div>
    </div>
    

 
       

</body>
</html>