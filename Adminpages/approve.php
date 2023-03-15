<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/approve.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="container">
            <?php
            
                $conn=mysqli_connect('localhost','root','','vehicle');
                if($conn)
                {
                    $sql="select * from userrequest where id='$_GET[id]'";
                    $qry=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($qry);
                    $sql1="select * from user where username='$row[user]'";
                    $qry1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($qry1);

            ?>
            
            <table>
                <h2>Bike Information</h2><hr>
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
                        Problem Description
                    </td>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                </tr>
            </table>
            <table>
                <h2>User Information</h2><hr>
                <tr>
                    <td>
                        Full Name
                    </td>
                    <td>
                        <?php echo $row1['fullname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <?php echo $row1['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone
                    </td>
                    <td>
                        <?php echo "+880  ".$row1['phone']; ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="assign">
            <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        Mechanic
                    </td>
                    <td>
                        <select name="mec" id="">
                        <?php    
                                $sql2="select * from mechanic where expertise='$row[problemarea]' ";
                                $qry2=mysqli_query($conn,$sql2);
                                while($row2=mysqli_fetch_assoc($qry2))
                                {
                                    echo "<option value='".$row2['name']."'>".$row2['name']."</option>";
                                }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        PickUp-Delivery Man
                    </td>
                    <td>
                        <select name="pd" id="">
                            <?php
                                $sql3="select * from deliveryman";
                                $qry3=mysqli_query($conn,$sql3);
                                while($row3=mysqli_fetch_assoc($qry3))
                                {
                                    echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Unique Key
                    </td>
                    <td>
                        <input type="text" name="key" value="<?php echo bin2hex(random_bytes(4)); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="submit" name="submit" value="Assign">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </body>
</html>

<?php
if(isset($_POST['submit']))
{
    $mechanic=$_POST['mec'];
    $deliveryman=$_POST['pd'];
    $key=$_POST['key'];

    $sql4="update userrequest set status='Approved', mechanic='$mechanic', uniquekey='$key', deliveryman='$deliveryman' where id='$row[id]' ";
    $qry4=mysqli_query($conn,$sql4);
    if($qry4)
    {
                
        echo "<script>alert('Mechanic and PickUp and Delivery Man Assigned Successfully To The Service Request Of ".$row['user']."');window.location='menu.php?page=approvemechanic&&id=".$_GET['id']."'</script>";
    }
    else
    {
        echo "<script>alert('Something Went Wrong!');window.location='menu.php?page=approve&&id=".$_GET['id']."'</script>";
    }
}
}

?>