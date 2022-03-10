<ul id="slide-out" class="sidenav">
    <table class="tbl-full highlight">
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <?php 

            // check order id
            $sql_order = "SELECT * FROM tbl_order";
            $res_order = mysqli_query($conn,$sql_order);
            $order_id = mysqli_num_rows($res_order) + 1;
            $total_price = 0;
        
            $sql = "SELECT * FROM tbl_cart WHERE order_id = $order_id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn=1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $item_id = $row['item_id'];
                    $order_id = $row['order_id'];
                    $item_title = $row['item_title'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];

                    $total_price += $price;
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $title; ?></td>
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

        <tr>
            <td> </td>
            <td> <a href="" class="btn green">Place Order</a> </td>
            <td> </td>
            <td> </td>
        </tr>
   
    </table>
    
</ul>
<a href="#" data-target="slide-out" id="cart-button" class="sidenav-trigger hoverable btn-floating btn-large waves-effect waves-light grey darken-4"><i class="material-icons large">list</i></a>
<!-- <a id="cart-button" class="hoverable btn-floating btn-large waves-effect waves-light red"><i class="material-icons">list</i></a> -->



<footer class="footer green darken-3 white-text">
        <p class="center-align">
            © 2022 BazarShodai
        </p>
    </footer>

    <!-- footer section ends     -->




    
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- initialize sidenav -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            M.Sidenav.init(elems);
        });
    </script>
</body>

</html>










<ul id="slide-out" class="sidenav" style="width:500px;">
            <table class="tbl-full highlight">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>

                <?php 
                
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
                            $order_id = $row['order_id'];
                            $item_title = $row['item_title'];
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
            
        </ul>