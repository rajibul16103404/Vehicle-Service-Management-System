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
                        <th>Action</th>
                    </tr>
        <?php
            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                $sql="select * from servicing where deliveryman='$_SESSION[pickupname]' and status='Finished' or status='Working' or status='Approved'";
                $qry=mysqli_query($conn,$sql);
                if($qry)
                {
                        while($row1=mysqli_fetch_assoc($qry))
                        {
                            ?>

                            <tr>
                            <td><?php echo $row1['bikebrand']; ?></td>
                            <td><?php echo $row1['bikemodel']; ?></td>
                            <td><?php echo $row1['bikecc']; ?></td>
                            <td><?php echo $row1['problemarea']; ?></td>
                            <td><?php echo $row1['description']; ?></td>
                            <td><?php echo $row1['user']; ?></td>
                            <td><?php echo $row1['mechanic']; ?></td>
                            <td><?php echo $row1['code']; ?></td>
                            <td>
                                <?php
                                    if($row1['status']=='Approved')
                                    {
                                ?>
                                <a href="home.php?page=working&&id=<?php echo $row1['id']; ?>"><button>Pick Up</button></a>
                                <?php
                                    }
                                    elseif($row1['status']=='Working')
                                    {
                                ?>
                                <p>Please Wait Until Fix.</p>
                                <?php
                                    }
                                    elseif($row1['status']=='Finished' && $row1['payment']=='Paid' && $row1['vat']!=null)
                                    {
                                ?>
                                <a href="home.php?page=finished&&id=<?php echo $row1['id']; ?>"><button>Delivery</button></a>
                                <?php
                                    }
                                    elseif($row1['status']=='Finished' && $row1['payment']=='Cash' && $row1['vat']!=null)
                                    {
                                ?>
                                <a href="home.php?page=finished&&id=<?php echo $row1['id']; ?>"><button>Cash On Delivery</button></a>
                                <?php
                                    }
                                     elseif($row1['status']=='Finished')
                                    {
                                ?>
                                <p>Payment Not Cleared.</p>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        


                            <?php
                        }
                    }
                }
        ?>

            
        </table>
    </body>
</html>