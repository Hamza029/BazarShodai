<?php
    include("../config/constants.php");
    include("login-check.php");
?>



<div class="menu">
    <nav>
        <div class="nav-wrapper grey darken-3">
            <a href="#!" class="brand-logo" style="padding-left:10px">BazarShodai</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-item.php">Item</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="Logout.php" class="red-text">Logout</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="index.php">Home</a></li>
        <li><a href="manage-admin.php">Admin</a></li>
        <li><a href="manage-category.php">Category</a></li>
        <li><a href="manage-item.php">Item</a></li>
        <li><a href="manage-order.php">Order</a></li>
        <li><a href="Logout.php" class="red-text">Logout</a></li>
    </ul>
</div>