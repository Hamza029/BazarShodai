<?php

    include('config/constants.php');

    if(!isset($_SESSION['user'])) {

        header('location:'.SITEURL.'login.php');
        exit();

    }

    // insert into cart table
    $cnt = count($_SESSION['shopping_cart']);

    $sql1 = "SELECT * FROM tbl_order";
    $res1 = mysqli_query($conn, $sql1);
    $order_id = mysqli_num_rows($res1) + 1;

    $total_price = 0;

    for($i = 0; $i < $cnt; $i++) {

        $item_id = $_SESSION['shopping_cart'][$i]['item_id'];
        $quantity = $_SESSION['shopping_cart'][$i]['quantity'];
        $price = $_SESSION['shopping_cart'][$i]['item_price'];
        $item_title = $_SESSION['shopping_cart'][$i]['item_title'];

        $total_price += $price;

        $sql2 = "INSERT INTO tbl_cart (item_id, quantity, price, order_id, item_title) 
                VALUES($item_id, $quantity, $price, $order_id, '$item_title')";

        // echo $sql2;

        $res2 = mysqli_query($conn, $sql2);

    }


    // insert into order table
    $customer_id = $_SESSION['user']['id'];

    $sql3 = "INSERT INTO tbl_order (customer_id, price, order_date) 
            VALUES($customer_id, $total_price, CURDATE())";

    echo $sql3;

    $res3 = mysqli_query($conn, $sql3);

    unset($_SESSION['shopping_cart']);

    $_SESSION['place_order'] = 'Your order has been placed!';

    header('location:'.SITEURL);

?>