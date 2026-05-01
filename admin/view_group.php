<?php
include('../include/connection.php');


?>

<html>
    <body>
        <h3 class="text-center pd-3 text-decoration-underline">Registered Group For Voting </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        S.No
                    </th>
                    <th>
                        Group ID
                    </th>
                    <th>
                        Group Name
                    </th>
                    <th>
                     Group image 
                    </th>
                    <th>
                        Action 
                    </th>
                </tr>
            </thead>
            <?php
            $sno= 1;
            $query = "SELECT * FROM votegroup";
            $result = $conn->query($query);
            while ($group = $result->fetch_assoc()){
                $isActive=$group['active'];

                ?>
                <tr>
                    <td style="padding-top: 40px;">
                        <?php echo $sno; ?>
                    </td>
                    <td  style="padding-top: 40px;">
                        <?php echo $group['gid']; ?>
                    </td>
                    <td  style="padding-top: 40px;">
                        <?php echo $group['name']; ?>
                    </td>
                    <td  style="padding-top: 40px;">
                        <img src="images/<?php echo $group['img'];?>" alt="Group Image"
                        width="80" height="80">
                    </td>
                    <td style="padding-top: 40px;">
                        <a href="delete_group.php?gid=<?php echo $group['gid'];?>" class="btn btn-sm btn-danger">Delete</a>
                        <a href="block_unblock.php?gid=<?php echo $group['gid'];?>&active=<?php echo $group['active'];?>" class="btn btn-sm btn-success"><?php if($isActive){
                            echo "Block";}
                            else {
                                echo "Unblock";
                            }
                            ?></a>
                    </td>
                </tr>
                <?php
            $sno=$sno+1;

            }
            
            ?>
        </table>
    </body>
</html>