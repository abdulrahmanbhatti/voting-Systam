<?php
include('../include/connection.php');


?>

<html>
    <body>
        <h3 class="text-center pd-3 text-decoration-underline"> list Of Registered Voting </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        S.No
                    </th>
                    <th>
                        Name 
                    </th>
                    <th>
                        Email ID
                    </th>
                    <th>
                     Mobile
                    </th>
                    <th>
                    Address
                    </th>
                    <th>
                        Action 
                    </th>
                </tr>
            </thead>
            <?php
            $sno= 1;
            $query = "SELECT * FROM voters";
            $result = $conn->query($query);
            while ($voter = $result->fetch_assoc()){
                $isActive= $voter['active'];
                ?>
                <tr>
                    <td>
                        <?php echo $sno; ?>
                    </td>
                    <td>
                        <?php echo $voter['name']; ?>
                    </td>
                    <td>
                        <?php echo $voter['email']; ?>
                    </td>
                    <td>
                        <?php echo $voter['mobile']; ?>
                    </td>
                    <td>
                        <?php echo $voter['address']; ?>
                    </td>
                    <td>
                        <a href="voter_delete.php?vid= <?php echo $voter['vid']; ?>" class="btn btn-sm btn-danger">Delete</a>
                        <a href="edit_voter.php?vid=<?php echo $voter['vid'];?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="block_unblock_voter.php?vid=<?php echo $voter['vid'];?>&active=<?php echo $voter['active'];?>" class="btn btn-sm btn-success"><?php if($isActive){
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