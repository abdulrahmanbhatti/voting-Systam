<?php
  include('../include/connection.php');
  $isActive = $_GET['active'];
  $gid=$_GET['gid'];
  if($isActive){
    $query="UPDATE votegroup SET active = 0 WHERE gid = $gid";
  }
  else {
     $query="UPDATE votegroup SET active = 1 WHERE gid = $gid";
  }
  $result = $conn->query($query);
  if($result){
    echo 
    "<script>
        alert('Active status update  Successfully');
        window.location = 'dashboard.php';
        </script>";
  }
  else {
      "<script>
        alert('error plz try again ');
        window.location = 'dashboard.php';
      </script>";
  }
?>