


<!DOCTYPE html>
<html>
    <head>
        <title>Service</title>
        <link rel="stylesheet" href="CSS/service.css?v=<?php echo time(); ?>">
    </head>
    <body>
        

            <?php

            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                $sql="select * from userrequest where user='$_SESSION[username]' and status!='Delivered'";
                $qry=mysqli_query($conn,$sql);
                if(mysqli_num_rows($qry)>0)
                {?>
                
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
                <th>
                   
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
                    if($row['uniquekey']=='')
                    {
                        echo "Not Assigned";
                    }
                    else
                    {
                        echo $row['uniquekey'];
                    }?>
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
                            echo "Not Charged";
                        }
                        elseif($row['payment']=='paid')
                        {
                            echo "Paid By Card";
                        }
                        elseif($row['payment']=='Cash')
                        {
                            echo "Cash On Delivery";
                        }
                        else
                        {
                    ?>
                    <form action="" method="post">
                        <select name="pay" id="">
                            <option value="Card">Card</option>
                            <option value="Cash">Cash</option>
                        </select>
                        <input type="submit" name="submit" value="Apply">
                    </form>
                    <?php 
                                }

                        if($conn)
                        {
                            if(isset($_POST['submit']))
                            {
                                    if($_POST['pay']=="Card")
                                    {
                                        header('location:menu.php?page=paymentwithcard');
                                    }
                                    else
                                    {
                                        $sql1="update servicing set payment='$_POST[pay]' where user='$_SESSION[username]'";
                                        $qry1=mysqli_query($conn,$sql1);
                                        if($qry)
                                        {
                                                $sql2="UPDATE userrequest SET payment='Cash' WHERE uniquekey='$row[uniquekey]'";
                                                if(mysqli_query($conn,$sql2))
                                                {
                                                    echo "<script>alert('Cash On Delivery');window.location='menu.php?page=service'</script>";
                                                }
                                        }
                                    }
                                }
                            
                        }
                        if($row['status']=='Pending')
                        {
                    ?>
                </td>
                <td>
                    <a href="menu.php?page=deleteservice&&id=<?php echo $row['id']; ?>"><button>Delete</button></a>
                </td>
                <?php
                        }
                        if($row['status']=='Working')
                        {
                ?>
                <td><a href="menu.php?page=chat&&code=<?php echo $row['uniquekey']; ?>"><button>Chat</button></a></td>
            </tr>
            <?php
                        }
        }
    }
    else{
        echo "No Requested Service Found";
    }
    }

?>
        </table>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </body>
</html>


