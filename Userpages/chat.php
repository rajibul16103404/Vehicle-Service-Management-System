<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/chat.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <?php
            $conn=mysqli_connect('localhost','root','','vehicle');
            $code=$_GET['code'];
            if($conn)
            {
                $sql="select * from userrequest where uniquekey='$code'";
                $qry=mysqli_query($conn,$sql);
                if($qry)
                {
                    $row=mysqli_fetch_assoc($qry);
                    $sql1="select * from mechanic where name='$row[mechanic]'";
                    $qry1=mysqli_query($conn,$sql1);
                    if($qry1)
                    {
                        $row1=mysqli_fetch_assoc($qry1);
                        
        ?>

        <div class="info">
            <table>
                <tr>
                    <td>Mechanic Name</td>
                    <td><?php echo $row1['name']; ?></td>
                </tr>
                <tr>
                    <td>Mechanic Phone</td>
                    <td><?php echo "+880".$row1['phone']; ?></td>
                </tr>
            </table>
        </div>                    
        <?php
                }
            }
        ?>
            
        <div class="chat">
            <div class="show">
                <?php
                    $sql2="select * from chat where code='$code'";
                    $qry2=mysqli_query($conn,$sql2);
                    if($qry2)
                    {
                        while($row2=mysqli_fetch_assoc($qry2))
                        {
                        if($row2['sendmsg']!=null)
                            {
                    ?>
                        <div class="from">
                            <div class="send">
                                <?php echo $row2['sendmsg']; ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php
                            if($row2['receivemsg']!=null)
                            {
                        ?>
                        <div class="to">
                            <div class="receive">
                                <?php echo $row2['receivemsg']; ?>
                            </div>
                        </div>
                    <?php
                            }
                        
                    }
                }
                    
                ?>
            </div>
            <div class="input">
                <form action="" method="post">
                    <input type="text" name="chat" placeholder="Type your text here">
                    <input type="submit" name="submit" value="Send">
                </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $date=date("Y-m-d");
                        $time=date("h:i:a");
                        $text=$_POST['chat'];
                        if($text==null)
                        {
                            $sql3="update chat set receivemsg='$text' where receivemsg=null";
                            $qry3=mysqli_query($conn,$sql3);
                            if($qry3)
                            {
                                ?><META http-equiv="refresh" content="0"; ><?php
                            }
                            else
                            {
                                echo "Not Send";
                            }
                        }
                        else
                        {
                            echo "<br>Please wait for mechanic to reply";
                        }
                    }
                    
                ?>
            </div>
        </div>  
            
            
            
            
            
            
            
            <?php
        }
        ?>
    </body>
</html>