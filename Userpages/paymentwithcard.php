<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="CSS/paymentwithcard.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="container-payment">
<?php
        $db=mysqli_connect('localhost','root','','vehicle');
        if($db)
        {
            $sql="select * from servicing where userrequestid='$_SESSION[serviceid]'";
            $qry=mysqli_query($db,$sql);
            if($qry)
            {
                    $row=mysqli_fetch_assoc($qry);
                    $sql1="select * from user where username='$row[user]'";
                    $qry1=mysqli_query($db,$sql1);
                    $row1=mysqli_fetch_assoc($qry1);
                    
                    ?>
                        <form action="menu.php?page=charge" method="post" id="payment-form">
                        <div class="form-row">
                        Email
                        <input type="int" name="email" value="<?php echo $row1['email']; ?>" readonly>
                        Amount
                        <input type="int" name="price" value="<?php echo $row['Total']; ?>" readonly>
<?php
}
else{
  echo "Failed";
}
}


?>
    Card-Details
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="JS/charge.js"></script>
</body>