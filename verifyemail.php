<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $url=$_GET['url'];
        $sql="update user set validate='Valid' where url='$url'";
        $qry=mysqli_query($conn,$sql);
        if($qry)
        {
            echo "<script>alert('Account Verified. Please log in to your account.');window.location='userlogin.php'</script>";
        }
    }
?>

