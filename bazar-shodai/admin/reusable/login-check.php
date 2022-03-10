<?php

    if(!isset($_SESSION['user_admin'])) {
        $_SESSION['no-login-message'] = "Please login to access Admin Panel!";
        unset($_SESSION['login']);
        header('location:' . SITEURL . 'admin/login.php');
    }

?>