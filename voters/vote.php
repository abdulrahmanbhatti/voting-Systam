<?php 
session_start();
include('../include/connection.php');
$total_vote=0;
$query="SELECT total_vote FROM votegroup WHERE gid='$_GET[gid]'";
$result= $conn->query($query);
$group= $result->fetch_assoc();
$total_vote = $group['total_vote'];
$query="UPDATE votegroup SET total_vote= $total_vote+1 WHERE gid='$_GET[gid]'";
$result= $conn->query($query);
if($result){
   $query="UPDATE voters SET voting='Yes' WHERE vid='$_SESSION[vid]'";
   $result= $conn->query($query); 
    echo "<script>
    alert('Vote save successfully');
    </script>";
}
else{
     echo "<script>
    alert('Error try again ');
    </script>";
}
?>

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
    <a href="dashboard.php" class="btn btn-danger" style="margin-top:150px; margin-left:400px">Go to Dashboard</a>
</body>
</html>