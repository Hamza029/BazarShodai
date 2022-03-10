<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

<section class="main-content">
<section class="main-content container">
        <h3 style="font-weight:bold">MANAGE ITEM</h3>

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

        <a href="<?php echo SITEURL; ?>admin/add-item.php" class="btn blue">ADD ITEM</a><br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php 
            
                $sql = "SELECT * FROM tbl_item";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn=1;

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $title; ?></td>
                            <td><span>৳</span><?php echo $price; ?></td>
                            <td>
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "<span class='red-text'>Image not Added.</span>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-item.php?id=<?php echo $id; ?>" class="btn green"><i class="material-icons">edit</i></a>
                                <a href="<?php echo SITEURL; ?>admin/delete-item.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn red"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>

                        <?php
                    }
                }
                else
                {
                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                }

            ?>
   
        </table>

    </section>

</section>

<?php include("reusable/footer.php"); ?>