<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $sql="delete from mechanic where id='$_GET[id]'";
        $qry=mysqli_query($conn,$sql);
        if($qry)
        {
            echo "<script>alert('Deleted Successfully!');window.location='menu.php?page=mechanic'</script>";
        }
    }
?>