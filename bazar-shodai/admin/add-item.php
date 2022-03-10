<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

    <div class="main-content container">
        <h3 style="font-weight:bold">ADD CATEGORY</h3>

        <?php 
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br>
        
        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="col s6">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Item">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea class="materialize-textarea" name="description" placeholder="Description of the Item"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
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
                                // SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
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
                        <input type="submit" name="submit" value="Add Item" class="btn green">
                    </td>
                </tr>

            </table>

        </form>


    </div>

<?php 

    //Check whether the button is clicked or not
    if(isset($_POST['submit']))
    {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else
        {
            $featured = "No";
        }

        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }

        
        if(isset($_FILES['image']['name']))
        {

            $image_name = $_FILES['image']['name'];

            if($image_name!="")
            {
                
                $ext = end(explode('.', $image_name));

                $image_name = "Item-Name-".rand(0000,9999).".".$ext;


                $src = $_FILES['image']['tmp_name'];

                $dst = "../images/item/".$image_name;

                $upload = move_uploaded_file($src, $dst);

                if($upload==false)
                {
                    $_SESSION['upload'] = "<span class='red-text'>Failed to Upload Image.</span>";
                    header('location:'.SITEURL.'admin/add-item.php');
                    die();
                }

            }

        }
        else
        {
            $image_name = "";
        }

        
        $sql2 = "INSERT INTO tbl_item SET 
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
            ";

        $res2 = mysqli_query($conn, $sql2);

        if($res2 == true)
        {
            $_SESSION['add'] = "<span class='green-text'>Successfully Added Item!</span>";
            // header('location:'.SITEURL.'admin/manage-item.php');
            $url = SITEURL.'admin/manage-item.php';
            echo "<script>window.location.href='$url'</script>";
        }
        else
        {
            $_SESSION['add'] = "<span class='red-text'>Failed to Add Item!</span>";
            // header('location:'.SITEURL.'admin/manage-item.php');
            $url = SITEURL.'admin/manage-item.php';
            echo "<script>window.location.href='$url'</script>";
        }
    }

?>



<?php include("reusable/footer.php"); ?>