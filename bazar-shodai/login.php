<?php include("reusable-front/head.php"); ?>
<?php include('config/constants.php'); ?>

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

        <form action="" method="POST" class="text-center red lighten-5 z-depth-3">
            <div class="input-field">
                <i class="material-icons prefix">email</i>
                <input type="text" name="email" placeholder="Enter Email"><br><br>
                <label for="username">Email</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="password" placeholder="Enter Password"><br><br>
                <label for="password">Password</label>
            </div>

            <div class="input-field center-align">
                <input type="submit" name="submit" value="Login" class="btn red lighten-2 hoverable">
            </div>

            <div class="center"><a href="<?php echo SITEURL; ?>customer-sign-up.php">Don't have an account? Signup here</a></div>
        </form>


    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

<?php
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // echo $username . ' ' . $password;

        $sql = "SELECT * FROM customer WHERE email='$email' AND pass='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        $row = mysqli_fetch_assoc($res);

        if($count == 1) {
            $_SESSION['login_customer'] = "Login successfull!";
            $_SESSION['user'] = $row;

            header('location:'.SITEURL);
        }
        else {
            $_SESSION['login'] = "Username or password did not match!";
            header('location:'.SITEURL.'login.php');
        }
    }
?>