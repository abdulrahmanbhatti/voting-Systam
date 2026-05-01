<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter dashboard</title>
    <link rel="stylesheet" href="style.css">
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
            <center><h4><u>Edit Profile</u></h4></center>
            <form action="register.php" method="POST"  onsubmit =" return validateForm()">
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
                <label for="name">Mobile Number  </label>
                <input type="text" class ="form-control" name="mobile" id="mobile" placeholder="mobile Number  " required >
                 <small id ="mobileError" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label for="name"> your address </label>
                <textarea name="address" class="form-control" row="2" col="50"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <!-- <input type="submit" class="btn btn-primary" value="Register"
            name="register"> -->
            </form>
        </div>
    </div>
    </div>
</body>
</html>