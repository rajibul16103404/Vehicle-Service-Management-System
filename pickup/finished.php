<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        $date=date('Y-m-d');
        $sql="update servicing set status='Delivered', deliverydate='$date' where id='$_GET[id]'";
        $qry=mysqli_query($conn,$sql);
        if($qry)
        {
            $sql2="select code from servicing where id='$_GET[id]'";
            $qry2=mysqli_query($conn,$sql2);
            $row=mysqli_fetch_assoc($qry2);
            $sql1="update userrequest set status='Delivered' where uniquekey='$row[code]'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1)
            {
                echo "<script>alert('Status Changed As Delivered.');window.location='home.php?page=incomplete'</script>";
            }
            else
            {
                echo "<script>alert('Status Not Updated');window.location='home.php?page=incomplete'</script>";
            }
        }
        else
        {
            echo "<script>alert('Status Not Updated');window.location='home.php?page=incomplete'</script>";
        }
    }
?>