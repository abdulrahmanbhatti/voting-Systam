<?php
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
        window.location = 'register_group.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Error: " . $conn->error . "');
        window.location = 'register_group.php';
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid header ">
        <h3>Online Voting System </h3>
    </div>
   <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3 m-auto voter-login-form">
            <center><h4><u>Groups Registration Form </u></h4></center>
            <br>
            <form action="register_group.php" method="POST" enctype="multipart/form-data" onsubmit =" return validateForm()">
            <div class="form-group">
                <label for="name">Enter Name </label>
                <input type="text" class ="form-control" name="name" id="name"placeholder="Enter Name " required >
                <small id ="nameError" class="form-text text-danger"></small>
            </div>
             <div class="form-group">
                <label for="email">Enter Email </label>
                <input type="email" class ="form-control" name="email" id="email" placeholder="Enter email " required >
                 <small id ="emailError" class="form-text text-danger"></small>
            </div>
             <div class="form-group">
                <label for="password">Your password  </label>
                <input type="password" class ="form-control" name="password" placeholder="Your password " required >
            </div>
             <div class="form-group">
                <label for="name">Mobile Number  </label>
                <input type="text" class ="form-control" name="mobile" id="mobile" placeholder="mobile Number  " required >
                 <small id ="mobileError" class="form-text text-danger"></small>
            </div>
             <div class="form-group">
                <label for="name">upload photo </label>
                <input type="file" class ="form-control" name="image" >
            </div>
            <div class="form-group">
                <label for="name"> your address </label>
                <textarea name="address" class="form-control" row="2" col="50"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <!-- <input type="submit" class="btn btn-primary" value="Register"
            name="register"> -->
            <!-- <span>Already Register?</span><a href="login.php">login here</a> -->
            </form>
        </div>
    </div>
   </div>
</body>

<script>
    function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;

    var nameRegex = /^[a-zA-Z\s-]+$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var mobileRegex = /^03\d{9}$/;

    if (!nameRegex.test(name)) {
        document.getElementById('nameError').innerText = "Name should use alphabets";
    return false;
    } 
    else {
        document.getElementById('nameError').innerText = "";
    }
    if (!emailRegex.test(email)) {
       document.getElementById('emailError').innerText = "Please enter a valid email";
    return false;
    }
     else {
        document.getElementById('emailError').innerText = "";
    }
    if (!mobileRegex.test(mobile)) {
        document.getElementById('mobileError').innerText = "Enter valid number";
    
    return false;
    } 
    else {
        document.getElementById('mobileError').innerText = "";
    }

    return true;
}
</script>
</html>