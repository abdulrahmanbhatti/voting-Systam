<?php
  include('../include/connection.php');
  $gid=$_GET['gid'];
  $query= "DELETE FROM votegroup WHERE gid=$gid";
   $result = $conn->query($query);
  if($result){
    echo 
    "<script>
        alert('GROUP deleted   Successfully');
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