 <?php
 
 include('../include/connection.php');
 $total_vote=0;
 $query = "SELECT SUM(total_vote) AS total_vote FROM votegroup";
 $result= $conn->query($query);
 $group= $result->fetch_assoc();
 $total_vote= $group['total_vote']
?>

<html>
    <div class="row">
        <div class="col-md-8">
            <h4>
                Total Vote Cast = <?php echo $total_vote;?>

            </h4>
            <?php
             $query= "SELECT name ,total_vote FROM votegroup WHERE total_vote  =(SELECT MAX(total_vote) FROM votegroup) ";
             $result= $conn->query($query);
             While ($group= $result->fetch_assoc()){
                ?>
                <hr>
                <h5>Highest Vote Cast to <?php echo  $group['name']?>(<?php echo  $group['total_vote']?>) </h5>
                <?php
             }
            //  $total_vote= $group['total_vote'];
            ?>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No </th>
                        <th>Group Name  </th>
                        <th>Total Vote  </th>
                    </tr>
                </thead>
                <?php
                 $query= "SELECT gid , name ,total_vote FROM votegroup ";
             $result= $conn->query($query);
             $sno=1;
             While ($group= $result->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <?php echo $sno;?>
                    </td>
                    <td>
                         <?php echo $group['name'] ;?>
                    </td>
                     <td>
                         <?php echo $group['total_vote'] ;?>
                    </td>
                </tr>
                <?php
                 $sno= $sno+1;
             }
                 ?>
            </table>
           
        </div>
    </div>
</html>