<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $sql="select * from servicing where id='$_GET[id]'";
        $qry=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($qry);

        $sql1="select * from user where username='$row[user]'";
        $qry1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($qry1);
        ?>
        


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/view.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <button class="print" onclick="print()">Print</button>
        <div class="container" id="printablearea">
            <h3>Service History of <?php echo $row1['fullname']; ?></h3>
            <div class="organization">
                <h1>VSMS</h1>
                <p>Vehicle Servicing Management System</p>
            </div>
            <div class="customer">
                <span>Date:    <?php echo date("Y-m-d"); ?></span><br>
                <label for="">
                    Customer Name:
                </label>
                <input type="text" value="<?php echo $row1['fullname']; ?>" readonly><br>
                <label for="">
                    Customer Email:
                </label>
                <input type="text" value="<?php echo $row1['email']; ?>" readonly><br>
                <label for="">
                    Customer Phone:
                </label>
                <input type="text" value="<?php echo $row1['phone']; ?>" readonly><br>
            </div>
            <table>
                <tr>
                    <td>
                        Request Placed Date
                    </td>
                    <td>
                        <?php echo $row['requestdate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Bike Brand
                    </td>
                    <td>
                        <?php echo $row['bikebrand']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Bike Model
                    </td>
                    <td>
                        <?php echo $row['bikemodel']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Bike CC
                    </td>
                    <td>
                        <?php echo $row['bikecc']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Problem Area
                    </td>
                    <td>
                        <?php echo $row['problemarea']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Description
                    </td>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Approved Date
                    </td>
                    <td>
                        <?php echo $row['approvedate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        PickUp-Delivery Man Name
                    </td>
                    <td>
                        <?php echo $row['deliveryman']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Pickup Date
                    </td>
                    <td>
                        <?php echo $row['pickupdate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Delivery Date
                    </td>
                    <td>
                        <?php echo $row['deliverydate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Mechanic Name
                    </td>
                    <td>
                        <?php echo $row['mechanic']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Working Start Date 
                    </td>
                    <td>
                        <?php echo $row['workingdate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Finished Date
                    </td>
                    <td>
                        <?php echo $row['finisheddate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Mechanic Charge
                    </td>
                    <td>
                        <?php echo $row['charge']; ?>Taka
                    </td>
                </tr>
                <tr>
                    <td>
                        Additional Vat
                    </td>
                    <td>
                        <?php echo $row['vat']; ?>Taka
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Ammount
                    </td>
                    <td>
                        <?php echo $row['Total']; ?>Taka
                    </td>
                </tr>
                <tr>
                    <td>
                        Payment Method
                    </td>
                    <td>
                        <?php echo $row['payment']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Payment Date
                    </td>
                    <td>
                        <?php echo $row['paymentdate']; ?>
                    </td>
                </tr>
            </table>
            <h5>Signature..............................</h5>
        </div>
    </body>
</html>
<?php
    }
?>