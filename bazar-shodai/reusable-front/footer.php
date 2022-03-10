<ul id="slide-out" class="sidenav teal lighten-5">
    <table class="tbl-full highlight">
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <?php

            $total_price = 0.0;

            if(isset($_SESSION['shopping_cart'])) {

                $cnt = count($_SESSION['shopping_cart']);

                for($i = 0; $i < $cnt; $i++) {

                    $title = $_SESSION['shopping_cart'][$i]['item_title'];
                    $quantity = $_SESSION['shopping_cart'][$i]['quantity'];
                    $price = $_SESSION['shopping_cart'][$i]['item_price'];

                    echo "<tr><td>" . $i+1 . "</td>";
                    echo "<td>" . $title . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>৳" . $price . "</td></tr>";

                    $total_price += $price;
                }
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
            <td> <a href="<?php echo SITEURL ?>place-order.php" class="btn green">Place Order</a> </td>
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