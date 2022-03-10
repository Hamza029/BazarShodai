<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Remove the physical image file if available
        if($image_name != "")
        {
            $path = "../images/category/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "<span class='red-text'>Failed to Remove Category Image!</span>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<span class='green-text'>Category Deleted Successfully!</span>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<span class='red-text'>Failed to Delete Category!</span>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>