<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
                $sql5="select * from userrequest where id='$_GET[id]' and status='Approved'";
                $qry5=mysqli_query($conn,$sql5);
                if($qry5)
                {
                    $date=date('Y-m-d');
                    $row5=mysqli_fetch_assoc($qry5);
                    $sql6="insert into servicing(userrequestid,bikebrand,bikemodel,bikecc,problemarea,description,mechanic,user,deliveryman,code,status,charge,requestdate,approvedate,payment,paymentdate) values ('$row5[id]','$row5[bikebrand]','$row5[bikemodel]','$row5[bikecc]','$row5[problemarea]','$row5[description]','$row5[mechanic]','$row5[user]','$row5[deliveryman]','$row5[uniquekey]','Approved',null,'$row5[requestdate]','$date','Not Paid','$date')";
                    
                    $qry6=mysqli_query($conn,$sql6);
                    if($qry6)
                    {
                        header('location:menu.php?page=request');
                    }
                    else
                    {
                        echo "Not Working";
                    }
                }

    }
                
?>