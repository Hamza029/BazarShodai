<?php include("reusable/head.php"); ?>

    <!-- menu section starts     -->
    <?php include("reusable/menu.php"); ?>
    <!-- menu section ends     -->


    <!-- main content section starts     -->

    <div class="main-content container">
        <h3 style="font-weight:bold; text-align:center;">DASHBOARD</h3>

        <?php

            $sql1 = "SELECT * FROM tbl_category";
            $res1 = mysqli_query($conn, $sql1);
            $cats = mysqli_num_rows($res1);

            $sql2 = "SELECT * FROM tbl_item";
            $res2 = mysqli_query($conn, $sql2);
            $items = mysqli_num_rows($res2);

            $sql3 = "SELECT * FROM tbl_order";
            $res3 = mysqli_query($conn, $sql3);
            $orders = mysqli_num_rows($res3);

            $revenue = 0;

            while($row = mysqli_fetch_assoc($res3)) {

                $revenue += $row['price'];

            }

        ?>

        <div class="row">
            <div class="col s12 m3">
                <div class="card-panel center-align z-depth-3">
                    <i class="material-icons large teal-text">category</i>
                    <h4><?php echo $cats; ?></h4>
                    Categories
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card-panel center-align z-depth-3">
                    <i class="material-icons large teal-text">book</i>
                    <h4><?php echo $items; ?></h4>
                    Items
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card-panel center-align z-depth-3">
                    <i class="material-icons large teal-text">done</i>
                    <h4><?php echo $orders; ?></h4>
                    Total Orders
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card-panel center-align z-depth-3">
                    <i class="material-icons large teal-text">monetization_on</i>
                    <h4>৳<?php echo $revenue; ?></h4>
                    Revenue Generated
                </div>
            </div>
        </div>
    </div>

<!-- main content section ends     -->
<?php include("reusable/footer.php"); ?>
<!-- footer section starts     -->

