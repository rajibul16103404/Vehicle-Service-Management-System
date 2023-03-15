<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/mechanic.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="add">
                <table>
                    <h2>Requested Mechanics</h2>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Expertise
                        </th>
                        <th>
                            Salary
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                        <?php
                            $conn=mysqli_connect('localhost','root','','vehicle');
                            if($conn)
                            {
                                $sql="select * from mechanicrequest";
                                $qry=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($qry))
                                {
                        ?>
                    <tr>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>
                        <td>
                            <textarea name="" id="" cols="10" rows="3" readonly><?php echo $row['address']; ?></textarea>
                        </td>
                        <td>
                            <?php echo $row['expertise']; ?>
                        </td>
                        <td>
                            <?php echo $row['expectedsalary']; ?>
                            <form action="menu.php?page=addmechanic&&id=<?php echo $row['id']; ?>" method="post">
                            <input type="int" name="providedsalary" placeholder="Salary" required>
                        </td>
                        <td>
                            <input class="ad" type="submit" name="submit" value="Add">
                            </form>
                            <a href="menu.php?page=deletemechanic&&id=<?php echo $row['id']; ?>"><button class="delete">Delete</button></a>
                        </td>
                    </tr>
                        <?php 

                        
                                }
                            }
                        ?>
                </table>
        </div>
        <div class="view">
            <table>
                    <h2>Registered Mechanics</h2>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Expertise
                        </th>
                        <th>
                            Salary
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    
                        <?php
                            
                            if($conn)
                            {
                                $sql1="select * from mechanic";
                                $qry1=mysqli_query($conn,$sql1);
                                while($row1=mysqli_fetch_assoc($qry1))
                                {
                        ?>
                    <tr>
                        <td>
                            <?php echo $row1['name']; ?>
                        </td>
                        <td>
                            <?php echo $row1['phone']; ?>
                        </td>
                        <td>
                            <textarea name="" id="" cols="10" rows="3" readonly><?php echo $row1['address']; ?></textarea>
                        </td>
                        <td>
                            <?php echo $row1['expertise']; ?>
                        </td>
                        <td>
                            <?php echo $row1['salary']; ?>
                        </td>
                        <td>
                            <a href="menu.php?page=removemechanic&&id=<?php echo $row1['id']; ?>"><button>Remove</button></a>
                        </td>
                    </tr>
                        <?php            
                                }
                            }
                        ?>
                    
                </table>
        </div>
    </body>
</html>