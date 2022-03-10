<?php 
    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];


        if($image_name != "")
        {

            $path = "../images/item/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<span class='red-text'>Failed to Remove Image File.</span>";
                header('location:'.SITEURL.'admin/manage-item.php');
                die();
            }

        }

        $sql = "DELETE FROM tbl_item WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<span class='green-text'>Item Deleted Successfully.</span>";
            header('location:'.SITEURL.'admin/manage-item.php');
        }
        else
        {
            $_SESSION['delete'] = "<span class='red-text'>Failed to Delete Item.</span>";
            header('location:'.SITEURL.'admin/manage-item.php');
        }

        

    }
    else
    {
        $_SESSION['unauthorize'] = "<span class='red-text'>Unauthorized Access.</span>";
        header('location:'.SITEURL.'admin/manage-item.php');
    }

?>