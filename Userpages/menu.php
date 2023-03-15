<?php

    session_start();
    if($_SESSION['username'])
    {

        ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
    <link rel="stylesheet" href="CSS/menu.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="menu">
                <h3 class="logo">V<span>S</span>M<span>S</span></h3>
                <div class="anothermenu">
                    <div class="bar"></div>
                </div>
            </div>
        </div>
        <div class="link">
            <ul>
                <li><a href="menu.php?page=home" style="--i: 0.05s">Home</a></li>
                <li><a href="menu.php?page=request" style="--i: 0.10s">Request</a></li>
                <li><a href="menu.php?page=service" style="--i: 0.15s">Service</a></li>
                <li><a href="menu.php?page=history" style="--i: 0.15s">History</a></li>
                <li><a href="menu.php?page=profile" style="--i: 0.20s">Profile</a></li>
                <li><a href="menu.php?page=support" style="--i: 0.25s">Support</a></li>
                <li><a href="menu.php?page=logout" style="--i: 0.25s">Log Out</a></li>
            </ul>
        </div>
        <div class="main-container">
            <div class="main">
                <header>
                    <div class="overlay">
                        <div class="inner">
                            <?php

                                $p=$_GET['page'];
                            
                                $page=$p.".php";

                                if(file_exists($page))
                                {
                                    include($page);
                                }
                                else
                                {
                                    echo "What are you looking for?";
                                }

                            ?>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        
    </div>

    <script src="JS/menu.js"></script>
</body>
</html>

<?php


    }
    else
    {
        header("location:../userlogin.php");
    }

?>