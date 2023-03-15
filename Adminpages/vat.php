<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        if(isset($_POST['submit']))
        {
            $code=$_GET['code'];
            $vat=$_POST['vat'];
            $charge=$_GET['charge'];
            $total=($charge+$vat);
            $sql1="update servicing set vat='$vat', total='$total' where code='$code'";
            $qry1=mysqli_query($conn,$sql1);
            if($qry1)
            {
                $sql="update userrequest set charge='$total' where uniquekey='$code'";
                $qry=mysqli_query($conn,$sql);
                if($qry)
                {
                    echo "<script>alert('Charge Updated Successfully');window.location='menu.php?page=servicing'</script>";
                }
                else
                {
                    echo "<script>alert(' Updated Successfully');window.location='menu.php?page=servicing'</script>";
                }
            }
             else
            {
                echo $total;    
            }
        }
    }
?>