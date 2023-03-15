<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        if(isset($_POST['submit']))
        {
            $date=date("Y-m-d");
            $sql="update support set adminreply='$_POST[reply]', replydate='$date' where id='$_GET[id]'";
            $qry=mysqli_query($conn,$sql);
            if($qry)
            {
                echo "<script>alert('Replied Successfully!');window.location='menu.php?page=feedback'</script>";
            }
        }
    }
?>