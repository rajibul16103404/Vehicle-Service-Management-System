<!DOCTYPE html>
<head>
    <title>User Log In</title>
    <link rel="stylesheet" href="CSS/userlogin.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="login">
        <h1>User Log In</h1>
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

				$_SESSION['username']=$_POST['uname'];
				$_SESSION['password']=$_POST['password'];
                

				$sql="select * from user where username='$_SESSION[username]'";
				$qry=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($qry);
				if($row['username']==$_SESSION['username'] && $row['password']==$_SESSION['password'] && $row['validate']=='Valid')
				{
					echo "<script>alert('Welcome ".$_SESSION['username']."');window.location='Userpages/menu.php?page=home'</script>";
				}
				else if($row['username']==$_SESSION['username'] && $row['password']==$_SESSION['password'] && $row['validate']=='')
				{
					echo "<script>alert('Account Not Verified. Please Check email and validate your account.');window.location='userlogin.php'</script>";
				}
				else if($_SESSION['username']==$row['username'] && $_SESSION['password']!=$row['password'])
				{
					echo "<script>alert('Password is incorrect.');window.location='userlogin.php'</script>";
				}
				else
				{
					echo "<script>alert('Username or Password is incorrect.');window.location='userlogin.php'</script>";
				}
			}
		}

?>
