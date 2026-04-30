<?php
   $conn = mysqli_connect("localhost", "root", 'mysql@a#b$d%u&l135', "voting");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>