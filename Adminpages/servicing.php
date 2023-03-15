<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/servicing.css?v=<?php echo time(); ?>">
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
                    Mechanic
                </th>
                <th>
                    deliveryman
                </th>
                <th>
                    Charge
                </th>
                <th>
                    Additional Vat
                </th>
                <th>
                    Actions
                </th>
            </tr>
            <?php
                $conn=mysqli_connect('localhost','root','','vehicle');
                if($conn)
                {
                    $sql="select * from servicing";
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
                                <?php 
                                    if($row['mechanic']=='')
                                    {
                                        echo "Not Assigned";
                                    }
                                    else
                                    {
                                        echo $row['mechanic'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row['deliveryman']=='')
                                    {
                                        echo "Not Assigned";
                                    }
                                    else
                                    {
                                        echo $row['deliveryman'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row['charge']=='')
                                    {
                                        echo "Not Calculated";
                                    }
                                    else
                                    {
                                        echo $row['charge'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row['charge']=='')
                                    {
                                        echo "Not Calculated";
                                    }
                                    elseif($row['charge']!='' && $row['vat']=='')
                                    {
                                    ?>
                                        <form action="menu.php?page=vat&&code=<?php echo $row['code']; ?>&&charge=<?php echo $row['charge']; ?>" method="post">
                                            <table class="vat">
                                                <tr>
                                                    <td>
                                                        <input type="text" name="vat" placeholder="Vat" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="submit" name="submit" value="Add">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                <?php
                                    }
                                    else
                                    {
                                        echo "Vat Added";
                                    }
                                ?>    
                            </td>
                            <td>
                                <?php if($row['status']=="Pending"){ ?>
                                <a href="menu.php?page=approve&&id=<?php echo $row['id']; ?>"><button class="approve">Approve</button></a>
                                <?php } ?>
                                <?php if($row['vat']!=''){ ?>
                                <a href="menu.php?page=view&&id=<?php echo $row['id']; ?>"><button class="view">View</button></a>
                                <?php } ?>
                                <a href="menu.php?page=deleterequest&&id=<?php echo $row['id'];?>"><button class="delete">Delete</button></a>
                            </td>
                        </tr>
            <?php

                    }
                
                }
            ?>
        </table>
    </body>
</html>