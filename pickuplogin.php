<!DOCTYPE html>
<head>
    <title>User Log In</title>
    <link rel="stylesheet" href="CSS/mechaniclogin.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="login">
        <h1>PickUp-Delivery Log In</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>
                        <input type="text" name="uname" placeholder="User Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Log In">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</body>

<?php

	if(isset($_POST['submit']))
		{
			$conn=mysqli_connect('localhost','root','','vehicle');
			if($conn)
			{
                session_start();

				$_SESSION['pickupname']=$_POST['uname'];
				$_SESSION['password']=$_POST['password'];
                

				$sql="select * from deliveryman where name='$_SESSION[pickupname]'";
				$qry=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($qry);
				if($row['name']==$_SESSION['pickupname'] && $row['password']==$_SESSION['password'])
				{
					echo "<script>alert('Welcome ".$_SESSION['pickupname']."');window.location='pickup/home.php?page=incomplete'</script>";
				}
				else if($_SESSION['pickupname']==$row['name'] && $_SESSION['password']!=$row['password'])
				{
					echo "<script>alert('Password is incorrect.');window.location='pickuplogin.php'</script>";
				}
				else
				{
					echo "<script>alert('Username or Password is incorrect.');window.location='pickuplogin.php'</script>";
				}
			}
		}

?>
