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
                        <th>PickUp-Delivery Man</th>
                        <th>Code</th>
                        <th>Chat</th>
                        <th>Action</th>
                    </tr>
        <?php
            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                $sql="select * from servicing where mechanic='$_SESSION[mechanicname]' and status='Pick Up' or status='Working' or status='Approved'";
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
                            <td><?php echo $row1['deliveryman']; ?></td>
                            <td><?php echo $row1['code']; ?></td>
                            <td>  
                            <a href="home.php?page=advice&&code=<?php echo $row1['code']; ?>"><button style="background-color:aqua;">Advise</button></a></td>
                            <td>
                                <?php
                                    if($row1['status']=='Pick Up')
                                    {
                                ?>
                                <a href="home.php?page=working&&id=<?php echo $row1['id']; ?>"><button>Working</button></a>
                                <?php
                                    }
                                    elseif($row1['status']=='Approved')
                                    {
                                ?>
                                <p>Please Wait For Pick Up.</p>
                                <?php
                                    }
                                    elseif($row1['status']=='Working')
                                    {
                                ?>

                                <form action="home.php?page=finished&&id=<?php echo $row1['id'];?>" method="POST">
                                    <input type="int" name="charge" placeholder="Amount">
                                    <input type="submit" name="submit" value="Finished">    
                                </form>
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