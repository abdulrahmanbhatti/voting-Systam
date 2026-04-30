<?php
session_start();
include('include/connection.php');
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query = "SELECT * FROM voters WHERE email ='$email' AND password ='$password'";
   $result= $conn->query($query);

   if($result->num_rows > 0){
    $voter =  $result->fetch_assoc();
    $_SESSION['email']=$voter['email'];
    $_SESSION['name']=$voter['name'];
    $_SESSION['vid']=$voter['vid'];
    header('location:voters/dashboard.php');

   }
   else {
        echo "<script>
        alert('Invalid Credentials ');
         header('location:login.php');
        </script>";
       
   }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js "></script>
</head>
<body>
    <div class="container-fluid header ">
        <h3>Online Voting System </h3>
    </div>
   <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3 m-auto voter-login-form">
            <center><h4><u>Voter Login Form </u></h4></center>
            <br>
            <form action="login.php" method = "POST">
             <div class="form-group">
                <label for="email">Enter Email </label>
                <input type="email" class ="form-control" name="email" placeholder="Enter email " required >
            </div>
             <div class="form-group">
                <label for="password">Your password  </label>
                <input type="password" class ="form-control" name="password" placeholder="Your password " required >
            </div>
            <button type="submit" class="btn btn-primary" name="login">login</button>
            <!-- <input type="submit" class="btn btn-primary" value="Register"
            name="register"> -->
            <span>Haven't register yet ?</span><a href="register.php">Register here</a>
            </form>
        </div>
    </div>
   </div>
</body>
</html>