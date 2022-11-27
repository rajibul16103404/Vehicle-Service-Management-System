<!DOCTYPE html>
<head>
    <title>Vehicle Management System</title>
    <link rel="stylesheet" href="CSS/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1 class="logo">
        <span>Vehicle</span>
        <span>Servicing</span>
        <span>Management</span>
        <span>System</span>
    </h1>
    <div class="container">
            <div class="card">
                <div class="content">
                    <h2>New</h2>
                    <h3>New User.</h3>
                    <p>If you are not registered in this system then please register yourself to enjoy the unbelivable services provided inside. So hurry up.</p>
                    <a href="registration.php">Register</a>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2>Existing</h2>
                    <h3>Existing User.</h3>
                    <p>If you are already registered in this system then please login to enjoy the unbelivable services provided inside. So hurry up.</p>
                    <a href="userlogin.php">Log In</a>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2>Mechanic</h2>
                    <h3>Mechanic.</h3>
                    <p>If you are hired in this system then please login yourself to provide the services to the customer. So hurry up.</p>
                    <a href="mechaniclogincondition.php">Log In</a>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2>PickUp</h2>
                    <h3>PickUp-Delivery.</h3>
                    <p>If you are hired in this system then please login yourself to provide the services to the customer. So hurry up.</p>
                    <a href="pickupcondition.php">Log In</a>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2>Admin</h2>
                    <h3>Admin.</h3>
                    <p>Hello Boss! Please Log In.</p>
                    <a href="adminlogin.php">Log In</a>
                </div>
            </div>
    </div>
        <div class="apply">
            <form action="" method="post">
                <table>
                    <h3>Apply For Mechanic</h3>
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Full Name" required>
                        </td>
                        <td>
                            <input type="int" name="phone" maxlength="11" placeholder="Phone Number" required>
                        </td>
                        <td>
                            <input type="text" name="address" placeholder="Full Address" requied>
                        </td>
                        <td>
                            <select name="expertise">
                                <?php
                                    $conn=mysqli_connect('localhost','root','','vehicle');
                                    if($conn)
                                    {
                                        $sql="select * from service";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry))
                                        {
                                            echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="int" name="salary" placeholder="Expected Salary" requied>
                        </td>
                        <td>
                            <input type="submit" name="submit" value="Apply">
                        </td>
                    </tr>
                </table>
            </form>
            <form action="" method="POST">
                <table>
                    <h3>Apply For PickUp-Delivery Man</h3>
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Full Name" requied>
                        </td>
                        <td>
                            <input type="int" name="phone" maxlength="11" placeholder="Phone Number" requied>
                        </td>
                        <td>
                            <input type="text" name="address" placeholder="Full Address" requied>
                        </td>   
                        <td>
                            <input type="int" name="salary" placeholder="Expected Salary" requied>
                        </td>
                        <td>
                            <input type="submit" name="submit1" value="Apply">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</body>


<?php
    if($conn)
    {
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $expertise=$_POST['expertise'];
            $salary=$_POST['salary'];

            $sql1="insert into mechanicrequest (name, phone, address, expertise, expectedsalary) values ('$name','$phone','$address','$expertise','$salary')";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1)
            {
                echo "<script>alert('Your Request Is Being Processed. Please Wait. Admin Will Contact You Within 2-3 Business Days. Have A Nice Day!');window.location='index.php'</script>";
            }
            else
            {
                echo "<script>alert('Something Fishy!');window.location='index.php'</script>";
            }
        }

        if(isset($_POST['submit1']))
        {
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $salary=$_POST['salary'];

            $sql2="insert into pickuprequest (name, phone, address, expectedsalary) values ('$name','$phone','$address','$salary')";
            $qry2=mysqli_query($conn,$sql2);
            if($qry2)
            {
                echo "<script>alert('Your Request Is Being Processed. Please Wait. Admin Will Contact You Within 2-3 Business Days. Have A Nice Day!');window.location='index.php'</script>";
            }
            else
            {
                echo "<script>alert('Something Fishy!');window.location='index.php'</script>";
            }
        }
    }
?>