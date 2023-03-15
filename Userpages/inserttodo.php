<?php
    $conn=mysqli_connect('localhost','root','','vehicle');
    if($conn)
    {
        if(isset($_POST['submit']))
                    {  
                        $ddate=date("Y-m-d");
                        if(strtotime($_POST['date']) > strtotime($ddate))
                        {    
                            $sql1="select * from todo where user='$_SESSION[username]'";
                            $qry1=mysqli_query($conn,$sql1);
                            $row1=mysqli_fetch_assoc($qry1);     
                            if(strtotime($_POST['date']) != strtotime($row1['date']))
                            {
                                $sql="insert into todo(category,date,user) values('$_POST[category]','$_POST[date]','$_SESSION[username]')";
                                $qry=mysqli_query($conn,$sql);
                                if($qry)
                                {
                                    header('location:menu.php?page=home');
                                }
                                else
                                {
                                    echo "Not Inserted";
                                }
                            }
                            else
                            {
                                header('location:menu.php?page=home');
                            }
                        }
                        else
                        {
                            header('location:menu.php?page=home');
                        }
                    }
                    
    }
?>