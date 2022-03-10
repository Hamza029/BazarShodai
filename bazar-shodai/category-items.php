<?php include("reusable-front/head.php") ?>


<?php include("reusable-front/menu.php") ?>




<div class="item-search">
    <div class="row container">
        <form class="col s12" action="<?php echo SITEURL; ?>search-item.php" method="get">
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

        <?php

            $category_id = $_GET['category_id'];

            $sql = "SELECT * FROM tbl_category 
                    WHERE id = $category_id";

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            $category_title = $row['title'];

        ?>
    
        <h3 class="center-align grey-text">Showing items on <span style="color:#55914c"><?php echo $category_title ?></span></h3>


        <?php

            $category_id = $_GET['category_id'];

            $sql = "SELECT * FROM tbl_item 
                    WHERE category_id = $category_id";
            
            $result = mysqli_query($conn, $sql);

            if($result == true) {

                $rows = mysqli_num_rows($result);

                if($rows>0) {

                    while($rows = mysqli_fetch_assoc($result)) {

                        $id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $description = $rows['description'];
                        $active = $rows['active'];
                        ?>

                        <div class="col s12 m4">
                        <div class="row">
                                <div class="col s12 m12">
                                    <div class="card hoverable">
                                        <div class="card-image">
                                            <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>">
                                            <span class="card-title" style="font-weight:bold"><?php echo $title; ?></span>
                                        </div>
                                        <div class="card-content">
                                            
                                            <span class="card-title">Price: <?php echo $price; ?>৳</span>
                                            <?php echo $description ?>
                                        </div>
                                        <div class="card-action">
                                            <form action="" method="post" class="center-align">
                                                <input type="hidden" name="hidden_id" value="<?php echo $id; ?>" />
                                                <input type="hidden" name="hidden_price" value="<?php echo $price; ?>" />
                                                <input type="hidden" name="hidden_title" value="<?php echo $title; ?>" />
                                                <button name="add" type="submit" class="btn grey darken-3"><i class="material-icons">add</i></button>
                                                <button name="remove" type="submit" class="btn grey darken-3"><i class="material-icons">remove</i></button>
                                            </form>
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



    <?php

        include('reusable-front/cart-calculation.php');

    ?>






</div>







<?php include("reusable-front/footer.php") ?>
