<?php include("reusable/head.php"); ?>
<?php include('reusable/menu.php'); ?>

<div class="container">
    <div class="wrapper">
        <h3 style="font-weight:bold;">Update Category</h3>

        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<span class='red-text'>Category not Found.</span>";
                    // header('location:'.SITEURL.'admin/manage-category.php');
                    $url = SITEURL.'admin/manage-category.php';
                    echo "<script>window.location.href='$url'</script>";
                }

            }
            else
            {
                // header('location:'.SITEURL.'admin/manage-category.php');
                $url = SITEURL.'admin/manage-category.php';
                echo "<script>window.location.href='$url'</script>";
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <p><label>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">
                        <span>Yes</span></label></p>
                        <p><label>
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">
                        <span>No</span></label></p>
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <p><label>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">
                        <span>Yes</span></label></p>
                        <p><label>
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">
                        <span>No</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn green">
                    </td>
                </tr>

            </table>

        </form>


        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name != "")
                    {
                        $ara = (explode('.', $image_name));
                        $ext = end($ara);

                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext;
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        
                        if($upload == false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            // header('location:'.SITEURL.'admin/manage-category.php');
                            $url = SITEURL.'admin/manage-category.php';
                            echo "<script>window.location.href='$url'</script>";
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path = "../images/category/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                // header('location:'.SITEURL.'admin/manage-category.php');
                                $url = SITEURL.'admin/manage-category.php';
                                echo "<script>window.location.href='$url'</script>";
                                die();
                            }
                        }
                        

                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE tbl_category SET 
                        title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active' 
                        WHERE id=$id
                        ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<span class='green-text'>Category Updated Successfully.</span>";
                    // header('location:'.SITEURL.'admin/manage-category.php');
                    $url = SITEURL.'admin/manage-category.php';
                    echo "<script>window.location.href='$url'</script>";
                }
                else
                {
                    $_SESSION['update'] = "<span class='red-text'>Failed to Update Category.</span>";
                    // header('location:'.SITEURL.'admin/manage-category.php');
                    $url = SITEURL.'admin/manage-category.php';
                    echo "<script>window.location.href='$url'</script>";
                }
            }
        ?>

    </div>
</div>

<?php include('reusable/footer.php'); ?>