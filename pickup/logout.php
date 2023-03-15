<?php

    session_start();
    unset($_SESSION['pickupname']);
    header('location:../index.php');
    session_destroy();

?>