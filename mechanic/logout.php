<?php

    session_start();
    unset($_SESSION['mechanicname']);
    header('location:../index.php');
    session_destroy();

?>