<?php include('reusable/head.php'); ?>
<?php include('reusable/menu.php'); ?>

<?php 

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_item WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        // header('location:'.SITEURL.'admin/manage-item.php');
        $url = SITEURL.'admin/manage-item.php';
        echo "<script>window.location.href='$url'</script>";
    }
?>


<div class="main-content container">
    <div class="wrapper">
        <h3 style="font-weight:bold">UPDATE ITEM</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea class="materialize-textarea" name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/item/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image: </td>
                <td>
                    <div class="file-field input-field">
                        <div class="btn">
                            <i class="material-icons">upload</i>
                            <span>Image</span>
                            <input type="file" name="image">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category" class="browser-default">

                        <?php 
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <p>
                        <label>
                            <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">
                            <span>Yes</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No">
                            <span>No</span>
                        </label>
                    </p>
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <p>
                        <label>
                            <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">
                            <span>Yes</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No">
                            <span>No</span>
                        </label>
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Item" class="btn green">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Item-Name-".rand(0000, 9999).'.'.$ext;

                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/item/".$image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<span class='red-text'>Failed to Upload new Image.</span>";
                            
                            // header('location:'.SITEURL.'admin/manage-item.php');
                            $url = SITEURL.'admin/manage-item.php';
                            echo "<script>window.location.href='$url'</script>";
                            
                            die();
                        }

                        if($current_image!="")
                        {
                            
                            $remove_path = "../images/item/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {

                                $_SESSION['remove-failed'] = "<span class='red-text'>Faile to remove current image.</span>";
                                
                                // header('location:'.SITEURL.'admin/manage-item.php');
                                $url = SITEURL.'admin/manage-item.php';
                                echo "<script>window.location.href='$url'</script>";
                                
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; //Default Image when Image is Not Selected
                    }
                }
                else
                {
                    $image_name = $current_image; //Default Image when Button is not Clicked
                }

                

                $sql3 = "UPDATE tbl_item SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<span class='green-text'>Item Updated Successfully.</span>";
                    // header('location:'.SITEURL.'admin/manage-item.php');
                    $url = SITEURL.'admin/manage-item.php';
                    echo "<script>window.location.href='$url'</script>";
                }
                else
                {
                    $_SESSION['update'] = "<span class='red-text'>Failed to Update Item.</span>";
                    // header('location:'.SITEURL.'admin/manage-item.php');
                    $url = SITEURL.'admin/manage-item.php';
                    echo "<script>window.location.href='$url'</script>";
                }

                
            }
        
        ?>

    </div>
</div>

<?php include('reusable/footer.php'); ?>