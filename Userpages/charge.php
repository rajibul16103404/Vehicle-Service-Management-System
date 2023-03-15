<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51JO47kE2RjZ3MchySKuUVdUjBk5gCi70tvCbBfrEKJpOaTrWUYQaeL8NFqRyKMC5B8QDGe1QhDDhN4B10wX46wQ200BnIV5PHV');

$POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);
$email=$POST['email'];
$price=$POST['price']*100;
$token=$POST['stripeToken'];

$customer=\Stripe\Customer::create(array(
    "email"=>$email,
    "source" => $token
));

        $db=mysqli_connect('localhost','root','','vehicle');
        if($db)
        {
            $sql="select * from servicing where userrequestid='$_SESSION[serviceid]'";
            $qry=mysqli_query($db,$sql);
            if($qry)
            {
                if(mysqli_num_rows($qry)>0)
                {
                    $row=mysqli_fetch_assoc($qry);
                }}}
            
$charge=\Stripe\Charge::create(array(
    "amount"=>$price,
    "currency"=>'bdt',
    "description"=>$row['problemarea'],
    "customer" => $customer->id
));
if($charge)
{
$db=mysqli_connect('localhost','root','','vehicle');
if($db)
{
    $sql="UPDATE servicing SET payment='paid' WHERE userrequestid='$_SESSION[serviceid]'";
    if(mysqli_query($db,$sql))
    {
        $sql1="UPDATE userrequest SET payment='paid' WHERE id='$_SESSION[serviceid]'";
        if(mysqli_query($db,$sql1))
        {
            echo "<script>alert('Payment Successfully Done!');window.location='menu.php?page=service'</script>";
        }
    }
    else
    {
        echo "<script>alert('Payment Is Not Successfully Done!');window.location='bookinghistory.php?userid=".$_GET['userid']."'</script>";
    }
}
}
else
{
    echo "not charged";
}
?>
