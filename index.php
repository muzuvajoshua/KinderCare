<?php
include"connection.php";

if(isset($_POST['login'])){
    $userName= mysqli_real_escape_string($link, $_POST['username']);
    $password= mysqli_real_escape_string($link, $_POST['password']);
    $query2="SELECT username, passwords FROM teachers;";

    $result=mysqli_query($link, $query2);
    $resultzo = mysqli_fetch_assoc($result);
        if($userName==$resultzo['username'] && $password==$resultzo['passwords']){
        header("Location:register.php");
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
    <h2>Teacher's login page</h2>

    <div>
<form action="index.php" method ="POST">

<label for="username">USER NAME</label>
<input type="text" name="username">
<labe>PASSWORD</label>
<input type="password" name = "password">
<button type="submit" name="login">LOG IN </button>
<p>First time here? <a href="signup.php"> sign up </a> </p> 
</form>
    </div>
</body>

</html>
