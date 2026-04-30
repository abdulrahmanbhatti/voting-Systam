<?php
include("database.php");
if(isset($_POST["register"]))
    {   
       $name=$_POST["name"];
       $email=$_POST["email"];
       $password=$_POST["password"];
       $mobile=$_POST["mobile"];
       $image=$_FILES["image"]["name"];
       $address=$_POST["address"];
        $image_path="voters/images/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],$image_path);
        $query="INSERT INTO voters (vid, name, email, password, mobile, img, address, voting)VALUES 
       (null,'$name','$email','$password','$mobile','$image','$address','no')";

        // $result = mysqli_query($db_connection,$insertyqry);
       $result = mysqli_query($db_connection, $query);
        if($result){
            echo "<script>
            alert('Voter registered successfully');
            window.location.href='login.php';
            </script>";
        }
        else{
            echo "<script>
             alert('Error , please try again ');
             window.location.href='register.php';
             </script>";
        }

    }