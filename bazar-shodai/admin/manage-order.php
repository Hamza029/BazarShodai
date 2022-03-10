<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

<section class="container">
    
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Revenue</th>
                <th>Order date</th>
                <th>Products</th>
            </tr>
        </thead>

        <tbody>

            <?php
                $sql = "SELECT * FROM tbl_order";
                $result = mysqli_query($conn, $sql);

                if($result == TRUE) {
                    $rows = mysqli_num_rows($result);

                    $sl = 0;

                    if($rows>0) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            $customer_id = $rows['customer_id'];
                            $revenue = $rows['price'];
                            $order_date = $rows['order_date'];
                            $order_id = $rows['id'];
                            $sl++;

                            $sql2 = "SELECT * FROM customer WHERE id = $customer_id";
                            $result2 = mysqli_query($conn, $sql2);
                            $rows2 = mysqli_fetch_assoc($result2);

                            $customer_name = $rows2['name'];
                            $customer_phone = $rows2['phone'];

                            ?>
                            
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_phone; ?></td>
                                <td><?php echo $revenue; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td class="collapsible-header">
                                    <form action="" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                        <button data-target="slide-out" class="sidenav-trigger btn" type="submit" name="products">Products</button>
                                    </form>
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

<?php

    if(isset($_POST['products'])) {
        
        $order_id = $_POST['order_id'];
        // echo $_POST['order_id'];

        ?>

        <!-- <ul id="slide-out" class="sidenav" style="width:500px;"> -->
            <br><br>
            <table class="container striped">
                <caption><h4>Showing products cart for order no: <?php echo $order_id; ?></h4></caption>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>

                <?php 
                    $order_id = $_POST['order_id'];
                    $sql = "SELECT * FROM tbl_cart WHERE order_id = $order_id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $sn=1;
                    $total_price = 0;

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $item_id = $row['item_id'];

                            $sql2 = "SELECT * FROM tbl_item WHERE id = $item_id";
                            $res2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($res2);

                            $order_id = $row['order_id'];
                            $item_title = $row2['title'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];

                            $total_price += $price;
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $item_title; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><span>৳</span><?php echo $price; ?></td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                    }

                ?>

                <tr>
                    <td> </td>
                    <td>Total Price</td>
                    <td> </td>
                    <td><span>৳</span><?php echo $total_price; ?></td>
                </tr>
        
            </table>
            <br><br>
            
        <!-- </ul> -->

        <?php

    }

?>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            M.Collapsible.init(elems);
        });
</script>

<?php include("reusable/footer.php"); ?>