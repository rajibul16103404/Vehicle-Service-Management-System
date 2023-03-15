<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $sql="select * from mechanic where name='$_SESSION[mechanicname]'";
        $qry=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($qry);
        ?>
    <!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="CSS/profile.css?v=<?php echo time(); ?>">
        </head>
        <body>
            <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <p>Full Name</p>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Phone</p>
                        <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Address</p>
                        <input type="text" name="address" value="<?php echo $row['address']; ?>">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <p>Expertise</p>
                        <input type="text" name="expertise" value="<?php echo $row['expertise']; ?>">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <p>Salary</p>
                        <input type="text" name="salary" value="<?php echo $row['salary']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update Info">
                    </td>
                </tr>
            </table>
            </form>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                            <p>Old Password</p>
                            <input type="password" name="old" placeholder="Old">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>New Password</p>
                            <input type="password" name="new" placeholder="New">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Re-Type Password</p>
                            <input type="password" name="re" placeholder="Re-Type">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit1" value="Change">
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </html>



        <?php
        if(isset($_POST['submit']))
        {
            $sql1="update mechanic set name='$_POST[name]',phone='$_POST[phone]',address='$_POST[address]',expertise='$_POST[expertise]' where name='$_SESSION[mechanicname]'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1)
            {
                echo "<script>alert('".$_SESSION['mechanicname']." Profile Updated Successfully.');window.location='home.php?page=profile'</script>";
            }
            else
            {
                echo "<script>alert('Profile Not Updated.');window.location='home.php?page=profile'</script>";
            }
        }


        if(isset($_POST['submit1']))
        {
            $sql1="select password from mechanic where name='$_SESSION[mechanicname]'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1)
            {
                $row=mysqli_fetch_assoc($qry1);
                if($row['password']==$_POST['old'])
                {
                    if($_POST['new']==$_POST['re'])
                    {
                        $sql2="update mechanic set password='$_POST[re]'";
                        if(mysqli_query($conn,$sql2))
                        {
                            echo "<script>alert('Password Changed.');window.location='home.php?page=profile'</script>";
                        }
                        else
                        {
                            echo "<script>alert('Profile Not Updated.');window.location='home.php?page=profile'</script>";
                        }
                    }
                    else
                    {
                        echo "<script>alert('Password Doesnot Matched.');window.location='home.php?page=profile'</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Incorrect Password.');window.location='home.php?page=profile'</script>";
                }
            }
            else
            {
                echo "<script>alert('Error.');window.location='home.php?page=profile'</script>";
            }
        }


    }
?>