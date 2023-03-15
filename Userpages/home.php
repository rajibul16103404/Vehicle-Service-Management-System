<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="CSS/home.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="todo">
        <h1>ToDo Lists</h1>
        <div class="insert">
            <form action="menu.php?page=inserttodo" method="post">
                <select name="category" id="">
                    <option value="">Select Category</option>
                    <option value="Engine Oil Change">Engine Oil Change</option>
                    <option value="Oil Filter Change">Oil Filter Change</option>
                    <option value="Air Filter Change">Air Filter Change</option>
                    <option value="Tyre Change">Tyre Change</option>
                    <option value="Brake Oil Change">Brake Oil Change</option>
                    <option value="Spark Plug Change">Spark Plug Change</option>
                </select>
                <input type="date" name="date">
                <input type="submit" name="submit" value="Add">
            </form>
        </div>
        <div class="view">
                            <table>
                                <tr>
                                    <td>
                                        SL
                                    </td>
                                    <td>
                                        Category Of Change
                                    </td>
                                    <td>
                                        Date To Change
                                    </td>
                                    <td>
                                        Action
                                    </td>
                                </tr>
            <?php
                $conn=mysqli_connect('localhost','root','','vehicle');
            if($conn)
            {
                    $sql1="select * from todo where user='$_SESSION[username]'";
                    $qry1=mysqli_query($conn,$sql1);
                    $counter=1;
                    $ddate=date("Y-m-d");
                    
                        
                           
                            while($row1=mysqli_fetch_assoc($qry1))
                            {
                                if(strtotime($row1['date'])>strtotime($ddate))
                                {
                                ?>
                                
                                
                                    <tr>
                                        <td>
                                            <?php echo $counter;?>
                                        </td>
                                        <td>
                                            <?php echo $row1['category'];?>
                                        </td>
                                        <td>
                                            <?php echo $row1['date'];?>
                                        </td>
                                        <td>
                                            <a href="menu.php?page=removetodo&&id=<?php echo $row1['id']; ?>"><button>Remove</button></a>
                                        </td>
                                    </tr>
                                
                                
                                <?php
                                $counter++;
                                }
                            }
                        }
                    
                
                
            ?>
            </table>
        </div>
    </div>
    <div class="notification">
        <h1>Support Feedback</h1>
        <div class="adminreply">
            <?php
                if($conn)
                {
                    $sql="select * from support where username='$_SESSION[username]'";
                    $qry=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        ?>
                        <div class="reply">
                            <p><?php echo $row['placedate']; ?></p>
                            <div class="user">
                                <h3><?php echo $row['subject']; ?></h3>
                                <h4><?php echo $row['description']; ?></h4>
                            </div>
                            <?php if($row['adminreply']!=null){ ?>
                            <span><?php echo $row['replydate']; ?></span>
                            <div class="admin">
                                <h3>Admin</h3>
                                <h4><?php echo $row['adminreply']; ?></h4>
                            </div>
                        </div><br><br><br>
                        
                        
                        <?php
                            }
                    }
                }
            ?>
            <p></p>
        </div>
    </div>
</body>