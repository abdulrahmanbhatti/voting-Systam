<?php
session_start();
include('../include/connection.php');
if(isset($_POST['register'])){
    include('../include/connection.php');
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['image']['name'];
    $address = $_POST['address'];
    if (!file_exists("../images/")) {
        mkdir("../images/", 0777, true);
    }
    
    $image_path = "images/" . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    
   
    $query = "INSERT INTO votegroup (name, email, password, mobile, img, address, total_vote)
              VALUES ('$name', '$email', '$password', '$mobile', '$image', '$address', 0)";
    
    $result = $conn->query($query);
    
    if($result){
        echo "<script>
        alert('Groups Register Successfully');
        window.location = 'dashboard.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Error: " . $conn->error . "');
        window.location = 'dashboard.php';
        </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../include/jquery.js"></script>
</head>
<body>
    <div class="container-fluid header">
        <h3>Online Voting System </h3>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="left-side">
            <h3>Menu</h3>
            <a href="dashboard.php" class="btn btn-success mt-3 mr-3">Dashboard</a>
            <br>
            <a id="add_group" class="btn btn-primary  mt-3 mr-3">Add Group</a>
            <br>
            <a id="view_group" class="btn btn-warning  mt-3 mr-3">View Groups</a>
            <br>
            <a href="" class="btn btn-success  mt-3 mr-3">View Votes</a>
            <br>
            <a href="" class="btn btn-info  mt-3 mr-3">View Result </a>
            <br>
            <a href="" class="btn btn-primary  mt-3 mr-3">Reset Voting</a>
            <br>
            <a href="../logout.php" class="btn btn-danger  mt-3 mr-3">logout</a>

            </div>
            <div class="col-md-10 mt-5 pt-3 pl-3" id="right-side">
                <h3>Admin Dashboard Page</h3>

            </div>
        </div>

    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#add_group").click(function(){
            $("#right-side").load('register_group.php');
        })
    });
     $(document).ready(function(){
        $("#view_group").click(function(){
            $("#right-side").load('view_group.php');
        })
    });
</script>