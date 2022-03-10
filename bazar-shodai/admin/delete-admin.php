<?php

    include('../config/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id = " . $id;

    $res = mysqli_query($conn, $sql);

    if($res == true) {
        // echo "Admin deleted!";
        $_SESSION['delete'] = "Admin deleted successfully!";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
    else {
        // echo "Failed to delete admin!";
        $_SESSION['delete'] = "Admin deleted successfully!";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }

?>