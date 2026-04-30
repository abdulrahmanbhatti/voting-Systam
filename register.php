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
            <center><h4><u>Voter Registration Form </u></h4></center>
            <br>
            <form action="" method="POST" onsubmit =" return validateForm()">
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
                <input type="file" class ="form-control" name="file" >
            </div>
            <div class="form-group">
                <label for="name"> your address </label>
                <textarea name="address " class="form-control" row="2" col="50"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <!-- <input type="submit" class="btn btn-primary" value="Register"
            name="register"> -->
            <span>Already Register?</span><a href="login.php">login here</a>
            </form>
        </div>
    </div>
   </div>
</body>

<script>
    function validateForm(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;

    var nameRegex= /^[a-zA-Z\s-]+$/;
    var emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@].$/;
    var mobileRegex=\^[6-9]\d{9}$/;

    if (!nameRegex.test()){
        document.getElementBYid('nameError').innerText="Name should use alphabets";
        return false ;

    }
    else{

    }
    }
</script>
</html>