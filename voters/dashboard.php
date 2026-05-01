<?php
session_start();
include('../include/connection.php');
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
    <div class="container-fluid header ">
        <h3>Online Voting System </h3>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto" id= "lest-side">
          <center> <h3> Voter Details</h3></center>
            <div>
                <table class= "table">
                    <?php
                    $voting_flag="";
                    $query = "SELECT * FROM voters WHERE vid ='$_SESSION[vid]'";
                    $result= $conn->query($query);
                    while($voters = $result->fetch_assoc()){
                         $voting_flag=$voters['voting'];
                        ?>
                        <tr>
                            <td>
                                <img src="images/<?php echo $voters['img'] ;?>" alt="Voter image " width = "150" height = "100" class="img-thumbnail">
                            </td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td> <?php echo $voters['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td> <?php echo $voters['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Mobile: </td>
                            <td> <?php echo $voters['mobile'] ?></td>
                        </tr>
                        <tr>
                            <td>Voting Status : </td>
                            <td class = "text-danger"> <?php if($voters['voting']=='no'){echo 'not Voted';}else{echo 'voted';}?></td>
                        </tr>
                        <?php
                    }
                    ?>


                </table>
                <a href="" class="btn btn-primary">Edit Profile</a>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </div>

        </div>
        <div class="col-md-6" id = "right-side" >
            <center> <h3> Voter Details</h3></center>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            S.NO.
                        </th>
                            <th>
                            Group image
                        </th>
                            <th>
                            Group Name
                        </th>
                          <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <?php
                $sno = 1;
                $query = "SELECT * FROM votegroup";
                $result= $conn->query($query);
                while($group=$result->fetch_assoc()){
                    ?>
                    <tr>
                        <td class="pt-4">
                            <?php echo $sno; ?>
                        </td>
                        <td>
                            <img src="../admin/images/<?php echo $group['img'];?>" alt=" group image" width = "80" hight="80">
                        </td>
                        <td class="pt-4"> 
                            <?php echo $group['name'] ?>
                        </td>
                        <td class="pt-4">
                            <?php 
                            if($voting_flag=='Yes'){
                                ?>
                                <a href="vote.php?gid=<?php echo $group['gid'];?>&tv=<?php echo $group['total_vote']; ?>" class = "btn btn-sm btn-primary" style="pointer-events:none">vote</a>
                                <?php
                            }
                            else{
                                 ?>
                                <a href="vote.php?gid=<?php echo $group['gid'];?>&tv=<?php echo $group['total_vote']; ?>" class = "btn btn-sm btn-primary">vote</a>
                                <?php
                            }
                            ?>
                        </td>
                        
                    </tr>
                    <?php
                    $sno = $sno +1;
                }
                ?>

            </table>
        </div>
    </div>
    
</body>
</html>