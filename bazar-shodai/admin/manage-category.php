<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

<section class="main-content">
<section class="main-content container">
        <h3 style="font-weight:bold">MANAGE CATEGORY</h3>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo "<p class='green-text'>" . $_SESSION['add'] . "</p>";
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>

        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn blue">ADD CATEGORY</a><br><br>

        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $sql = "SELECT * FROM tbl_category";
                    $result = mysqli_query($conn, $sql);

                    if($result == true) {
                        $rows = mysqli_num_rows($result);

                        $sl = 0;

                        if($rows>0) {
                            while($rows = mysqli_fetch_assoc($result)) {
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $image_name = $rows['image_name'];
                                $featured = $rows['featured'];
                                $active = $rows['active'];
                                $sl++;
                                ?>

                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                    <?php  
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            ?>

                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" >
                                            
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<p class='red-text'>Image not Added.</p>";
                                        }
                                    ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-small green">UPDATE CATEGORY</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-small red">DELETE CATEGORY</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                    }
                ?>

            </tbody>
        </table>

    </section>

</section>

<?php include("reusable/footer.php"); ?>