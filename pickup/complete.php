<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/incomplete.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <table>
                    <tr>
                        <th>Bike Brand</th>
                        <th>Bike Model</th>
                        <th>Bike CC</th>
                        <th>Problem Area</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Mechanic</th>
                        <th>Code</th>
                        <th>Status</th>
                    </tr>
        <?php
            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                $sql="select * from servicing where deliveryman='$_SESSION[pickupname]' and status='Delivered'";
                $qry=mysqli_query($conn,$sql);
                if($qry)
                {
                        while($row=mysqli_fetch_assoc($qry))
                    {
                        ?>

                    
                        <tr>
                            <td><?php echo $row['bikebrand']; ?></td>
                            <td><?php echo $row['bikemodel']; ?></td>
                            <td><?php echo $row['bikecc']; ?></td>
                            <td><?php echo $row['problemarea']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['user']; ?></td>
                            <td><?php echo $row['deliveryman']; ?></td>
                            <td><?php echo $row['code']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    


                        <?php
                    }
                    }
                }
            
        ?>
        </table>
    </body>
</html>