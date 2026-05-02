<?php 
session_start();
include('../include/connection.php');

// Get values
$group_id = $_GET['gid'];
$voter_id = $_SESSION['vid'];

// Check if already voted
$query = "SELECT * FROM votes WHERE voter_id = '$voter_id'";
$result = $conn->query($query);
$vote=$result->fetch_assoc();
$insert_vote = "INSERT INTO votes (voter_id, group_id, vote_time) 
 VALUES ('$voter_id', '$group_id', NOW())";
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
?>