<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

    <div class="main-content container">
        <h3 style="font-weight:bold">ADD CATEGORY</h3>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo "<p class='red-text center-align'>" . $_SESSION['add'] . "</p>";
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo "<p class='red-text center-align'>" . $_SESSION['upload'] . "</p>";
                unset($_SESSION['upload']);
            }
        ?>
        <br>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="col s6">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <p>
                            <label>
                                <input name="featured" type="radio" value="Yes" checked />
                                <span>Yes</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="featured" type="radio" value="No" />
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
                                <input name="active" type="radio" value="Yes" checked />
                                <span>Yes</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input name="active" type="radio" value="No" />
                                <span>No</span>
                            </label>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn green hoverable">
                    </td>
                </tr>

            </table>

        </form>



        <?php

            if(isset($_POST['submit'])) {
                
                $title = $_POST['title'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // print_r($_FILES['image']);
                // die();

                $image_name = $_FILES['image']['name'];

                if(isset($_FILES['image']['name'])) {
                    // Rename Image
                    //Get the Extension of image
                    // echo $image_name;
                    $dot = '.';
                    $ara = explode($dot, $image_name);
                    $ext = end($ara);

                    // //Rename the Image
                    $image_name = "Food_Category_".rand(000, 999).'.'.$ext;
                    

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    // Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    if($upload==false)
                    {
                        $_SESSION['upload'] = "Failed to Upload Image";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }
                }
                else {
                    $image_name = "";
                }

                
                $sql = "INSERT INTO tbl_category SET 
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active'
                        ";

                $res = mysqli_query($conn, $sql);

                if($res == true) {
                    $_SESSION['add'] = "Category added successfully";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else {
                    $_SESSION['add'] = "Failed to add category!";
                    header('location:'.SITEURL.'admin/add-category.php');
                }

            }

        ?>


    </div>



<?php include("reusable/footer.php"); ?>