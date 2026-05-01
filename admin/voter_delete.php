<?php
  include('../include/connection.php');
  $vid=$_GET['vid'];
  $query= "DELETE FROM voters WHERE vid=$vid";
   $result = $conn->query($query);
  if($result){
    echo 
    "<script>
        alert('Voter deleted   Successfully');
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