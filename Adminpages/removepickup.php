<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $sql="delete from deliveryman where id='$_GET[id]'";
        $qry=mysqli_query($conn,$sql);
        if($qry)
        {
            echo "<script>alert('Removed Successfully!');window.location='menu.php?page=pickup'</script>";
        }
    }
?>