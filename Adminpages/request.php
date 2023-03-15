<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/request.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <table>
            <tr>
                <th>
                    Bike Brand
                </th>
                <th>
                    Bike Model
                </th>
                <th>
                    Bike CC
                </th>
                <th>
                    Problem Area
                </th>
                <th>
                    Problem Description
                </th>
                <th>
                    User
                </th>
                <th>
                    Actions
                </th>
            </tr>
            <?php
                $conn=mysqli_connect('localhost','root','','vehicle');
                if($conn)
                {
                    $sql="select * from userrequest where status='Pending'";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        
            ?>

                        <tr>
                            <td>
                                <?php echo $row['bikebrand']; ?>
                            </td>
                            <td>
                                <?php echo $row['bikemodel']; ?>
                            </td>
                            <td>
                                <?php echo $row['bikecc']; ?>
                            </td>
                            <td>
                                <?php echo $row['problemarea']; ?>
                            </td>
                            <td>
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php echo $row['user']; ?>
                            </td>
                            <td>
                                <?php if($row['status']=="Pending"){ ?>
                                <a href="menu.php?page=approve&&id=<?php echo $row['id']; ?>"><button class="approve">Approve</button></a>
                                <?php } ?>
                                <a href="menu.php?page=deleterequest&&id=<?php echo $row['id'];?>"><button>Delete</button></a>
                            </td>
                        </tr>
            <?php

                    }
                
                }
            ?>
        </table>
    </body>
</html>