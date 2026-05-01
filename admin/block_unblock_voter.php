<?php
  include('../include/connection.php');
  $isActive = $_GET['active'];
  $vid=$_GET['vid'];
  if($isActive){
    $query="UPDATE voters SET active = 0 WHERE vid = $vid";
  }
  else {
     $query="UPDATE voters SET active = 1 WHERE vid = $vid";
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