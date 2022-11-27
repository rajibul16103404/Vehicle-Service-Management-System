<!DOCTYPE html>
<head>
    <title>User Log In</title>
    <link rel="stylesheet" href="CSS/mechaniclogincondition.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="login">
        <h1>PickUP-Delivery Man Verification</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="User Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Verify">
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

				$_SESSION['pickupname']=$_POST['name'];

				$sql="select * from deliveryman where name='$_SESSION[pickupname]'";
				$qry=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($qry);
                    if($_SESSION['pickupname']==$row['name'])
                    {
                        if($row['password']=="vsms")
                        {
                        echo "<script>alert('Welcome ".$_SESSION['pickupname'].". Please Set A Password For Log In.');window.location='pickuppass.php'</script>";
                        }
                        else
                        {
                            header('location:pickuplogin.php');
                        }
                    }
                    else
                    {
                        echo "<script>alert('Sorry! Your Are Not Hired.');window.location='pickupcondition.php'</script>";
                    }
			}
		}

?>
