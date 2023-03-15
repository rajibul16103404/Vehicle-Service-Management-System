<?php
session_start();
    if($_SESSION['pickupname'])
    {
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/home.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="header">
            <h1>VSMS</h1>
                <ul>
                    <a href="home.php?page=incomplete"><li>Incomplete</li></a>
                    <a href="home.php?page=complete"><li>Completed</li></a>
                    <a href="home.php?page=profile"><li>Profile</li></a>
                    <a href="home.php?page=logout"><li>Log Out</li></a>
                </ul>
        </div>
        <div class="pages">
            <?php
                                $p=$_GET['page'];
                            
                                $page=$p.".php";

                                if(file_exists($page))
                                {
                                    include($page);
                                }
                                elseif($p=="")
                                {
                                   echo "Page Not Found";
                                }
                                else
                                {
                                    echo "What are you looking for?";
                                }

                            ?>
        </div>
    </body>
</html>
<?php
    }
    else
    {
        header('location:../pickuplogin.php');
    }
?>