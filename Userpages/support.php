<!DOCTYPE html>
<html>
    <head>
        <title>Support</title>
        <link rel="stylesheet" href="CSS/support.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <input type="text" name="subject" placeholder="Subject of Support" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Support Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="I Need Support">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php

    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        if(isset($_POST['submit']))
        {
            $date=date("Y-m-d");
            $sql="INSERT INTO support(subject, description, username, placedate) VALUES ('$_POST[subject]','$_POST[description]','$_SESSION[username]','$date')";
            $qry=mysqli_query($conn,$sql);
            if($qry)
            {
                echo "<script>alert('Support request placed successfully! Please have patience. Within a few moments you got response from us. Thanks for staying with us.');window.location='menu.php?page=support'</script>";
            }
            else
            {
                echo "<script>alert('Something went wrong!');window.location='menu.php?page=support'</script>";
            }
        }
    }

?>