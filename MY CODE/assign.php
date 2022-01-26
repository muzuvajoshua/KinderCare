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
    <title>KCES</title>
</head>
<body>
    <?php require ("header.php"); ?>
    <h2>ASSIGNMENT UPLOAD PAGE</h2>

    <div>
<form action="assign.php" method ="POST">

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
<button type="submit" name="upload">POST ASSIGNMENT </button>
<button><a href="#"> ADD ASSIGNMENT </a> </button>


</form>
    </div>
</body>
</html>