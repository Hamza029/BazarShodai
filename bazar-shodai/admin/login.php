<?php include("reusable/head.php"); ?>
<?php include('../config/constants.php'); ?>

<style>
    form {
        margin-right: 20%;
        margin-left: 20%;
        padding: 30px;
        border-radius: 10px;
    }
    h3 {
        font-weight: bold;
        text-align: center;
    }
</style>

<body>
        
    <div class="login container">
        <h3>LOGIN</h3>
        <br><br>

        <?php 
            if(isset($_SESSION['login']))
            {
                echo "<p class='red-text center-align'>" . $_SESSION['login'] . "</p>";
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo "<p class='red-text center-align'>" . $_SESSION['no-login-message'] . "</p>";
                unset($_SESSION['no-login-message']);
            }
        ?>

        <form action="" method="POST" class="text-center red lighten-5 z-depth-3">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                <label for="username">Username</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="password" placeholder="Enter Password"><br><br>
                <label for="password">Password</label>
            </div>

            <div class="input-field center-align">
                <input type="submit" name="submit" value="Login" class="btn red lighten-2 hoverable">
            </div>
        </form>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $username . ' ' . $password;

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1) {
            $_SESSION['login'] = "Login successfull!";
            $_SESSION['user_admin'] = $username;

            header('location:'.SITEURL.'admin/');
        }
        else {
            $_SESSION['login'] = "Username or password did not match!";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>