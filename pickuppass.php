<!DOCTYPE html>
<head>
    <title>User Log In</title>
    <link rel="stylesheet" href="CSS/mechaniclogincondition.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="login">
        <h1>Set Password</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>
                        <input type="text" name="pass" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Save">
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
                if(isset($_POST['submit']))
                {
                    session_start();
                    $sql="update deliveryman set password='$_POST[pass]' where name='$_SESSION[pickupname]'";
                    $qry=mysqli_query($conn,$sql);
                    if($qry)
                    {
                        echo "<script>alert('Welcome ".$_SESSION['pickupname'].". ');window.location='index.php'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Sorry! Your Are Not Hired.');window.location='pickupcondition.php'</script>";
                    }
                }
			}
		}

?>