<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/home.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="count">
            <span class="a">Users</span>
            <span class="b">Mechanics</span>
            <span class="c">PickUp Mans</span>
            <span class="d">User Request</span>
            <span class="e">Approved Request</span>
            <?php
                $conn=mysqli_connect('localhost','root','','vehicle');
                if($conn)
                {
            ?>
            <div class="users">
                <?php
                    $i=0;
                    $sql="select * from user";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        $i++;
                    }
                    echo "<span>".$i."</span>"
                ?>
            </div>
            <div class="mechanic">
                <?php
                    $i=0;
                    $sql="select * from mechanic";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        $i++;
                    }
                    echo "<span>".$i."</span>"
                ?>
            </div>
            <div class="deliveryman">
                <?php
                    $i=0;
                    $sql="select * from deliveryman";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        $i++;
                    }
                    echo "<span>".$i."</span>"
                ?>
            </div>
            <div class="request">
                <?php
                    $i=0;
                    $sql="select * from userrequest where status='Pending'";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        $i++;
                    }
                    echo "<span>".$i."</span>"
                ?>
            </div>
            <div class="approvedrequest">
                <?php
                    $i=0;
                    $sql="select * from userrequest where status='Approved'";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        $i++;
                    }
                    echo "<span>".$i."</span>"
                ?>
            </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>