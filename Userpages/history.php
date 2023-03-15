


<!DOCTYPE html>
<html>
    <head>
        <title>Service</title>
        <link rel="stylesheet" href="CSS/history.css?v=<?php echo time(); ?>">
    </head>
    <body>
        

            <?php

            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                $sql="select * from userrequest where user='$_SESSION[username]' and status='Delivered'";
                $qry=mysqli_query($conn,$sql);
                if($qry)
                {
                    if(mysqli_num_rows($qry)>0)
                    {
                    ?>
                
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
                    Admin Status
                </th>
                <th>
                    Mechanic
                </th>
                <th>
                    PickUp-Delivery Man
                </th>
                <th>
                    Code
                </th>
                <th>
                    Charge In Taka
                </th>
                <th>
                    Payment
                </th>
            </tr>
                
                
                <?php
                while($row=mysqli_fetch_assoc($qry))

                {
                    $_SESSION['serviceid']=$row['id'];
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
                    <?php echo $row['status']; ?>
                </td>
                <td>
                    <?php 
                        echo $row['mechanic'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $row['deliveryman'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $row['uniquekey'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $row['charge'];
                    ?>
                </td>
                <td>
                    <?php
                        if($row['payment']=='paid')
                        {
                            echo "Paid By Card";
                        }
                        elseif($row['payment']=='Cash')
                        {
                            echo "Cash On Delivery";
                        }
                        else
                        {
                            echo "Payment not done";
                        }
                    ?>
                </td>
            </tr>
            <?php

        }
    }
    else{
        echo "No Service History Found";
    }
    }
}

?>
        </table>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </body>
</html>


