
<?php

$conn=mysqli_connect("localhost","root","","vehicle");
if($conn)
{
    $sql="select * from user where username='$_SESSION[username]'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);

    ?>

<!DOCTYPE html>
<html>

    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="CSS/profile.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <h1 class="title">My Profile</h1>
        <div class="content">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            <label for="">Fullname</label>
                        </td>
                        <td>
                            <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Phone (+880)</label>
                        </td>
                        <td>
                            <input type="digit" name="phone" value="<?php echo $row['phone']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Update Info">
                        </td>
                    </tr>
                </table>
            </form>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            <input type="password" name="password" placeholder="Enter Old Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="newpassword" placeholder="Enter New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="repassword" placeholder="Re-Type New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit1" value="Change Password">
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
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $sql1="update user set fullname = '$fullname', email = '$email', phone = '$phone' where username='$_SESSION[username]'";
        $qry1=mysqli_query($conn,$sql1);
        if($qry1)
        {
            echo "<script>alert('Info updated Successfully');window.location='menu.php?page=profile'</script>";
        }
        else
        {
            echo "<script>alert('Something went wrong!');window.location='menu.php?page=profile'</script>";
        }
    }
    
    if(isset($_POST['submit1']))
    {
        $oldpassword=$_POST['password'];
        $newpassword=$_POST['newpassword'];
        $repassword=$_POST['repassword'];

        if($oldpassword == $row['password'])
        {
            if($newpassword == $repassword)
            {
                $sql2="update user set password = '$newpassword' where username='$_SESSION[username]'";
                $qry2=mysqli_query($conn,$sql2);
                if($qry2)
                {
                    echo "<script>alert('Password Successfully changed!');window.location='menu.php?page=profile'</script>";
                }
                else
                {
                    echo "<script>alert('Password Not Updated!');window.location='menu.php?page=profile'</script>";
                }
            }
            else
            {
                echo "<script>alert('New Password & Re-Type Password Doesnt Matched!');window.location='menu.php?page=profile'</script>";
            }
        }
        else
        {
            echo "<script>alert('Old password doesnt matched!');window.location='menu.php?page=profile'</script>";
        }
    }
    
}
?>

