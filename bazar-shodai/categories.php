<?php include("reusable-front/head.php") ?>


<?php include("reusable-front/menu.php") ?>




<div class="item-search">
    <div class="row container">
        <form class="col s12" action="<?php echo SITEURL; ?>search-item.php" method="POST">
        <div class="row">
            <div class="input-field col s10">
                <i class="material-icons prefix">search</i>
                <input type="search" name="search" placeholder="Search for Items.." required>
                <!-- <label for="icon_prefix">Search</label> -->
            </div>
            <div class="input-field col s2">
                <input type="submit" name="submit" value="Search" class="btn green darken-2">
            </div>
        </div>
        </form>
    </div>
</div>


<div class="categories container">
    <div class="row">
    
        <h3 class="center-align grey-text">Explore Various Categories</h3>


        <?php

            $sql = "SELECT * FROM tbl_category WHERE ACTIVE='Yes'";
            $result = mysqli_query($conn, $sql);

            if($result == true) {

                $rows = mysqli_num_rows($result);

                if($rows>0) {

                    while($rows = mysqli_fetch_assoc($result)) {

                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];
                        ?>

                        <div class="col s12 m4">
                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card hoverable">
                                        <div class="card-image">
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title"><?php echo $title; ?></span>
                                        </div>
                                        <div class="card-action">
                                            <a href="<?php echo SITEURL; ?>category-items.php?category_id=<?php echo $id; ?>">Explore this category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    }

                }

            }

        ?>

    </div>




</div>







<?php include("reusable-front/footer.php") ?>
