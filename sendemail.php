<?php
	
	if(isset($_POST['submit']))
		{
			$conn=mysqli_connect('localhost','root','','vehicle');
			if($conn)
			{
				$fullname=$_POST['fname'];
				$username=$_POST['uname'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$address=$_POST['address'];
				$password=$_POST['password'];
                $url=md5(time().$username);
				
				$sql1="select * from user";
				$qry1=mysqli_query($conn,$sql1);
				$row=mysqli_fetch_array($qry1);
				
				if($username==$row['username'])
				{
					echo "<script>alert('This username is already exists. Please try another one.');window.location='registration.php'</script>";
				}
				else
				{
					$sql="insert into user (fullname,username,email,phone,address,password,url,validate) values ('$fullname','$username','$email','$phone','$address','$password','$url','')";
				
					if(mysqli_query($conn, $sql))
					{
                        $to=$email;
                        $subject="Vehicle Service Management System";
                        $message="Hellow ".$username."<br>Click the verify button below to verify your account<br><br> <a style='cursor:pointer;' href='localhost/Vehicle%20Management%20System/verifyemail.php?url=".$url."'><button style='width:190px; padding:15px; color:white;background:green;border:none;font-size:18px;'>Verify</button></a> <br><br>Thanks<br>VSMS Team";
                        $headers="From:vsms.bike@gmail.com\r\n";
                        $headers.="MIME-Version: 1.0"."\r\n";
                        $headers.="Content-type:text/html;charset=UTF-8"."\r\n";

                        if(mail($to, $subject, $message, $headers))
                        {
						?>

                            <!DOCTYPE html>
                            <html>
                                <head>
                                    <link rel="stylesheet" href="CSS/sendemail.css?v=<?php echo time(); ?>">
                                </head>
                                <body>
                                    <div class="container">
                                        <p>A verification email sent to <?php echo $email; ?>. Please check.</p>
                                        <img src="email.png" alt="Email">
                                        <a href="userlogin.php"><button>Go For Log In</button></a>
                                    </div>
                                    
                                </body>
                            </html>


                        <?php
                        }
                        else
                        {
                            echo "Email Not Send";
                        }
					}
					else
					{
						echo "<script>alert('Something went wrong!');window.location='index.php'</script>";
					}
				}
					
			}
			else
			{
				echo "Not Connected";
			}	
		}	
	

?>

                        