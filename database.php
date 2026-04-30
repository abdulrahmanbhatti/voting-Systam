<?php
// This file create will a database connectivity for my application 
// database host mean whit type of server that you use 
// database user 
// database Password 
// database name that you want you connect 


// configuration  of database connectivity 
$db_Server="localhost";
$db_user="root";
$db_password='mysql@a#b$d%u&l135';
$db_Name="voting";

// connectivity of database 
$db_connection=mysqli_connect($db_Server,$db_user,$db_password,$db_Name);
if(!$db_connection){
    echo"Database connection failed";
    die("Database connection failed :".mysqli_connect_error());
}
else{
    echo "Database Successfully connected";
}

?>