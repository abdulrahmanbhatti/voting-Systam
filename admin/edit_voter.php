<?php
session_start();
include('../include/connection.php');
$vid = $_GET['vid'];
if(isset($_POST['Update'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $address= $_POST['address'];
    // $query="UPDATE voters SET name= '$name',email='$email',mobile='$mobile',address='$address' WHERE vid=$_SESSION[vid]";
    $query="UPDATE voters SET name= '$name',email='$email',mobile='$mobile',address='$address' WHERE vid=$vid";
   $result= $conn->query($query);
   if($result){
     echo "<script >
        alert('voter Updated  Successfully');
        window.location.href = 'dashboard.php';
        </script>";

   }
   else{
      echo "<script >
        alert('Error plz try again ');
        window.location.href = 'dashboard.php';
        </script>";

   }

}
$query = "SELECT * FROM voters WHERE vid =$vid";
$result= $conn->query($query);
$voter=$result->fetch_assoc();
if(isset($_POST['Update']))



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter dashboard</title>
    <link rel="stylesheet" href="../voters/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid header ">
        <h3>Online Voting System </h3>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-4 mt-4 m-auto" id="edit_profile">
            <center><h4><u>Edit voter Detail </u></h4></center>
            <form action="" method="POST"  onsubmit =" return validateForm()">
            <div class="form-group">
                <label for="name">Enter Name </label>
                <input type="text" class ="form-control" name="name" id="name" value = "<?php echo $voter['name']?>" required >
                <small id ="nameError" class="form-text text-danger"></small>
            </div>
             <div class="form-group">
                <label for="email">Enter Email </label>
                <input type="email" class ="form-control" name="email" id="email" value = "<?php echo $voter['email']?>" required >
                 <small id ="emailError" class="form-text text-danger"></small>
            </div>
             <div class="form-group">
                <label for="name">Mobile Number  </label>
                <input type="text" class ="form-control" name="mobile" id="mobile" value = "<?php echo $voter['mobile']?>"required >
                 <small id ="mobileError" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label for="name"> your address </label>
                <textarea name="address" class="form-control" row="2" col="50">value = "<?php echo $voter['address']?>"</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="Update">Update</button>
            <a href="dashboard.php" class="btn btn-danger mt-1">Go to Dashboard</a>
            <!-- <input type="submit" class="btn btn-primary" value="Register"
            name="register"> -->
            </form>
        </div>
    </div>
    </div>
</body>
</html>