<?php

    include('config/constants.php');

    $item_id = $_GET['id'];
    $no_of_items = $_GET['no_of_items'];

    $sql = "SELECT * FROM tbl_cart WHERE item_id = " . $item_id;

    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    // check order id
    $sql_order = "SELECT * FROM tbl_order";
    $res_order = mysqli_query($conn,$sql_order);
    $order_id = mysqli_num_rows($res_order) + 1;

    if($row > 0) {
        $items = $row['quantity'];
        $items += $no_of_items;

        if($items < 0) {
            $items = 0;
        }

        // check price of item
        $sql2 = "SELECT price FROM tbl_item WHERE id = $item_id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $price = $row2['price'];
        $price *= $items;

        $update_query = "UPDATE tbl_cart 
                        SET quantity = $items, price = $price 
                        WHERE item_id = $item_id";

        $res3 = mysqli_query($conn, $update_query);
    }
    else {
        if($no_of_items > 0) {
            // check price of item
            $sql2 = "SELECT * FROM tbl_item WHERE id = $item_id";
            $res2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($res2);

            $price = $row2['price'];
            $item_title = $row2['title'];
            // echo $item_title . '........';

            $insert_query = "INSERT INTO tbl_cart (item_id, quantity, price, order_id, item_title) 
                            VALUES ($item_id, $no_of_items, $price, $order_id, '$item_title')";
            $res3 = mysqli_query($conn, $insert_query);
        }
    }

    // header('location:' . SITEURL . $_GET['curr_url']);
    $previous = "javascript:history.go(-1)";

    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }

    header('Location:' . $previous);
    // echo $previous;

?>