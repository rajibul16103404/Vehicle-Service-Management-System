<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
            $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                if(isset($_POST['submit']))
                {
                    $password="vsms";
                    $sql="select * from mechanicrequest where id='$_GET[id]'";
                    $qry=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($qry);

                    $sql1="insert into mechanic (name,password,phone,address,expertise,salary) values ('$row[name]','$password','$row[phone]','$row[address]','$row[expertise]','$_POST[providedsalary]')";
                    $qry1=mysqli_query($conn,$sql1);
                    if($qry1)
                    {
                        $sql2="delete from mechanicrequest where id='$_GET[id]'";
                        $qry2=mysqli_query($conn,$sql2);
                        if($qry2)
                        {
                        echo "<script>alert('Mechanic Added Succesfully.');window.location='menu.php?page=mechanic'</script>";
                        }
                        else
                        {
                        echo "<script>alert('Something Wrong!.');window.location='menu.php?page=mechanic'</script>";
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