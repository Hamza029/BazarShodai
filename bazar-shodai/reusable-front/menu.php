<?php
    include("config/constants.php");
    // include("login-check.php");
?>



<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper white">
            <a href="<?php echo SITEURL; ?>" class="brand-logo green-text" style="padding-left:10px;text-weight:bold">BazarShodai</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons green-text">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo SITEURL; ?>" class="green-text">Home</a></li>
                <li><a href="<?php echo SITEURL; ?>categories.php" class="green-text">Categories</a></li>
                <li><a href="<?php echo SITEURL; ?>items.php" class="green-text">Item</a></li>
                <li><a href="<?php echo SITEURL; ?>edit-profile.php" class="green-text">Profile</a></li>
                <li><a href="<?php echo SITEURL; ?>logout.php" class="red-text">Logout</a></li>
            </ul>
        </div>
    </nav>

    
</div>

<ul class="sidenav" id="mobile-demo">
    <li><a href="<?php echo SITEURL; ?>" class="green-text">Home</a></li>
    <li><a href="<?php echo SITEURL; ?>categories.php" class="green-text">Categories</a></li>
    <li><a href="<?php echo SITEURL; ?>items.php" class="green-text">Item</a></li>
    <li><a href="<?php echo SITEURL; ?>edit-profile.php" class="green-text">Profile</a></li>
    <li><a href="<?php echo SITEURL; ?>logout.php" class="red-text">Logout</a></li>
</ul>

<style>
    #cart-button { 
        position: fixed;
        bottom: 28px;
        right: 15px; 
    }

    #slide-out {
        width: 400px;
    }
</style>