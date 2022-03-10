<?php

    if(isset($_POST['add'])) {
        if(isset($_SESSION['shopping_cart'])) {
            $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
            if(in_array($_POST['hidden_id'], $item_array_id)) {
                $cnt = count($_SESSION['shopping_cart']);
                for($i = 0; $i < $cnt; $i++) {
                    if($_SESSION['shopping_cart'][$i]['item_id'] == $_POST['hidden_id']) {
                        $_SESSION['shopping_cart'][$i]['quantity'] += 1;
                        $_SESSION['shopping_cart'][$i]['item_price'] += $_POST['hidden_price'];
                        break;
                    }
                }
            }
            else {
                $cnt = count($_SESSION['shopping_cart']);
                $item_array = array (
                    'item_id' => $_POST['hidden_id'],
                    'item_title' => $_POST['hidden_title'],
                    'item_price' => $_POST['hidden_price'],
                    'quantity' => 1
                );
                $_SESSION['shopping_cart'][$cnt] = $item_array;
            }
        }
        else {
            $item_array = array (
                'item_id' => $_POST['hidden_id'],
                'item_title' => $_POST['hidden_title'],
                'item_price' => $_POST['hidden_price'],
                'quantity' => 1
            );
            $_SESSION['shopping_cart'][0] = $item_array;
        }
    }

    if(isset($_POST['remove'])) {
        if(isset($_SESSION['shopping_cart'])) {
            $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
            if(in_array($_POST['hidden_id'], $item_array_id)) {
                $cnt = count($_SESSION['shopping_cart']);
                for($i = 0; $i < $cnt; $i++) {
                    if($_SESSION['shopping_cart'][$i]['item_id'] == $_POST['hidden_id']) {
                        if($_SESSION['shopping_cart'][$i]['quantity'] > 0) {
                            $_SESSION['shopping_cart'][$i]['quantity'] -= 1;
                            $_SESSION['shopping_cart'][$i]['item_price'] -= $_POST['hidden_price'];
                            break;
                        }
                    }
                }
            }
        }
    }

?>