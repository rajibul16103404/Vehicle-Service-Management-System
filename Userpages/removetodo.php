<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $sql="delete from todo where id='$_GET[id]'";
        $qry=mysqli_query($conn,$sql);
        if($qry)
        {
            header('location:menu.php?page=home');
        }
    }
?>