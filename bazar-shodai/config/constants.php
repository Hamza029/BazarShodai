<?php

    session_start();

    define('SITEURL', 'http://localhost/bazar-shodai/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'bazarshodai');

    $conn = mysqli_connect("localhost", 'root', '') or die(mysqli_error());
    $db_select = mysqli_select_db($conn, 'bazarshodai') or die(mysqli_error());

    // $url = SITEURL.'admin/manage-item.php';
    // echo "<script>window.location.href='$url'</script>";
?>