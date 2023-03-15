<!DOCTYPE html>
<html>
    <head>
        <title>All Users</title>
        <link rel="stylesheet" href="CSS/users.css?v=<?php echo time(); ?>">
    </head>
    <body>
        
        <table>
            <tr>
                <th>
                    User Name
                </th>
                <th>
                    User Full Name
                </th>
                <th>
                    User Email
                </th>
                <th>
                    User Phone
                </th>
                <th>
                    Actions
                </th>
            </tr>
            <?php
                $conn=mysqli_connect('localhost','root','','vehicle');
                if($conn)
                {
                    $sql="select * from user";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
            ?>

                        <tr>
                            <td>
                                <?php echo $row['username']; ?>
                            </td>
                            <td>
                                <?php echo $row['fullname']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
                            </td>
                            <td>
                                <a href="deleteuser.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a>
                            </td>
                        </tr>
            <?php

                    }
                
                }
            ?>
        </table>
    </body>
</html>