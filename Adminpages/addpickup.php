<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/addpickup.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <?php
            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                if(isset($_POST['submit']))
                {
                    $sql="select * from pickuprequest where id='$_GET[id]'";
                    $qry=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($qry);

                    $sql1="insert into deliveryman (name,password,phone,address,salary) values ('$row[name]','vsms','$row[phone]','$row[address]','$_POST[providedsalary]')";
                    $qry1=mysqli_query($conn,$sql1);
                    if($qry1)
                    {
                        $sql2="delete from pickuprequest where id='$_GET[id]'";
                        $qry2=mysqli_query($conn,$sql2);
                        if($qry2)
                        {
                        echo "<script>alert('PickUp-Delivery Man Added Succesfully.');window.location='menu.php?page=pickup'</script>";
                        }
                        else
                        {
                        echo "<script>alert('Something Wrong!.');window.location='menu.php?page=pickup'</script>";
                        }
                    }
                    else
                    {
                        
                    }
                }
            }
        ?>
    </body>
</html>