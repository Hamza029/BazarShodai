<?php

    if(!isset($_SESSION['user'])) {
        $_SESSION['no-login-message'] = "Please login to access Admin Panel!";
        header('location:' . SITEURL . 'login.php');
    }

?>