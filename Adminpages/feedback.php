<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/feedback.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="container">
            <div class="userreply">
                
                <?php 
                    $conn=mysqli_connect('localhost','root','','vehicle');
                    if($conn)
                    {
                        $sql="select * from support";
                        $qry=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($qry))
                        {
                ?>
                <form action="menu.php?page=feedbackreply&&id=<?php echo $row['id']; ?>" method="POST">
                    <table>
                    <tr>
                        <td>
                            Username
                        </td>
                        <td>
                            <?php echo $row['username']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Subject
                        </td>
                        <td>
                            <?php echo $row['subject']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Description
                        </td>
                        <td>
                            <textarea name="" id="" cols="30" rows="5" readonly><?php echo $row['description']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Reply">
                        </td>
                        <td>
                            <textarea name="reply" id="" cols="30" rows="5" placeholder="Leave Reply"></textarea>
                        </td>
                    </tr>
                    </tr>
                    </table>
                    
                </form>

                <?php
                        }
                    }
                ?>
                </div>
                
        </div>
    </body>
</html>