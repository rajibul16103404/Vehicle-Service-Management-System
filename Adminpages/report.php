<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/report.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="selectionarea">
            <form action="" method="post">
                <p class="from"><span class="Keyword">Search</span><span class="from">From</span><span class="to">To</span></p>
                <input type="text" name="search">
                <input type="date" name="from">
                <input type="date" name="to">
                <input type="submit" name="submit" value="Generate">
            </form>
        </div>
        <div class="executearea">
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
                        Total
                    </th>
                    <th>
                        Request Date
                    </th>
                    <th>
                        Approved Date
                    </th>
                    <th>
                        PickUp Date
                    </th>
                    <th>
                        Working Start Date
                    </th>
                    <th>
                        Finished Date
                    </th>
                    <th>
                        Delivery Date
                    </th>
                </tr>
            <?php
                $conn=mysqli_connect('localhost','root','','vehicle');
                if($conn)
                {
                    if(isset($_POST['submit']))
                    {
                        if($_POST['search']==null)
                        {
                            $from=$_POST['from'];
                            $to=$_POST['to'];
                            $search=$_POST['search'];
                                $sql="select * from servicing where deliverydate between '$from' and '$to' and status='Delivered'";
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
                                    <?php echo $row['mechanic']; ?>
                                </td>
                                <td>
                                    <?php echo $row['deliveryman']; ?>
                                </td>
                                <td>
                                    <?php echo $row['charge']; ?>
                                </td>
                                <td>
                                    <?php echo $row['vat']; ?>   
                                </td>
                                <td>
                                    <?php echo $row['Total']; ?>   
                                </td>
                                <td>
                                    <?php echo $row['requestdate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['approvedate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['pickupdate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['workingdate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['finisheddate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['deliverydate']; ?>
                                </td>
                                
                            </tr>
                            
                            <?php
                                }
                            }
                        else
                        {
                            $from=$_POST['from'];
                            $to=$_POST['to'];
                            $search=$_POST['search'];
                                $sql="select * from servicing where deliverydate between '$from' and '$to' and bikebrand='$search' and status='Delivered'";
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
                                    <?php echo $row['mechanic']; ?>
                                </td>
                                <td>
                                    <?php echo $row['deliveryman']; ?>
                                </td>
                                <td>
                                    <?php echo $row['charge']; ?>
                                </td>
                                <td>
                                    <?php echo $row['vat']; ?>   
                                </td>
                                <td>
                                    <?php echo $row['Total']; ?>   
                                </td>
                                <td>
                                    <?php echo $row['requestdate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['approvedate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['pickupdate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['workingdate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['finisheddate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['deliverydate']; ?>
                                </td>
                                
                            </tr>
                            
                            <?php
                                }
                            }
                    }
                        
                        
                }
                
            ?>
            </table>
        </div>
    </body>
</html>