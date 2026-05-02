 
 <?php
  include('../include/connection.php');
  $query= "DELETE FROM votegroup";
  $result = $conn->query($query);

  $query= "UPDATE voters SET voting = 'no'";
  $result = $conn->query($query);
  if($result){
        echo "<script>
        alert('Voter Reset  Successfully');
        window.location = 'dashboard.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Error: " . $conn->error . "');
        window.location = 'dashboard.php';
        </script>";
    }
 ?>

